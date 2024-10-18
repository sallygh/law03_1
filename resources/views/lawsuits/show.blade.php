@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Modal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Main Form -->
    <form id="mainForm">
        <label for="plaintiff_name">اسم المدعي</label>
        <select name="plaintiff_name" class="js-example-basic-single">
            @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->full_name }}</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noResultsModal">إضافة موكل جديد</button>
        <button type="submit" class="btn btn-success">إرسال النموذج الرئيسي</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="noResultsModal" tabindex="-1" role="dialog" aria-labelledby="noResultsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noResultsModalLabel">اسم الموكل غير موجود، قم بإضافته إلى جدول الموكلين</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1>إضافة موكل جديد</h1>
                        <form id="createClientForm">
                            @csrf
                            <div class="form-group">
                                <label for="full_name">الاسم الثلاثي</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="notes">ملاحظات</label>
                                <textarea name="notes" class="form-control"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="submitModalForm()">حفظ</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                language: {
                    noResults: function() {
                        $('#noResultsModal').modal('show');
                        return '';
                    }
                }
            });
        });

        function submitModalForm() {
            document.getElementById('createClientForm').submit();
        }
    </script>
</body>

</html>


<!--
<div class="container mt-5">
    <h1>تفاصيل القضية</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">رقم القضية: {{ $lawsuit->id }}</h5>
            <p class="card-text">تصنيف الدعوى: {{ $lawsuit->lawsuit_type }}</p>
            <p class="card-text">موضوع الدعوى: {{ $lawsuit->lawsuit_subject }}</p>
            <p class="card-text">المحكمة: {{ $lawsuit->court }}</p>
            <p class="card-text">رقم المحكمة: {{ $lawsuit->court_number }}</p>
            <p class="card-text">اسم المدعي: {{ $lawsuit->plaintiff_name }}</p>
            <p class="card-text">اسم المدعى عليه: {{ $lawsuit->defendant_name }}</p>
            <p class="card-text">حالة القضية: {{ $lawsuit->lawsuit_status }}</p>
            <p class="card-text">المبلغ المتفق عليه: {{ $lawsuit->agreed_amount }}</p>
            <p class="card-text">المبلغ المتبقي: {{ $lawsuit->remaining_amount }}</p>
            <p class="card-text">المبلغ المدفوع: {{ $lawsuit->paid_amount }}</p>
            <p class="card-text">ملاحظات: {{ $lawsuit->notes }}</p>
            <p class="card-text">مرفقات:</p>
            <ul>
                @if($lawsuit->attachments)
                @foreach(json_decode($lawsuit->attachments, true) as $attachment)
                <li><a href="{{ asset('storage/' . $attachment) }}" target="_blank">عرض المرفق</a></li>
                @endforeach
                @else
                <li>لا توجد مرفقات</li>
                @endif
            </ul>

        </div>
    </div>
</div>
@endsection