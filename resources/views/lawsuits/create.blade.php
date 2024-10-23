@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-bold mb-4 text-center">إضافة قضية جديدة</h1>
    <form action="{{ route('lawsuits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('lawsuits.form')
        <button type="submit" class="btn btn-primary mt-3">حفظ</button>
    </form>
</div>
@endsection