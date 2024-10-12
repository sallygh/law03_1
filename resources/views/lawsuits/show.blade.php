@extends('layouts.app')

@section('content')
<div class="container">
    <h1>عرض الدعوى</h1>
    <div class="form-group">
        <label>تصنيف الدعوى:</label>
        <p>{{ $lawsuit->type }}</p>
    </div>
    <div class="form-group">
        <label>موضوع الدعوى:</label>
        <p>{{ $lawsuit->subject }}</p>
    </div>
    <div class="form-group">
        <label>حالة القضية:</label>
        <p>{{ $lawsuit->status }}</p>
    </div>
    <div class="form-group">
        <label>محكمة:</label>
        <p>{{ $lawsuit->court }}</p>
    </div>
    <div class="form-group">
        <label>تفاصيل أخرى:</label>
        <p>{{ $lawsuit->details }}</p>
    </div>
    <div class="form-group">
        <label>ملاحظات:</label>
        <p>{{ $lawsuit->notes }}</p>
    </div>
    <a href="{{ route('lawsuits.index') }}" class="btn btn-primary">العودة إلى القائمة</a>
</div>
@endsection