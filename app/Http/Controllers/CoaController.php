<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use App\Models\CoaCategory;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    public function index()
    {
        $coas = Coa::with('category')->get();
        return view('coas.coasIndex', compact('coas'));
    }

   public function create()
{
    $coa = new Coa(); // Empty object untuk create
    $categories = CoaCategory::all();
    $existingCoas = Coa::pluck('code')->toArray(); // Tambahkan ini
    return view('coas.coasForm', compact('coa', 'categories', 'existingCoas'));
}

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coas',
            'name' => 'required|string|max:255',
            'coa_category_id' => 'required|exists:coa_categories,id'
        ]);
        Coa::create($request->all());
        return redirect()->route('coas.index')->with('success', 'COA created successfully.');
    }

    public function show(Coa $coa)
    {
        return view('coas.coasShow', compact('coa'));
    }

  public function edit($id)
{
    $coa = Coa::findOrFail($id);
    $categories = CoaCategory::all();
    $existingCoas = Coa::where('id', '!=', $id)->pluck('code')->toArray(); // Exclude current COA
    return view('coas.coasForm', compact('coa', 'categories', 'existingCoas'));
}
    public function update(Request $request, Coa $coa)
    {
        $request->validate([
            'code' => 'required|string|unique:coas,code,' . $coa->id,
            'name' => 'required|string|max:255',
            'coa_category_id' => 'required|exists:coa_categories,id'
        ]);
        $coa->update($request->all());
        return redirect()->route('coas.index')->with('success', 'COA updated successfully.');
    }

    public function destroy(Coa $coa)
    {
        $coa->delete();
        return redirect()->route('coas.index')->with('success', 'COA deleted successfully.');
    }
}