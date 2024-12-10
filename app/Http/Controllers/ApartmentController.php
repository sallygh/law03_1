<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    public function create()
    {
        return view('apartments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'property_number' => 'required|string|max:255',
            'real_estate_area' => 'required|string|max:255',
            'share_quota' => 'required|string|max:255',
            'area' => 'required|numeric',
            'direction' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'financial' => 'required|string|max:255',
            'previous_signs' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'attachments' => 'nullable|json',
        ]);

        $apartment = new Apartment($request->all());
        $apartment->save();


        return redirect()->route('apartments.index')->with('success', 'تم إنشاء الشقة بنجاح.');
    }



    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }


    public function edit(Apartment $apartment)
    {
        return view('apartments.edit', compact('apartment'));
    }


    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'property_number' => 'required|string|max:255',
            'real_estate_area' => 'required|string|max:255',
            'share_quota' => 'required|string|max:255',
            'area' => 'required|numeric',
            'direction' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'financial' => 'required|string|max:255',
            'previous_signs' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'attachments' => 'nullable|json',
        ]);

        $apartment->update($request->all());

        return redirect()->route('apartments.index')->with('success', 'تم تحديث الشقة بنجاح.');
    }


    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return redirect()->route('apartments.index')->with('success', 'تم حذف الشقة بنجاح.');
    }


    public function index(Request $request)
    {
        $search = $request->query('search');
        $apartments = Apartment::query()
            ->where('property_number', 'LIKE', "%{$search}%")
            ->orWhere('real_estate_area', 'LIKE', "%{$search}%")
            ->orWhere('share_quota', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->get();

        return view('apartments.index', compact('apartments'));
    }
}
