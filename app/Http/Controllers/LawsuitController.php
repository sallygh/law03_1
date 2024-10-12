<?php

namespace App\Http\Controllers;

use App\Models\Lawsuit;
use Illuminate\Http\Request;

class LawsuitController extends Controller
{
    public function index()
    {
        $lawsuits = Lawsuit::all();
        return view('lawsuits.index', compact('lawsuits'));
    }

    public function create()
    {
        return view('lawsuits.create');
    }

    public function store(Request $request)
    {
        $lawsuit = new Lawsuit($request->all());
        $lawsuit->save();
        return redirect()->route('lawsuits.index');
    }

    public function show(Lawsuit $lawsuit)
    {
        return view('lawsuits.show', compact('lawsuit'));
    }

    public function edit(Lawsuit $lawsuit)
    {
        return view('lawsuits.edit', compact('lawsuit'));
    }

    public function update(Request $request, Lawsuit $lawsuit)
    {
        $lawsuit->update($request->all());
        return redirect()->route('lawsuits.index');
    }

    public function destroy(Lawsuit $lawsuit)
    {
        $lawsuit->delete();
        return redirect()->route('lawsuits.index');
    }
}
