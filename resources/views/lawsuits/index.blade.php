@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-2xl font-bold font-cairo">قائمة القضايا</h1>
    <a href="{{ route('lawsuits.create') }}" class="btn btn-primary mb-3 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">إضافة قضية جديدة</a>
    <table class="table-auto w-full border-collapse bg-white shadow-md rounded overflow-hidden">
        <thead class="bg-gray-800 text-white font-cairo">
            <tr>
                <th class="p-3 text-center">رقم القضية</th>
                <th class="p-3 text-center">تصنيف الدعوى</th>
                <th class="p-3 text-center">موضوع الدعوى</th>
                <th class="p-3 text-center">المحكمة</th>
                <th class="p-3 text-center">حالة القضية</th>
                <th class="p-3 text-center">رقم الأساس</th>
                <th class="p-3 text-center">رقم القرار</th>
                <th class="p-3 text-center">الإجراءات</th>
            </tr>
        </thead>
        <tbody class="font-cairo">
            @foreach($lawsuits as $lawsuit)
            <tr class="border-b hover:bg-gray-100">
                <td class="p-3 text-center">{{ $lawsuit->id }}</td>
                <td class="p-3 text-center">{{ $lawsuit->lawsuit_type }}</td>
                <td class="p-3 text-center">{{ $lawsuit->lawsuit_subject }}</td>
                <td class="p-3 text-center">{{ $lawsuit->court }}</td>
                <td class="p-3 text-center">{{ $lawsuit->lawsuit_status }}</td>
                <td class="p-3 text-center">{{ $lawsuit->base_number }}</td>
                <td class="p-3 text-center">{{ $lawsuit->decision_number }}</td>
                <td class="p-3 text-center">
                    <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-info btn-sm bg-green-500 text-white py-1 px-3 rounded hover:bg-green-700">عرض</a>
                    <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="btn btn-warning btn-sm bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-700">تعديل</a>
                    <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm('هل أنت متأكد أنك تريد حذف هذه القضية؟ هذا الإجراء لا يمكن التراجع عنه.');
    }
</script>
@endsection