@extends('layouts.app')

@section('content')
<div class="container">
    <h1>قائمة الدعاوى</h1>
    <a href="{{ route('lawsuits.create') }}" class="btn btn-primary">إضافة دعوى جديدة</a>
    <table class="table">
        <thead>
            <tr>
                <th>رقم</th>
                <th>تصنيف الدعوى</th>
                <th>موضوع الدعوى</th>
                <th>حالة القضية</th>
                <th>محكمة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lawsuits as $lawsuit)
            <tr>
                <td>{{ $lawsuit->id }}</td>
                <td>{{ $lawsuit->type }}</td>
                <td>{{ $lawsuit->subject }}</td>
                <td>{{ $lawsuit->status }}</td>
                <td>{{ $lawsuit->court }}</td>
                <td>
                    <a href="{{ route('lawsuits.show', $lawsuit->id) }}" class="btn btn-info">عرض</a>
                    <a href="{{ route('lawsuits.edit', $lawsuit->id) }}" class="btn btn-warning">تعديل</a>
                    <form action="{{ route('lawsuits.destroy', $lawsuit->id) }}" method="POST" style="display:inline;">
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