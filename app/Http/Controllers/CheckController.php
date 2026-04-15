<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     * */
    public function index()
    {
        return Inertia::render('Checks/Index', [
            'checks' => Check::all() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Eto yung magre-render ng bagong Vue file para sa form
        return Inertia::render('Checks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. I-validate ang mga inputs galing sa form
        $validated = $request->validate([
            'check_number' => 'required|string|max:255',
            'voucher_number' => 'required|string|max:255',
            'voucher_date' => 'required|date',
            'payee' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string|max:255',
            'account_description' => 'nullable|string|max:255',
        ]);

        // 2. I-save sa database
        Check::create($validated);

        // 3. I-redirect pabalik sa listahan ng checks (Index page)
        return redirect()->route('checks.index');
    }

    /**
     * */
    public function show(Check $check)
    {
        return Inertia::render('Checks/Print', [
            'check' => $check
        ]);
    }
}