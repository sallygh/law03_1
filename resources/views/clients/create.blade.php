@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-5">
        <h1 class="text-2xl font-bold mb-4 text-center">إضافة قضية جديدة</h1>
        <form action="{{ route('clients.store') }}" method="POST">


            @csrf
            @include('clients.form')
        </form>
    </div>
</div>
@endsection