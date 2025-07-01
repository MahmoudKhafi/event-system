@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة تصنيف</h2>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name">اسم التصنيف</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">حفظ</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection

