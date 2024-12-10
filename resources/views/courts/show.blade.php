<!-- resources/views/courts/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">تفاصيل المحكمة: {{ $court->name }}</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>اسم المحكمة:</strong> {{ $court->name }}</li>
        <li class="list-group-item"><strong>الموقع:</strong> {{ $court->location }}</li>
        <li class="list-group-item"><strong>رقم المحكمة:</strong> {{ $court->court_number }}</li>
        <li class="list-group-item"><strong>حالة القضية:</strong> {{ $court->status }}</li>
        <li class="list-group-item"><strong>رقم الأساس:</strong> {{ $court->base_number }}</li>
        <li class="list-group-item"><strong>رقم القرار:</strong> {{ $court->decision_number }}</li>
    </ul>
    <a href="{{ route('courts.index') }}" class="btn btn-primary mt-3">العودة إلى القائمة</a>
</div>
@endsection