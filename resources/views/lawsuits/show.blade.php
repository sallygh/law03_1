@extends('layouts.app')

@section('content')



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<select class="js-example-basic-single" name="state">
    <option value="AL">Alabama</option>
    <option value="WY">Wyoming</option>
</select>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            tags: true
        });
    });
</script>

<div class="container mt-5">
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