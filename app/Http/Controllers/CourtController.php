<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    // عرض جميع المحاكم
    public function index()
    {
        $courts = Court::all();
        return view('courts.index', compact('courts'));
    }

    // عرض نموذج إضافة محكمة جديدة
    public function create()
    {
        return view('courts.create');
    }

    // حفظ محكمة جديدة
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'court_number' => 'required|string|unique:courts,court_number',
            'status' => 'required|in:انتظار,دراسة,تم التسجيل,تم الفصل',
            'base_number' => 'nullable|integer',
            'decision_number' => 'nullable|integer',
        ]);

        // استخدام dd لطباعة البيانات والتحقق منها

        Court::create($validatedData);
        return redirect()->route('financials.create')->with('success', 'تمت إضافة المحكمة بنجاح');
    }



    // عرض تفاصيل محكمة محددة
    public function show(Court $court)
    {
        return view('courts.show', compact('court'));
    }

    // عرض نموذج تعديل محكمة موجودة
    public function edit(Court $court)
    {
        return view('courts.edit', compact('court'));
    }

    // تحديث محكمة موجودة
    public function update(Request $request, Court $court)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'court_number' => 'required|string|unique:courts,court_number,' . $court->id,
            'status' => 'required|in:انتظار,دراسة,تم التسجيل,تم الفصل',
            'base_number' => 'nullable|integer',
            'decision_number' => 'nullable|integer',
        ]);

        $court->update($validatedData);
        return redirect()->route('courts.index')->with('success', 'تم تحديث المحكمة بنجاح');
    }

    // حذف محكمة موجودة
    public function destroy(Court $court)
    {
        $court->delete();
        return redirect()->route('courts.index')->with('success', 'تم حذف المحكمة بنجاح');
    }
}
