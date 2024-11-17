@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-2xl font-bold font-cairo">قائمة الشقق</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- نموذج البحث -->
    <form action="{{ route('apartments.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" class="form-control" placeholder="ابحث عن شقة..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-primary mt-2">بحث</button>
    </form>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>رقم العقار</th>
                <th>المنطقة العقارية</th>
                <th>الحصة السهمية</th>
                <th>المساحة</th>
                <th>الاتجاه</th>
                <th>العنوان</th>
                <th>المالية</th>
                <th>إشارات سابقة</th>
                <th>ملاحظات</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
            <tr>
                <td>{{ $apartment->property_number }}</td>
                <td>{{ $apartment->real_estate_area }}</td>
                <td>{{ $apartment->share_quota }}</td>
                <td>{{ $apartment->area }}</td>
                <td>{{ $apartment->direction }}</td>
                <td>{{ $apartment->address }}</td>
                <td>{{ $apartment->financial }}</td>
                <td>{{ $apartment->previous_signs }}</td>
                <td>{{ $apartment->notes }}</td>
                <td>
                    <a href="{{ route('apartments.show', $apartment->id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection