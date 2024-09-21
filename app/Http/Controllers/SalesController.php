<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Mostrar todas las ventas
    public function index(){
        // Obtener todas las ventas con sus productos y el usuario correspondiente
        $sales = Sales::with(['products', 'users'])->get();
        
        // Retornar la vista con las ventas
        return view('sales.index', compact('sales'));
    }

    // Mostrar el formulario para crear una nueva venta
    public function create(){
        // Obtener todos los productos y usuarios para el formulario
        $products = Products::all();
        $users = User::all();

        // Retornar la vista con los productos y usuarios
        return view('sales.create', compact('products', 'users'));
    }

    // Guardar una nueva venta en la base de datos
    public function store(Request $request){
        //dd($request->all());

        // Validar la solicitud
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'fecha_venta' => 'required|date',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);
        
    
        $total = 0;
        $productsWithErrors = [];
    
        // Validación de stock disponible
        foreach ($request->products as $productId => $cantidad) {
            if ($cantidad > 0) {
                $products = Products::find($productId);
    
                if ($cantidad > $products->stock) {
                    $productsWithErrors[] = $products->nombre; // Guardamos los productos con stock insuficiente
                }
            }
        }
    
        // Si hay productos con stock insuficiente, redirigir de vuelta con error
        if (count($productsWithErrors) > 0) {
            return redirect()->back()->withErrors(['stock' => 'Stock insuficiente para los siguientes productos: ' . implode(', ', $productsWithErrors)]);
        }

        // Procesar los productos seleccionados $productId => $quantity
        foreach ($request->products as $productData) {
            $products = Products::find($productData['id']);

            // Verificar que haya suficiente stock
            if ($products->stock < $productData['cantidad']) {
                return redirect()->back()->with('error', 'No hay suficiente stock para el producto ' . $products->nombre);
            }
                // Calcular el precio total sumando el precio del producto por la cantidad comprada
                $total += $products->precio * $productData['cantidad'];
        }

        
            // if ($quantity > 0) {
            //     $product = Products::find($productId);
            //     $subtotal = $product->precio * $quantity;
            //     $total += $subtotal;
    
            //     // Restar la cantidad comprada del stock
            //     $product->update([
            //         'stock' => $product->stock - $quantity,
            //     ]);
    
            //     // Guardar los productos en la venta
            //     $sale->products()->attach($productId, [
            //         'cantidad' => $quantity,
            //         'subtotal' => $subtotal
            //     ]);
            // }
        
    
            // Actualizar el total de la venta
        
        // Crear la venta
        $sale = Sales::create([
            'users_id' => $request->users_id,
            'fecha_venta' => $request->fecha_venta,
            'total' => $total,
        ]);

        foreach ($request->products as $productData) {
            $products = Products::find($productData['id']);
    
            // Actualizar el stock del producto
            $products->stock -= $productData['cantidad'];
            $products->save();
    
            // Insertar en la tabla intermedia product_sale
            $sale->products()->attach($products->id, ['cantidad' => $productData['cantidad']]);
        }
            
        $sale->update(['total' => $total]);
    

        // Redirigir al listado de ventas con un mensaje de éxito
        return redirect()->route('sales.index')->with('success', 'Venta creada correctamente');
    }

    // Mostrar los detalles de una venta específica
    public function show(Sales $sales){
        // Cargar los productos y el usuario asociado a la venta
        $sales->load(['productos', 'usuario']);

        // Retornar la vista con la venta
        return view('sales.show', compact('venta'));
    }

    // Mostrar el formulario para editar una venta existente
    public function edit(Sales $sales){
        // Obtener todos los productos y usuarios para el formulario
        $productos = Products::all();
        $users = User::all();

        // Cargar los productos de la venta
        $sales->load('products');

        // Retornar la vista de edición con la venta, productos y usuarios
        return view('sales.edit', compact('sales', 'products', 'usuers'));
    }

    // Actualizar una venta en la base de datos
    public function update(Request $request, Sales $sales){
        // Validar la solicitud
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'productos' => 'required|array',
            'productos.*' => 'exists:productos,id',
            'cantidad.*' => 'required|integer|min:1'
        ]);

        // Calcular el nuevo total
        $total = 0;
        foreach ($request->products as $index => $products_id) {
            $producto = Products::find($products_id);
            $total += $producto->precio * $request->cantidad[$index];
        }

        // Actualizar la venta
        $sales->update([
            'user_id' => $request->user_id,
            'total' => $total,
            'fecha' => now()
        ]);

        // Actualizar la relación productos-venta
        // Primero, desvincular todos los productos actuales
        $sales->products()->detach();

        // Luego, volver a asociar los productos con la nueva cantidad
        foreach ($request->productos as $index => $productos_id) {
            $sales->products()->attach($products_id, ['cantidad' => $request->cantidad[$index]]);
        }

        // Redirigir al listado de ventas con un mensaje de éxito
        return redirect()->route('sales.index')->with('success', 'Venta actualizada correctamente');
    }

    // Eliminar una venta
    public function destroy(Sales $sales){
        // Eliminar la venta y la relación en la tabla intermedia
        $sales->productos()->detach();
        $sales->delete();

        // Redirigir al listado de ventas con un mensaje de éxito
        return redirect()->route('sales.index')->with('success', 'Venta eliminada correctamente');
    }
}
