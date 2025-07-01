@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">✏️ تعديل الفعالية</h1>

    <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">عنوان الفعالية</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">المكان</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">التاريخ</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">التصنيف</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">💾 حفظ التعديلات</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">🔙 رجوع</a>
    </form>
</div>
@endsection
