@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">تفاصيل القضية</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="align-middle">رقم القضية</th>
                        <td class="align-middle">{{ $lawsuit->id }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">تصنيف الدعوى</th>
                        <td class="align-middle">{{ $lawsuit->lawsuit_type }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">موضوع الدعوى</th>
                        <td class="align-middle">{{ $lawsuit->lawsuit_subject }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">المحكمة</th>
                        <td class="align-middle">{{ $lawsuit->court }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">رقم المحكمة</th>
                        <td class="align-middle">{{ $lawsuit->court_number }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">اسم المدعي</th>
                        <td class="align-middle">{{ $lawsuit->plaintiff_name }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">اسم المدعى عليه</th>
                        <td class="align-middle">{{ $lawsuit->defendant_name }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">حالة القضية</th>
                        <td class="align-middle">{{ $lawsuit->lawsuit_status }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">المبلغ المتفق عليه</th>
                        <td class="align-middle">{{ $lawsuit->agreed_amount }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">المبلغ المتبقي</th>
                        <td class="align-middle">{{ $lawsuit->remaining_amount }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">المبلغ المدفوع</th>
                        <td class="align-middle">{{ $lawsuit->paid_amount }}</td>
                    </tr>
                    <tr>
                        <th>ملاحظات</th>
                        <td class="align-middle">{{ $lawsuit->notes }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">مرفقات</th>
                        <td class="align-middle">
                            <ul class="list-group list-group-flush text-center">
                                @if($lawsuit->attachments)
                                @foreach(json_decode($lawsuit->attachments, true) as $attachment)
                                <li class="list-group-item"><a href="{{ asset('storage/' . $attachment) }}" target="_blank">عرض المرفق</a></li>
                                @endforeach
                                @else
                                <li class="list-group-item">لا توجد مرفقات</li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('lawsuits.index') }}" class="btn btn-primary mt-3">العودة إلى قائمة القضايا</a>
</div>
@endsection