<!-- resources/views/courts/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">إضافة محكمة جديدة</h1>
    <form action="{{ route('courts.store') }}" method="POST">
        @csrf
        @include('courts.form')
        <button type="submit" class="btn btn-success mt-3">حفظ</button>
    </form>
</div>
@endsection