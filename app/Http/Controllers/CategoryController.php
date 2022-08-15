<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ['categories' => Category::with(['products'])->get()]);
    }

    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
        ];
        Category::create($data);
        return redirect('/categories')->with('success','Category successfully created');
    }

    public function edit($id)
    {
        return view('category.edit', ['category' => Category::findOrFail($id)]);
    }

    public function update($id , Request $request)
    {
        $data = [
            'name' => $request->input('name'),
        ];
        $product = Category::findOrFail($id);
        $product->update($data);
        return redirect('/categories')->with('success','Category successfully updated');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect('/categories')->with('success','Category successfully deleted');
    }
    public function restore($id)
    {
        $user = Category::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect('/categories')->with('success','Category successfully recovered');
    }
    public function forceDelete($id)
    {
        $user = Category::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect('/categories')->with('success','Category successfully permanently deleted');
    }


}
