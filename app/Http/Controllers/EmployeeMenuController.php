<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;

class EmployeeMenuController extends Controller
{
    public function index(){
        $user = Auth::user();
        $roleName = $user->role->nombre;
        return view('staff', compact('roleName'));
    }

    public function showProducts(){
        $products = Products::with('categories')->get();;
        return view('staff.index', compact('products'));
    }
}
