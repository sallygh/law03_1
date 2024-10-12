@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تعديل الموكل</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="full_name">الاسم الثلاثي</label>
            <input type="text" name="full_name" class="form-control" value="{{ $client->full_name }}" required>
        </div>
        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}" required>
        </div>
        <div class="form-group">
            <label for="address">العنوان</label>
            <input type="text" name="address" class="form-control" value="{{ $client->address }}" required>
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" class="form-control">{{ $client->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection