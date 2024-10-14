@extends('layouts.app')

@section('content')
<div class="container">
    <h1>قائمة القضايا</h1>
    <a href="{{ route('lawsuits.create') }}" class="btn btn-primary">إضافة قضية جديدة</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>رقم القضية</th>
                <th>تصنيف الدعوى</th>
                <th>موضوع الدعوى</th>
                <th>المحكمة</th>
                <th>حالة القضية</th>
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
                <td>
                    <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-info">عرض</a>
                    <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="btn btn-warning">تعديل</a>
                    <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection