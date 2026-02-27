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
<form action="{{route('basket.application')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Имя">
    <input type="number" name="phone" placeholder="Номер телефона">
    <input type="text" name="address" placeholder="Адрес">
    <input type="text" name="comment" placeholder="Комментарий">
    <button>Отправить</button>
</form>
</body>
</html>
