@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-2xl font-bold font-cairo">تعديل تفاصيل الشقة</h1>
    <form action="{{ route('apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('apartments.form')
    </form>
</div>
@endsection