<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Email Hệ Thống</h1>
<p>Cảm ơn {{ $user->name }} đã đăng ký sử dụng dịch vụ</p>
<p>Bấm vào đường dẫn dưới đây để kích hoạt tài khoản <a style="color: red" href="{{ url('active/'.$user->id) }}">kích hoạt</a></p>
</body>
</html>