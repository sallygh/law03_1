@extends('layouts.app')

@section('content')
<div class="container mt-5 mx-auto">
    <h1 class="mb-4 text-center text-2xl font-bold">قائمة القضايا</h1>

    <!-- نموذج البحث -->
    <form action="{{ route('lawsuits.index') }}" method="GET" class="mt-5 flex justify-center">
        <input type="text" name="query" placeholder="ابحث في القضايا..." value="{{ request('query') }}" class="border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
        <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring ring-gray-300 transition duration-150">بحث</button>
    </form>

    <a href="{{ route('lawsuits.create') }}" class="btn btn-primary mb-3 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">إضافة قضية جديدة</a>

    <!-- التنسيق باستخدام كروت للجوال -->
    <div class="block md:hidden grid grid-cols-1 gap-4">
        @foreach($lawsuits as $lawsuit)
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center">
                <div class="font-bold text-lg">{{ $lawsuit->user_case_number }}</div>
                <div class="flex space-x-2">
                    <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-700">عرض</a>
                    <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-700">تعديل</a>
                    <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700">حذف</button>
                    </form>
                </div>
            </div>
            <div class="mt-2">
                <div class="text-sm text-gray-700"><span class="font-bold">تصنيف الدعوى:</span> {{ $lawsuit->lawsuit_type }}</div>
                <div class="text-sm text-gray-700"><span class="font-bold">موضوع الدعوى:</span> {{ $lawsuit->lawsuit_subject }}</div>
                <div class="text-sm text-gray-700"><span class="font-bold">المحكمة:</span> {{ $lawsuit->court }}</div>
                <div class="text-sm text-gray-700"><span class="font-bold">حالة القضية:</span> {{ $lawsuit->lawsuit_status }}</div>
                <div class="text-sm text-gray-700"><span class="font-bold">رقم الأساس:</span> {{ $lawsuit->base_number }}</div>
                <div class="text-sm text-gray-700"><span class="font-bold">رقم القرار:</span> {{ $lawsuit->decision_number }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- التنسيق باستخدام جدول للكمبيوتر -->
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-center">رقم الدعوى</th>
                    <th class="py-3 px-6 text-center">تصنيف الدعوى</th>
                    <th class="py-3 px-6 text-center">موضوع الدعوى</th>
                    <th class="py-3 px-6 text-center">المحكمة</th>
                    <th class="py-3 px-6 text-center">حالة القضية</th>
                    <th class="py-3 px-6 text-center">رقم الأساس</th>
                    <th class="py-3 px-6 text-center">رقم القرار</th>
                    <th class="py-3 px-6 text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lawsuits as $lawsuit)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">{{ $lawsuit->user_case_number }}</td>
                    <td class="py-3 px-6 text-center">{{ $lawsuit->lawsuit_type }}</td>
                    <td class="py-3 px-6 text-center">{{ $lawsuit->lawsuit_subject }}</td>
                    <td class="py-3 px-6 text-center">{{ $lawsuit->court }}</td>
                    <td class="py-3 px-6 text-center">{{ $lawsuit->lawsuit_status }}</td>
                    <td class="py-3 px-6 text-center">{{ $lawsuit->base_number }}</td>
                    <td class="py-3 px-6 text-center">{{ $lawsuit->decision_number }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="inline-block bg-green-500 text-white py-1 px-3 rounded hover:bg-green-700">عرض</a>
                        <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="inline-block bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-700">تعديل</a>
                        <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" class="inline" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- عرض روابط التصفية -->
    {{ $lawsuits->appends(request()->input())->links() }}
</div>

<script>
    function confirmDelete() {
        return confirm('هل أنت متأكد أنك تريد حذف هذه القضية؟ هذا الإجراء لا يمكن التراجع عنه.');
    }
</script>
@endsection