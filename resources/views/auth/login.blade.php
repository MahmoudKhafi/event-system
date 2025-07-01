<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
            height: 45px;
            font-size: 1rem;
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: 0 15px;
        }
        button {
            width: 100%;
            height: 45px;
            background-color: #0d6efd;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0847bd;
        }
        .text-danger {
            color: #dc3545;
            margin-bottom: 15px;
            font-size: 0.9rem;
            text-align: right;
        }
        label {
            display: block;
            text-align: right;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>تسجيل الدخول</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">البريد الإلكتروني</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" />
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="password">كلمة المرور</label>
            <input id="password" type="password" name="password" required class="form-control" />
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div style="text-align: right; margin-bottom: 15px;">
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember" style="display: inline;">تذكرني</label>
            </div>

            <button type="submit">تسجيل الدخول</button>
        </form>
        <p class="mt-3" style="text-align: center;">
    ليس لديك حساب؟ 
    <a href="{{ route('register') }}" style="color: #0d6efd; text-decoration: none;">سجّل الآن</a>
</p>

    </div>

</body>
</html>
