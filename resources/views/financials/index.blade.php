<!-- resources/views/financials/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">قائمة السجلات المالية</h1>
    <a href="{{ route('financials.create') }}" class="btn btn-primary mb-3">إضافة سجل مالي جديد</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم القضية</th>
                <th>المبلغ المتفق عليه</th>
                <th>المبلغ المدفوع</th>
                <th>المتبقي</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($financials as $financial)
            <tr>
                <td>{{ $financial->lawsuit_id }}</td>
                <td>{{ $financial->agreed_amount }}</td>
                <td>{{ $financial->paid_amount }}</td>
                <td>{{ $financial->remaining_amount }}</td>
                <td>
                    <a href="{{ route('financials.edit', $financial->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('financials.destroy', $financial->id) }}" method="POST" class="d-inline">
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