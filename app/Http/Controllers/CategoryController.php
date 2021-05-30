<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $categories = category::all();
        return view('admin.category.show', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.category');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if($request->hasFile('image'))
        {
            $category->image = $request->image->store('public/files/categories');
        }

        $category->save();
        return (redirect()->back()->with('success', 'Category saved successfully'));
    }

    public function edit($id)
    {
        $category = category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $category = category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if($request->hasFile('image'))
        {
            $category->image = $request->image->store('public/files/categories');
        }
        $category->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        //
        category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');

    }
}
