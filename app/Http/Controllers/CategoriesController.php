<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $categories = Categories::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);


        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente');
    }

    public function edit(Categories $categories, $id){
        $categories = Categories::all()->find($id);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, Categories $categories){
        $categories = Categories::find($request->id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $categories->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Categories $categories, $id){
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente');
    }
}
