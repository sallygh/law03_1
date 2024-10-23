<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lawsuit;
use Illuminate\Http\Request;
use App\Model;


class LawsuitController extends Controller
{



    public function index(Request $request)
    {
        $lawsuits = Lawsuit::all();
        $query = $request->input('query');

        if ($query) {
            $lawsuits = Lawsuit::where('lawsuit_type', 'LIKE', "%{$query}%")
                ->orWhere('lawsuit_subject', 'LIKE', "%{$query}%")
                ->orWhere('court', 'LIKE', "%{$query}%")
                ->orWhere('court_number', 'LIKE', "%{$query}%")
                ->orWhere('plaintiff_name', 'LIKE', "%{$query}%")
                ->orWhere('defendant_name', 'LIKE', "%{$query}%")
                ->orWhere('lawsuit_status', 'LIKE', "%{$query}%")
                ->orWhere('base_number', 'LIKE', "%{$query}%")
                ->orWhere('decision_number', 'LIKE', "%{$query}%")
                ->orWhere('agreed_amount', 'LIKE', "%{$query}%")
                ->orWhere('remaining_amount', 'LIKE', "%{$query}%")
                ->orWhere('paid_amount', 'LIKE', "%{$query}%")
                ->orWhere('notes', 'LIKE', "%{$query}%")
                ->paginate(10);
        } else {
            $lawsuits = Lawsuit::paginate(10);
        }

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
            'base_number' => 'nullable|integer|min:1|max:50000',
            'decision_number' => 'nullable|integer|min:1|max:50000',
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

        // إرجاع رد مع نجاح العملية
        // قم بحفظ البيانات في قاعدة البيانات
        Lawsuit::create($validatedData);

        // إعادة التوجيه أو عرض رسالة نجاح
        return redirect()->route('lawsuits.index')->with('success', 'تم إنشاء القضية بنجاح');
    }



    public function show(Lawsuit $lawsuit)
    {

        $clients = Client::all();
        $lawsuit->load('plaintiff', 'defendant');
        return view('lawsuits.show', compact('lawsuit', 'clients'));
    }


    public function edit(Lawsuit $lawsuit)
    {
        $lawsuitTypes = [
            'مدني' => ['بيع شقة', 'بيع سيارة'],
            'شرعي' => ['طلاق', 'زواج', 'خلع', 'تفريق'],
            'جزائي' => ['خيار 1', 'خيار 2'],
            'صلحي' => ['خيار 1', 'خيار 2'],
            'عسكري' => ['خيار 1', 'خيار 2'],
        ];
        $clients = Client::all();
        return view('lawsuits.edit', compact('lawsuit', 'lawsuitTypes', 'clients'));
    }

    public function update(Request $request, Lawsuit $lawsuit)
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
            'base_number' => 'nullable|integer|min:1|max:50000',
            'decision_number' => 'nullable|integer|min:1|max:50000',
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

        // تحديث القضية
        $lawsuit->update($validatedData);

        // إرجاع رد مع نجاح العملية
        return redirect()->route('lawsuits.index')->with('success', 'تم تحديث القضية بنجاح');
    }


    public function destroy(Lawsuit $lawsuit)
    {
        $lawsuit->delete();
        return redirect()->route('lawsuits.index')->with('success', 'تم حذف القضية بنجاح');
    }
}
