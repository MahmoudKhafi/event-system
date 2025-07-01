@extends('layouts.app')

@section('title', 'المسجلون في الفعالية')

@section('content')
<div class="container">
    <h2 class="mb-4">المستخدمون المسجلون في: {{ $event->title }}</h2>

    @if($registrations && $registrations->count())
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>تاريخ التسجيل</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        <td>{{ $registration->user->name ?? 'غير معروف' }}</td>
                        <td>{{ $registration->user->email ?? '-' }}</td>
                        <td>{{ $registration->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">لا يوجد أي مسجلين في هذه الفعالية.</div>
    @endif
</div>
@endsection
