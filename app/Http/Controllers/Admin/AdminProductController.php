<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Admin Page -Product -Online ";
        $products = Product::all();
        $viewData['products'] = $products;

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        /*
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'image' =>'image'
        ]);
        */

        Product::validate($request);
        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage('image.png');
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imangeName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imangeName, file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imangeName);
            $newProduct->save();
        }


        return back();
    }


    public function delete($id)
    {
        Product ::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "Online-Edit-page";
        $viewData['product'] = Product::findOrFail($id);

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {


        Product::validate($request);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imangeName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put($imangeName,
            file_get_contents($request->file('image')->getRealPath()));
            $product->setImage($imangeName);
        }
        $product->save();
        return redirect()->route('admin.product.index');
    }

}
