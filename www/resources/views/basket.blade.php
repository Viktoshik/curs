<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <style>

    </style>
</head>
<body>
<button>Очистить корзину</button>
<table>
    <tr>
        <td></td>
    </tr>
    @foreach(Auth::user()->basket as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td><button>+</button></td>
        <td>{{$product->pivot->quantity}}</td>
        <td><button>-</button></td>
        <td><button>🗑</button>️</td>
    </tr>
    @endforeach
</table>
<p>Общая сумма: </p>
<a href="/basket/application"><button>Перейти к оформлению</button></a>
</body>
</html>
