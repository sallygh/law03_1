@extends('layouts.app')

@section('content')
<div class="container">
    <h1>قائمة الموكلين</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">إضافة موكل جديد</a>
    <table class="table">
        <thead>
            <tr>
                <th>رقم</th>
                <th>الاسم الثلاثي</th>
                <th>رقم الهاتف</th>
                <th>العنوان</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->full_name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->address }}</td>
                <td>
                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">عرض</a>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">تعديل</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection