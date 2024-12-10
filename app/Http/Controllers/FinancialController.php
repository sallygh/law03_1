<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Lawsuit;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function index()
    {
        $financials = Financial::with('lawsuit')->get();
        return view('financials.index', compact('financials'));
    }

    public function create()
    {
        $lawsuits = Lawsuit::all();
        return view('financials.create', compact('lawsuits'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lawsuit_id' => 'required|exists:lawsuits,id',
            'agreed_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
        ]);

        Financial::create($validatedData);
        return redirect()->route('documents.create')->with('success', 'تمت إضافة السجل المالي بنجاح');
    }

    public function show(Financial $financial)
    {
        return view('financials.show', compact('financial'));
    }

    public function edit(Financial $financial)
    {
        $lawsuits = Lawsuit::all();
        return view('financials.edit', compact('financial', 'lawsuits'));
    }

    public function update(Request $request, Financial $financial)
    {
        $validatedData = $request->validate([
            'lawsuit_id' => 'required|exists:lawsuits,id',
            'agreed_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
        ]);

        $financial->update($validatedData);
        return redirect()->route('financials.index')->with('success', 'تم تحديث السجل المالي بنجاح');
    }

    public function destroy(Financial $financial)
    {
        $financial->delete();
        return redirect()->route('financials.index')->with('success', 'تم حذف السجل المالي بنجاح');
    }
}
