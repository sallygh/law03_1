<!-- resources/views/courts/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">قائمة المحاكم</h1>
    <a href="{{ route('courts.create') }}" class="btn btn-primary mb-3">إضافة محكمة جديدة</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>اسم المحكمة</th>
                <th>الموقع</th>
                <th>رقم المحكمة</th>
                <th>حالة القضية</th>
                <th>رقم الأساس</th>
                <th>رقم القرار</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courts as $court)
            <tr>
                <td>{{ $court->name }}</td>
                <td>{{ $court->location }}</td>
                <td>{{ $court->court_number }}</td>
                <td>{{ $court->status }}</td>
                <td>{{ $court->base_number }}</td>
                <td>{{ $court->decision_number }}</td>
                <td>
                    <a href="{{ route('courts.edit', $court->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('courts.destroy', $court->id) }}" method="POST" class="d-inline">
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