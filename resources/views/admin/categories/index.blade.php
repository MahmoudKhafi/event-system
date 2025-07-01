@extends('layouts.app')

@section('title', 'إدارة التصنيفات')

@section('content')
    <h2 class="mb-4">📂 قائمة التصنيفات</h2>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">➕ إضافة تصنيف جديد</a>

    @if($categories->isEmpty())
        <div class="alert alert-info">لا توجد تصنيفات حالياً.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">تعديل</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
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
