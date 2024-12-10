@extends('layouts.app')

@section('content')
<h1>Edit Document</h1>
<form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('documents.form', ['document' => $document])
    <button type="submit">Update</button>
</form>
@endsection