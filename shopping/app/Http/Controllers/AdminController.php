<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;


class AdminController extends Controller
{
    public function dashboard()
    {
        $pro = Product::count();
        $user = User::count();
        $order = Order::count();
        return view('admin.dashboard',compact('pro','user','order'));
    }
}
