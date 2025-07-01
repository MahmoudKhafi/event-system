<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم المشرف</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            direction: rtl;
        }
        header {
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .btn {
            background-color: #2563eb;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }
        .btn-logout {
            background-color: #dc2626;
            margin-top: 40px;
        }
        .btn-logout:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body>

    <header>
        <h1>لوحة تحكم المشرف</h1>
    </header>

    <div class="container">
        <div class="title">مرحباً بك في لوحة التحكم</div>

        <div class="button-group">
            <a href="/admin/events" class="btn">📅 إدارة الفعاليات</a>
            <a href="/admin/categories" class="btn">📂 إدارة التصنيفات</a>
        </div>

        <form method="POST" action="/logout" style="text-align: center;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-logout">تسجيل الخروج</button>
        </form>
    </div>

</body>
</html>
