<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::with('categories')->get();;
        return view('products.index', compact('products'));
    }

    public function create(){
        $categories = Categories::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'int'],
            'stock' => ['required', 'int'],
            'categories_id' => ['required', 'exists:categories,id'],
        ]);

        $products = Products::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto registrado correctamente');
    }

    public function edit(Products $products, $id){
        $products = Products::all()->find($id);
        $categories = Categories::all();
        return view('products.edit', compact('products', 'categories'));
    }

    public function update(Request $request, Products $products){
        $products = Products::find($request->id);
        //dd($request->all());

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'categories_id' => ['required', 'exists:categories,id']
        ]);
        
        $products->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categories_id' => $request->categories_id
        ]);
        
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Products $products, $id){
        $products = Products::find($id);
        $products->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }
}
