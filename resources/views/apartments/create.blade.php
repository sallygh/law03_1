@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-2xl font-bold font-cairo">إضافة شقة جديدة</h1>
    <form id="apartmentForm" action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
        @include('apartments.form')

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var saveButton = document.getElementById('saveButton');
        var apartmentForm = document.getElementById('apartmentForm');
        var sourceField = document.getElementById('source');

        // الحصول على قيمة 'source' من الـ URL Query Parameters
        function getQueryParameter(name) {
            var params = new URLSearchParams(window.location.search);
            return params.get(name);
        }

        var source = getQueryParameter('source') || 'direct';
        sourceField.value = source;

        saveButton.addEventListener('click', function() {
            apartmentForm.submit();
        });
    });
</script>
@endsection