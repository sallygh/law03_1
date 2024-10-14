@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تعديل القضية</h1>
    <form action="{{ route('lawsuits.update', $lawsuit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('lawsuits.form')
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection