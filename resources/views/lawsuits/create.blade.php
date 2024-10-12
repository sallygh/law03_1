@extends('layouts.app')

@section('content')
<div class="container">
    <h1>إضافة دعوى جديدة</h1>
    <form action="{{ route('lawsuits.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">تصنيف الدعوى</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">موضوع الدعوى</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">حالة القضية</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="court">محكمة</label>
            <input type="text" name="court" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="details">تفاصيل أخرى</label>
            <textarea name="details" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection