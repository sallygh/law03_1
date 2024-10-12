@extends('layouts.app')

@section('content')
<div class="container">
    <h1>إضافة موكل جديد</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="full_name">الاسم الثلاثي</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">العنوان</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection