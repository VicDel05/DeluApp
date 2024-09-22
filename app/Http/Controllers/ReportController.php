<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;

class ReportController extends Controller{

    public function index(){
        return view('reports.index');
    }

    public function stockReport(){
        // Productos con bajo stock (por debajo de un umbral, digamos 5)
        $lowStockProducts = Products::where('stock', '<', 5)->get();
        
        // Productos agotados
        $outOfStockProducts = Products::where('stock', '=', 0)->get();

        // Total de productos
        $totalProducts = Products::count();

        // Porcentaje de productos con bajo stock
        $lowStockPercentage = ($totalProducts > 0) ? ($lowStockProducts->count() / $totalProducts) * 100 : 0;

        return view('reports.stock', compact('lowStockProducts', 'outOfStockProducts', 'lowStockPercentage', 'totalProducts'));
    }

    public function userReport(){
        $adminUsers = User::where('role_id', '=', 1)->get();
        
        $staffUsers = User::where('role_id', '=', 2)->get();

        $totalUsers = User::count();

        //$staffPercentage = ($totalUsers > 0) ? ($adminUsers->count() / $staffUsers) * 100 : 0;

        return view('reports.user', compact('adminUsers', 'staffUsers', 'totalUsers'));
    }
}
