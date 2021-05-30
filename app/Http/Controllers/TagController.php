<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $tags = tag::all();
        return view('admin.tag.show', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.tag');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | unique:tags'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        return (redirect()->back()->with('success', 'Tag added successfully'));
    }


    public function edit($id)
    {
        $tag = tag::where('id', $id)->first();
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag = tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        return (redirect()->back()->with('success', 'Tag updated successfully'));
    }


    public function destroy($id)
    {
        tag::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Tag deleted successfully');
    }
}
