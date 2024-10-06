<?php

namespace App\Http\Controllers;

use App\Models\Product_sale;
use App\Models\Products;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SalesController extends Controller
{
    // Mostrar todas las ventas
    public function index(){
        // Obtener todas las ventas con sus productos y el usuario correspondiente
        $sales = Sales::with(['products', 'users'])->orderBy('created_at', 'desc')->paginate(7);
        
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

        $venta = Sales::create([
            'users_id' => $request->input('users_id'),
            'fecha_venta' => $request->input('fecha_venta'),
            'total' => 0,
        ]);

        $total = 0;

        foreach ($request->input('products') as $producto) {
            if ($producto['stock'] > 0){
                // Verificar si el producto tiene stock disponible
                $product = Products::find($producto['id']);
                if ($product->stock >= $producto['stock']) {
                    // Actualizar el stock del producto
                    $product->stock -= $producto['stock'];
                    $product->save();
        
                    // Calcular el total de la venta
                    $total += $producto['stock'] * $producto['precio'];
        
                    // Crear un nuevo registro en la tabla de detalles de venta
                    Product_sale::create([
                        'products_id' => $producto['id'],
                        'sales_id' => $venta->id,
                        'cantidad' => $producto['stock'],
                        'precio_unitario' => $producto['precio'],
                    ]);
                }
            }
        }

        $venta->total = $total;
        $venta->save();

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
