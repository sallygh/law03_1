<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>إدارة القضايا القانونية</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(to right, #e6e9f0, #eef1f5);
            color: #333;
            direction: rtl;
            text-align: right;
        }

        .header {
            background: #4A90E2;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        .content {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>مرحبًا بكم في إدارة القضايا القانونية</h1>
    </header>

    <div class="container mx-auto">
        <div class="content">
            <img src="{{ asset('images/legal.jpg') }}" alt="إدارة القضايا القانونية" class="w-full rounded mb-4">
            <p>نحن نوفر أفضل الخدمات القانونية لإدارة قضاياكم بكفاءة واحترافية. يمكنكم تسجيل الدخول أو التسجيل لبدء استخدام خدماتنا المميزة.</p>
            <a href="{{ route('login') }}" class="cta-button">تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="cta-button">التسجيل</a>
        </div>
    </div>
    <footer class="footer">
        <p>حقوق الطبع والنشر © 2023 - إدارة القضايا القانونية</p>
    </footer>
</body>

</html>