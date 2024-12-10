<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lawsuit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');
        $user = Auth::user();
        $clientsQuery = Client::query();

        // إضافة تصفية الموكلين الخاصة بالمستخدم الحالي
        $clientsQuery->where('user_id', $user->id);

        // إضافة تصفية الموكلين الخاصة بالفريق الحالي (إذا كان المستخدم ينتمي لفريق)
        if ($user->currentTeam) {
            $clientsQuery->orWhere('team_id', $user->currentTeam->id);
        }

        // إضافة شروط البحث إذا كانت هناك استعلامات
        if ($query) {
            $clientsQuery->where(function ($q) use ($query) {
                $q->where('full_name', 'LIKE', "%{$query}%")
                    ->orWhere('phone', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%");
            });
        }

        // استخدام التصفيّة والنماذج
        $clients = $clientsQuery->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create(Request $request)
    {

        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $user = Auth::user();
        $nextClientNumber = Client::where('user_id', $user->id)->max('user_client_number') + 1;

        $client = new Client($validatedData);
        $client->user_id = $user->id;
        $client->team_id = $user->currentTeam ? $user->currentTeam->id : null;
        $client->user_client_number = $nextClientNumber;
        $client->save();

        // إعادة التوجيه إلى صفحة إضافة تفاصيل الشقة
        return redirect()->route('courts.create')->with('success', 'تم حفظ العميل بنجاح. يرجى إضافة تفاصيل الشقة.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $client->update($validatedData);
        $user = Auth::user();
        $client->fill($request->all());
        $client->user_id = $user->id;
        $client->team_id = $user->currentTeam ? $user->currentTeam->id : null;
        $client->save();
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function list()
    {
        $clients = Client::all();
        return response()->json(['clients' => $clients]);
    }
}
