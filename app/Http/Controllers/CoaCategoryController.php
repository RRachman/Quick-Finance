<?php

namespace App\Http\Controllers;

use App\Models\CoaCategory;
use Illuminate\Http\Request;

class CoaCategoryController extends Controller
{
    public function index()
    {
        $categories = CoaCategory::all();
        return view('categories.categoriesIndex', compact('categories'));
    }

    public function create()
    {
        $category = new CoaCategory(); // Empty object untuk create
        return view('categories.categoriesForm', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        CoaCategory::create($request->all());
        return redirect()->route('coa-categories.index')->with('success', 'Category created successfully.');
    }

    public function show(CoaCategory $coaCategory)
    {
        return view('categories.categoriesShow', compact('coaCategory'));
    }

    public function edit(CoaCategory $coaCategory)
    {
        return view('categories.categoriesForm', compact('category'));
    }

    public function update(Request $request, CoaCategory $coaCategory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $coaCategory->update($request->all());
        return redirect()->route('coa-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(CoaCategory $coaCategory)
    {
        $coaCategory->delete();
        return redirect()->route('coa-categories.index')->with('success', 'Category deleted successfully.');
    }
}