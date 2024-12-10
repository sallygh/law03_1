<!-- resources/views/financials/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">تفاصيل السجل المالي</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>رقم القضية:</strong> {{ $financial->lawsuit_id }}</li>
        <li class="list-group-item"><strong>المبلغ المتفق عليه:</strong> {{ $financial->agreed_amount }}</li>
        <li class="list-group-item"><strong>المبلغ المدفوع:</strong> {{ $financial->paid_amount }}</li>
        <li class="list-group-item"><strong>المتبقي:</strong> {{ $financial->remaining_amount }}</li>
    </ul>
    <a href="{{ route('financials.index') }}" class="btn btn-primary mt-3">العودة إلى القائمة</a>
</div>
@endsection