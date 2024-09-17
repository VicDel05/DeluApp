<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeMenuController extends Controller
{
    public function index(){
        $user = Auth::user();
        $roleName = $user->role->nombre;
        return view('staff', compact('roleName'));
    }
}
