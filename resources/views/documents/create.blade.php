@extends('layouts.app')

@section('content')
<h1>Create Document</h1>
<form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('documents.form')
    <button type="submit">Create</button>
</form>
@endsection