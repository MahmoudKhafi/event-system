@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل التصنيف</h2>
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name">اسم التصنيف</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-primary">تحديث</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
