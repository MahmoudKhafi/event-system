@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">➕ إضافة فعالية جديدة</h1>

    <form method="POST" action="{{ route('admin.events.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">عنوان الفعالية</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">المكان</label>
            <input type="text" name="location" class="form-control" required value="{{ old('location') }}">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">التاريخ</label>
            <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">التصنيف</label>
            <select name="category_id" class="form-select" required>
                <option value="">اختر التصنيف</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 حفظ الفعالية</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">🔙 رجوع</a>
    </form>
</div>
@endsection
