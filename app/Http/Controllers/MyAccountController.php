<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
  public function order(){
    $viewData = [];
    $viewData["title"] = "My Orders -Online Shop";
    $viewData["subtitle"] = "My Orders";
    $viewData["order"] = Order::where('user_id', Auth::user()->getId())->get();
    return view('myaccount.orders')->with('viewData', $viewData);
  }

}
