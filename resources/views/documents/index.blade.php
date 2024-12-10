@extends('layouts.app')

@section('content')
<h1>Documents</h1>
<a href="{{ route('documents.create') }}">Create New Document</a>
@foreach ($documents as $document)
<div>
    <h2>{{ $document->title }}</h2>
    <p>{{ $document->description }}</p>
    <a href="{{ route('documents.edit', $document->id) }}">Edit</a>
    <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endforeach
@endsection