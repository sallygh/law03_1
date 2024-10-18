<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lawsuit;
use Illuminate\Http\Request;
use App\Model;


class LawsuitController extends Controller
{
    public function index()
    {
        $lawsuits = Lawsuit::all();
        return view('lawsuits.index', compact('lawsuits'));
    }
    public function create()
    {
        $lawsuitTypes = [
            'مدني' => ['بيع شقة', 'بيع سيارة'],
            'شرعي' => ['طلاق', 'زواج', 'خلع', 'تفريق'],
            'جزائي' => ['خيار 1', 'خيار 2'],
            'صلحي' => ['خيار 1', 'خيار 2'],
            'عسكري' => ['خيار 1', 'خيار 2'],
        ];

        $clients = Client::all();

        return view('lawsuits.create', compact('lawsuitTypes', 'clients'));
    }




    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'lawsuit_type' => 'nullable|string|max:255',
            'lawsuit_subject' => 'nullable|string|max:255',
            'court' => 'nullable|string|max:255',
            'court_number' => 'nullable|string|max:255',
            'plaintiff_name' => 'nullable|string|max:255',
            'defendant_name' => 'nullable|string|max:255',
            'lawsuit_status' => 'nullable|string|max:255',
            'attachments.*' => 'file|mimes:jpeg,png,jpg,gif,svg,doc,docx|max:2048',
            'agreed_amount' => 'nullable|numeric',
            'remaining_amount' => 'nullable|numeric',
            'paid_amount' => 'nullable|numeric',
            'notes' => 'nullable|string',

        ]);


        // حفظ المرفقات إذا كانت موجودة
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $validatedData['attachments'] = json_encode($attachments);
        }

        // إنشاء القضية
        Lawsuit::create($validatedData);
        dd($validatedData);
        //   return redirect()->route('lawsuits.index')->with('success', 'تم إضافة القضية بنجاح');
    }


    public function show(Lawsuit $lawsuit)
    {

        $clients = Client::all();

        return view('lawsuits.show', compact('lawsuit', 'clients'));
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
