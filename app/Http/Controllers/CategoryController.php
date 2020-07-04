<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $parentCategories = Category::where('parent_id', 0)->get();
        return view('products.categoryView', compact('parentCategories'));
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
        ]);
        $input = $request->all();
        Category::create($input);
        return redirect()->back();
    }

    public function addSubCategories(Request $request)
    {
        $this->validate($request,[
            'parent_id' => 'required',
            'name' => 'required',
        ]);
        $input = $request->all();
        Category::create($input);
        return redirect()->back();
    }

}
