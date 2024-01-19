<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function profile()
    {
        $userOrders = auth()->user()->orders;
        return view('profile', ['userOrders' => $userOrders]);
    }
}
