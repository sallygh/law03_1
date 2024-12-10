<!-- resources/views/financials/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">إضافة سجل مالي جديد</h1>
    <form action="{{ route('financials.store') }}" method="POST">
        @csrf
        @include('financials.form')
        <button type="submit" class="btn btn-success mt-3">حفظ</button>
    </form>
</div>
@endsection