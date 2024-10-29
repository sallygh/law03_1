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
            color: #fff;
            direction: rtl;
            text-align: right;
            background-image: url("{{ asset('images/legal.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }

        .content {
            max-width: 700px;
            margin: 20px auto;
            margin-right: 50px;
            margin-left: 100px;
            padding: 5px;
        }

        .cta-button {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #fff;
            /* اللون الأساسي للزر */
            color: #DAA520;
            /* لون النص */
            border: 2px solid #DAA520;
            /* حدود الزر */
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s, color 0.3s, transform 0.3s;
            /* انتقالات لتحسين التأثيرات */
        }

        .cta-button:hover {
            background: #DAA520;
            /* اللون عند التحويم */
            color: #fff;
            /* لون النص عند التحويم */
            transform: scale(1.05);
            /* تأثير التكبير عند التحويم */
        }

        .footer {
            margin-top: 40px;
            max-width: 700px;
            margin: 20px auto;
            margin-right: 50px;
            margin-left: 100px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1 class="text-4xl font-bold text-white mb-4"> موقع إدارة القضايا القانونية</h1>
        <p>نحن نوفر أفضل الخدمات القانونية لإدارة قضاياكم بكفاءة واحترافية. يمكنكم تسجيل الدخول أو التسجيل لبدء استخدام خدماتنا .</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="cta-button">تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="cta-button">التسجيل</a>
        </div>
    </div>
    <footer class="footer">
        <p> للتسجيل والاستفسار 0934614963 </p>
    </footer>
</body>

</html>