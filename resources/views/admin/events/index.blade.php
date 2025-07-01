@extends('layouts.app')

@section('title', 'إدارة الفعاليات')

@section('content')
    <h2 class="mb-4">📅 قائمة الفعاليات</h2>

    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">➕ إضافة فعالية جديدة</a>

    @if($events->isEmpty())
        <div class="alert alert-info">لا توجد فعاليات حالياً.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>العنوان</th>
                    <th>التاريخ</th>
                    <th>المكان</th>
                    <th>التصنيف</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->category->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning">تعديل</a>
                            <a href="{{ route('admin.events.registrations', $event) }}" class="btn btn-sm btn-info">المسجلين</a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
