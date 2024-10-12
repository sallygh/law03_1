@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تعديل الدعوى</h1>
    <form action="{{ route('lawsuits.update', $lawsuit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type">تصنيف الدعوى</label>
            <input type="text" name="type" class="form-control" value="{{ $lawsuit->type }}" required>
        </div>
        <div class="form-group">
            <label for="subject">موضوع الدعوى</label>
            <input type="text" name="subject" class="form-control" value="{{ $lawsuit->subject }}" required>
        </div>
        <div class="form-group">
            <label for="status">حالة القضية</label>
            <input type="text" name="status" class="form-control" value="{{ $lawsuit->status }}" required>
        </div>
        <div class="form-group">
            <label for="court">محكمة</label>
            <input type="text" name="court" class="form-control" value="{{ $lawsuit->court }}" required>
        </div>
        <div class="form-group">
            <label for="details">تفاصيل أخرى</label>
            <textarea name="details" class="form-control">{{ $lawsuit->details }}</textarea>
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" class="form-control">{{ $lawsuit->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection