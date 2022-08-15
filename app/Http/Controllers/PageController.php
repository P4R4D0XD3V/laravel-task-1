<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home', ['products' => Product::with(['category','user'])->get()]);
    }

    public function category(Category $category)
    {
        return view('index', ['products'=> $category->products]);
    }
    public function user(User $user)
    {
        return view('index', ['products'=> $user->products]);
    }
}
