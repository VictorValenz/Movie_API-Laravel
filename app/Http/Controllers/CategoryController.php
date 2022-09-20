<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }
    public function show($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function store(Request $request)
    {
       $category = new Category();
       $category->name = $request->name;
       $category->save();
       return $category;
    }
    
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    public function destroy($id)
    {
       $category = Category::destroy($id);
       return $category;
    }
}
