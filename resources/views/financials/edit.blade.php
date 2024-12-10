<!-- resources/views/financials/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">تعديل السجل المالي</h1>
    <form action="{{ route('financials.update', $financial->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('financials.form', ['financial' => $financial])
        <button type="submit" class="btn btn-success mt-3">تحديث</button>
    </form>
</div>
@endsection