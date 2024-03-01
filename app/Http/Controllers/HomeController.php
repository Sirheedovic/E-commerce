<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index(){
        $product = Products::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        }else {
            $product = Products::paginate(3);
             return view('home.userpage', compact('product'));
        }
    }
    public function product_details($id)
    {
        $product = Products::find($id);
        return view('home.product_details', compact('product'));
    }
}
