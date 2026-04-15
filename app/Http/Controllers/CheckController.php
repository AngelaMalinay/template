<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        return Inertia::render('Checks/Index', [
            'checks' => Check::all() 
        ]);
    }

    /**
     * 
     */
    public function show(Check $check)
    {
        return Inertia::render('Checks/Print', [
            'check' => $check
        ]);
    }
}