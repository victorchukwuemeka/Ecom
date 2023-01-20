<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Paystack;
use TransRef;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $total = 0;
        $productCart = [];


        $productInSession = $request->session()->get('products');

        $userId = Auth::user()->getId();

        $user = Auth::user();

        $order = new Order();
        $order->setUserId($userId);
        $order->getUserId();


        if ($productInSession) {
            $productCart = Product::findMany(array_keys($productInSession));
            $total = Product::sumPricesByQuantity($productCart, $productInSession);

        }

        $viewData = [];
        $viewData ['title'] = 'Online -Cart page' ;
        $viewData ['subtitle'] = "shopping Cart";
        $viewData['userId'] = $userId;
        $viewData['userEmail'] = $user->getEmail();
        //$viewData['order_id'];
        $viewData ['total'] = $total;
        $viewData ['products'] = $productCart;


        return view('cart.index')->with('viewData', $viewData);
    }


    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }


    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase(Request $request)
    {
        $productInSession =  $request->session()->get('products');


        if ($productInSession) {
            $userId = Auth::user()->getId();
            $userEmail = Auth::user()->getEmail();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $productInCart = Product::findMany(array_keys($productInSession));


            foreach ($productInCart as $product) {

                $quantity = $productInSession[$product->getId()];
                $item = new Item();

                $item->setQuantity($quantity);
                $item->setOrderId($order->getId());
                $item->setProductId($product->getId());
                $item->setPrice($product->getPrice());
                $item->save();
                $total = $total + ($item->getPrice() * $item->getQuantity());
            }

            $order->setTotal($total);
            $order->save();

            $balance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($balance);
            Auth::user()->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['title'] = "Purchase -Online ";
            $viewData['subtitle'] = "purchase statuse";
            $viewData['userEmail'] = $userEmail;
            $viewData['order'] = $order;
            $viewData['orderId'] = $order->getId();
            $viewData['userId'] = $userId;
            $viewData['currency'] = 'NGN';
            $viewData['total'] = $total;


            return view('cart.payment')->with("viewData", $viewData);
        }else {
            return redirect()->route('cart.index');
        }

    }

}
