<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lawsuit;
use Illuminate\Http\Request;
use App\Model;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;

class LawsuitController extends Controller
{



    public function index(Request $request)
    {
        $query = $request->input('query');
        $user = Auth::user();
        $lawsuitsQuery = Lawsuit::query();

        // إضافة تصفية القضايا الخاصة بالمستخدم الحالي
        $lawsuitsQuery->where('user_id', $user->id);

        // إضافة تصفية القضايا الخاصة بالفريق الحالي (إذا كان المستخدم ينتمي لفريق)
        if ($user->currentTeam) {
            $lawsuitsQuery->orWhere('team_id', $user->currentTeam->id);
        }

        // إضافة شروط البحث إذا كانت هناك استعلامات
        if ($query) {
            $lawsuitsQuery->where(function ($q) use ($query) {
                $q->where('lawsuit_type', 'LIKE', "%{$query}%")
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
                    ->orWhere('notes', 'LIKE', "%{$query}%");
            });
        }

        // استخدام التصفيّة والنماذج
        $lawsuits = $lawsuitsQuery->paginate(10);

        return view('lawsuits.index', compact('lawsuits'));
    }


    public function create()
    {
        // الحصول على المستخدم الحالي 
        $user = Auth::user();
        // الحصول على آخر رقم قضية للمستخدم الحالي 
        $lastCaseNumber = Lawsuit::where('user_id', $user->id)->max('user_case_number');
        // زيادة قيمة الرقم بمقدار واحد 
        $nextCaseNumber = $lastCaseNumber ? $lastCaseNumber + 1 : 1;

        // أنواع القضايا
        $lawsuitTypes = [
            'مدني' => ['بيع شقة', 'بيع سيارة'],
            'شرعي' => ['طلاق', 'زواج', 'خلع', 'تفريق'],
            'جزائي' => ['خيار 1', 'خيار 2'],
            'صلحي' => ['خيار 1', 'خيار 2'],
            'عسكري' => ['خيار 1', 'خيار 2'],
        ];


        // الحصول على الموكلين الخاصين بالمستخدم الحالي 
        $clients = Client::where('user_id', $user->id)->get();

        // تمرير المتغيرات إلى العرض
        return view('lawsuits.create', compact('lawsuitTypes', 'clients', 'nextCaseNumber'));
    }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'lawsuit_type' => 'required|string|max:255',
            'lawsuit_subject' => 'required|string|max:255',
        ]);

        // الحصول على المستخدم الحالي
        $user = Auth::user();
        $nextCaseNumber = Lawsuit::where('user_id', $user->id)->max('user_case_number') + 1;

        // إنشاء القضية وحفظها
        $lawsuit = new Lawsuit([
            'lawsuit_type' => $request->lawsuit_type,
            'lawsuit_subject' => $request->lawsuit_subject,
            'notes' => 'default_notes',
            'user_id' => $user->id,
            'team_id' => $user->currentTeam ? $user->currentTeam->id : null,
            'user_case_number' => $nextCaseNumber,
        ]);
        $lawsuit->save();

        // إعادة التوجيه إلى صفحة إنشاء العملاء مع رسالة نجاح
        return redirect()->route('clients.create')->with('success', 'تم حفظ القضية بنجاح');
    }






    public function show(Lawsuit $lawsuit)
    {

        $clients = Client::all();
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
        $user = Auth::user();
        $lawsuit->fill($request->all());
        $lawsuit->user_id = $user->id;
        $lawsuit->team_id = $user->currentTeam ? $user->currentTeam->id : null;
        $lawsuit->save();
        // إرجاع رد مع نجاح العملية
        return redirect()->route('lawsuits.index')->with('success', 'تم تحديث القضية بنجاح');
    }


    public function destroy(Lawsuit $lawsuit)
    {
        $lawsuit->delete();
        return redirect()->route('lawsuits.index')->with('success', 'تم حذف القضية بنجاح');
    }
}
