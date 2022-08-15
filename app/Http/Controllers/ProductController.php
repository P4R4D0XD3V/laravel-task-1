<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', ['products' => Product::with(['category','user'])->get()]);
    }

    public function create()
    {
        if (count(Category::all()) == 0){
            return redirect()->back()->with('warning' , 'There is no Category. First create Category');
        }
        return view('product.create', ['categories' => Category::all()]);
    }

    public function edit($id)
    {
        return view('product.edit', ['product' => Product::with('category')->findOrFail($id) , 'categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'short' => $request->input('short'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category'),
        ];
        Product::create($data);
        return redirect('/products')->with('success','Product successfully created');
    }

    public function update($id , Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'short' => $request->input('short'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
        ];
        $product = Product::findOrFail($id);
        $product->update($data);
        return redirect('/products')->with('success','Product successfully updated');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect('/products')->with('success','Product successfully deleted');
    }
    public function restore($id)
    {
        $user = Product::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect('/products')->with('success','Product successfully recovered');
    }
    public function forceDelete($id)
    {
        $user = Product::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect('/products')->with('success','Product successfully permanently deleted');
    }



}
