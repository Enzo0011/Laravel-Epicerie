<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Categorie();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Categorie::find($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Categorie::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Categorie::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        return redirect()->route('categories.index');
    }
}
