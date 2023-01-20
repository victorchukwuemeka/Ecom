<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use  App\Models\User;
use App\Models\Product;


class HomeController extends Controller
{

    public function index(Request $request)
    {
      $products = Product::all();
      $role = "client";

      if (Auth::user()) {
        $userRole = Auth::user()->getRole();
        $role = $userRole;
      }

      $viewData = [];
      $viewData["title"] = "Home-Page Online Store";
      $viewData["body"] = "cool stuffs";
      $viewData["products"] = $products;
      $viewData['role'] = $role;

      return view('home.index')->with('viewData', $viewData);

    }


    public function navbar(Request $request, $id)
    {
        $adminCheck = $request->session()->all();

        $viewData = [];
        $viewData["adminCheck"] = $adminCheck;

        return view('home.index')->with('viewData', $viewData);
    }


    public function about()
    {
        $viewData = [];
        $viewData['title'] = "About us online-page";
        $viewData['subtitle'] = "About us";
        $viewData['description'] = "this is our about page ";
        $viewData['author'] = "Description by : Your Name";

        return view('home.about')->with("viewData", $viewData);
    }
}
