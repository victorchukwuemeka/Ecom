<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home-Page Online Store";
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
