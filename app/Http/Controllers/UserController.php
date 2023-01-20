<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
       //$users = User::all();
       $userRole = Auth::user()->getRole();
       //dd($userRole);
       if ($userRole === "admin") {
         $role = $userRole;
         dd($role);
       }
      /* foreach ($users as $user) {
          // $role = $user->getRole();
            //dd($user);
           if (Auth::user()->getRole() === 'admin') {
                dd($user->getRole());
            }
            $user++;
        }
        */

        $viewData['role'] = $role;
        //dd($temp);
        return view('home.index')->with('viewData', $viewData );
    }
}
