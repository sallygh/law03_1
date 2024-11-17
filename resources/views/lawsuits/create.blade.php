@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-bold mb-4 text-center">إضافة قضية جديدة</h1>
    <form action="{{ route('lawsuits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('lawsuits.form')
        <button type="submit" class="btn btn-primary mt-3">حفظ</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lawsuitForm = document.getElementById('lawsuitForm');

            // حفظ البيانات في الجلسة عند النقر على زر "تفاصيل"
            document.getElementById('detailsButton').addEventListener('click', function() {
                var formData = new FormData(lawsuitForm);
                var lawsuitData = {};
                formData.forEach(function(value, key) {
                    lawsuitData[key] = value;
                });
                sessionStorage.setItem('lawsuitData', JSON.stringify(lawsuitData));
                location.href = '/apartments/create?source=lawsuit';
            });
        });
    </script>

</div>
@endsection