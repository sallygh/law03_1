@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تفاصيل القضية</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">رقم القضية: {{ $lawsuit->id }}</h5>
            <p class="card-text">تصنيف الدعوى: {{ $lawsuit->lawsuit_type }}</p>
            <p class="card-text">موضوع الدعوى: {{ $lawsuit->lawsuit_subject }}</p>
            <p class="card-text">المحكمة: {{ $lawsuit->court }}</p>
            <p class="card-text">رقم المحكمة: {{ $lawsuit->court_number }}</p>
            <p class="card-text">اسم المدعي: {{ $lawsuit->plaintiff_name }}</p>
            <p class="card-text">اسم المدعى عليه: {{ $lawsuit->defendant_name }}</p>
            <p class="card-text">حالة القضية: {{ $lawsuit->lawsuit_status }}</p>
            <p class="card-text">المبلغ المتفق عليه: {{ $lawsuit->agreed_amount }}</p>
            <p class="card-text">المبلغ المتبقي: {{ $lawsuit->remaining_amount }}</p>
            <p class="card-text">المبلغ المدفوع: {{ $lawsuit->paid_amount }}</p>
            <p class="card-text">ملاحظات: {{ $lawsuit->notes }}</p>
            <p class="card-text">مرفقات:</p>
            <ul>
                @foreach(json_decode($lawsuit->attachments, true) as $attachment)
                <li><a href="{{ asset('storage/' . $attachment) }}" target="_blank">عرض المرفق</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection