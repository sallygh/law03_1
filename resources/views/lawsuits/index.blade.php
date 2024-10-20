@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">قائمة القضايا</h1>
    <a href="{{ route('lawsuits.create') }}" class="btn btn-primary mb-3">إضافة قضية جديدة</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>رقم القضية</th>
                <th>تصنيف الدعوى</th>
                <th>موضوع الدعوى</th>
                <th>المحكمة</th>
                <th>حالة القضية</th>
                <th>رقم الأساس</th>
                <th>رقم القرار</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lawsuits as $lawsuit)
            <tr>
                <td>{{ $lawsuit->id }}</td>
                <td>{{ $lawsuit->lawsuit_type }}</td>
                <td>{{ $lawsuit->lawsuit_subject }}</td>
                <td>{{ $lawsuit->court }}</td>
                <td>{{ $lawsuit->lawsuit_status }}</td>
                <td>{{ $lawsuit->base_number }}</td>
                <td>{{ $lawsuit->decision_number }}</td>
                <td>
                    <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection