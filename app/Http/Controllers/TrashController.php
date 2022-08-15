<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        return view('trash',[
            'users' => User::onlyTrashed()->get(),
            'products' => Product::onlyTrashed()->get(),
            'categories' => Category::onlyTrashed()->get(),
        ]);
    }
}
