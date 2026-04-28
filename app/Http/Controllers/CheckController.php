<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return Inertia::render('Checks/Index', [
            'checks' => Check::all() 
        ]);
    }

    public function create()
    {
        return Inertia::render('Checks/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'check_number' => 'required|string|max:255',
            'voucher_number' => 'required|string|max:255',
            'voucher_date' => 'required|date',
            'payee' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string|max:255',
            'account_description' => 'nullable|string|max:255',
        ]);

        Check::create($validated);

        return redirect()->route('checks.index');
    }

    public function show(Check $check)
    {
        // Inject the amounts for the columns
        $check->debit_amount = $check->amount; 
        $check->credit_amount = 0.00; 

        return Inertia::render('Checks/Print', [
            'check' => $check
        ]);
    }
}