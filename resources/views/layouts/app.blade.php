<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'لوحة التحكم')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar .nav-link, .navbar .navbar-brand {
            color: #fff;
        }
        .navbar .nav-link:hover {
            color: #d9e7ff;
        }
        .container {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    @auth
    <nav class="navbar navbar-expand-lg navbar-dark px-4">
        <a class="navbar-brand" href="#">النظام</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
    <a class="nav-link" 
       href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
        الرئيسية
    </a>
</li>

                @if(auth()->user()->role === 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">لوحة المشرف</a></li>
                @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-light ms-2">تسجيل الخروج</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @endauth

    <main class="container">
        @yield('content')
    </main>

</body>
</html>
