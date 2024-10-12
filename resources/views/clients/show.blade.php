@extends('layouts.app')

@section('content')
<div class="container">
    <h1>عرض الموكل</h1>
    <div class="form-group">
        <label>الاسم الثلاثي:</label>
        <p>{{ $client->full_name }}</p>
    </div>
    <div class="form-group">
        <label>رقم الهاتف:</label>
        <p>{{ $client->phone }}</p>
    </div>
    <div class="form-group">
        <label>العنوان:</label>
        <p>{{ $client->address }}</p>
    </div>
    <div class="form-group">
        <label>ملاحظات:</label>
        <p>{{ $client->notes }}</p>
    </div>
    <a href="{{ route('clients.index') }}" class="btn btn-primary">العودة إلى القائمة</a>
</div>
@endsection