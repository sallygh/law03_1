<!-- resources/views/courts/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">تعديل المحكمة: {{ $court->name }}</h1>
    <form action="{{ route('courts.update', $court->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('courts.form', ['court' => $court])
        <button type="submit" class="btn btn-success mt-3">تحديث</button>
    </form>
    @endsection