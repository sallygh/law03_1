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
        $validatedData = $request->validate([
            'lawsuit_type' => 'required|string|max:255',
            'lawsuit_subject' => 'required|string|max:255',
            'court' => 'required|string|max:255',
            'court_number' => 'required|string|max:255',
            'plaintiff_name' => 'required|string|max:255',
            'defendant_name' => 'required|string|max:255',
            'lawsuit_status' => 'required|string|max:255',
            'attachments.*' => 'file|mimes:jpeg,png,jpg,gif,svg,doc,docx|max:2048',
            'agreed_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $validatedData['attachments'] = json_encode($attachments);
        }

        Lawsuit::create($validatedData);
        return redirect()->route('lawsuits.index')->with('success', 'تم إضافة القضية بنجاح');
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
        $validatedData = $request->validate([
            'lawsuit_type' => 'required|string|max:255',
            'lawsuit_subject' => 'required|string|max:255',
            'court' => 'required|string|max:255',
            'court_number' => 'required|string|max:255',
            'plaintiff_name' => 'required|string|max:255',
            'defendant_name' => 'required|string|max:255',
            'lawsuit_status' => 'required|string|max:255',
            'attachments.*' => 'file|mimes:jpeg,png,jpg,gif,svg,doc,docx|max:2048',
            'agreed_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $validatedData['attachments'] = json_encode($attachments);
        }

        $lawsuit->update($validatedData);

        return redirect()->route('lawsuits.index')->with('success', 'تم تحديث القضية بنجاح');
    }

    public function destroy(Lawsuit $lawsuit)
    {
        $lawsuit->delete();
        return redirect()->route('lawsuits.index')->with('success', 'تم حذف القضية بنجاح');
    }
}
