<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Главная</title>
    <style>
        .products-block {
            background-color: #fefcf8;
            border: 2px solid #ede3d3;
            border-radius: 24px;
            padding: 28px 24px;
            box-shadow: 0 6px 0 #ddd2be;
        }

        .products-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d3f2d;
            margin-bottom: 24px;
            padding-bottom: 14px;
            border-bottom: 2px dotted #d4c7b2;
        }

        /* Сетка товаров - как на фото (4 карточки в ряд) */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        /* Карточка товара (точь-в-точь как на фото) */
        .product-card {
            background-color: #ffffff;
            border: 2px solid #ede3d3;
            border-radius: 24px;
            padding: 20px 20px 25px;
            box-shadow: 0 6px 0 #ddd2be;
            transition: all 0.15s ease;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 0 #d1c4ac;
            border-color: #c9b792;
        }

        /* Изображение товара (заглушка) */
        .product-image {
            width: 100%;
            height: 200px;
            background-color: #f5efe3;
            border-radius: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #b8aa94;
            border: 2px dashed #d9cfbc;
        }

        /* Название товара (как на фото) */
        .product-name {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2d3f2d;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        /* Категория товара */
        .product-category {
            font-size: 0.9rem;
            color: #8e7b64;
            margin-bottom: 15px;
            font-style: italic;
        }

        /* Цена (как на фото - 990 ₽) */
        .product-price {
            font-size: 2rem;
            font-weight: 800;
            color: #405a3a;
            background: #f0e7d6;
            display: inline-block;
            padding: 6px 20px;
            border-radius: 40px;
            margin: 10px 0 15px;
            border: 1px solid #b9ab91;
            align-self: flex-start;
        }

        /* Кнопка "В корзину" (точь-в-точь как на фото) */
        .add-to-cart-btn {
            background-color: #f5e6d3;
            border: 2px solid #c7b5a0;
            color: #2e3d29;
            font-size: 1.3rem;
            font-weight: 700;
            padding: 12px 0;
            border-radius: 60px;
            text-align: center;
            cursor: pointer;
            transition: all 0.1s ease;
            box-shadow: 0 5px 0 #b8a690;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            border-bottom: 3px solid #b8a690;
            text-decoration: none;
            display: block;
        }

        .add-to-cart-btn:hover {
            background-color: #ecdbbf;
            transform: translateY(-2px);
            box-shadow: 0 7px 0 #a48f78;
        }

        .add-to-cart-btn:active {
            transform: translateY(4px);
            box-shadow: 0 2px 0 #a48f78;
        }

        /* Разные варианты кнопки (как на фото - с орфографическими ошибками) */
        .btn-variant1 { background-color: #f5e6d3; }
        .btn-variant2 { background-color: #f2e0c9; }
        .btn-variant3 { background-color: #f8e8d1; }
        .btn-variant4 { background-color: #f5e3cb; }
    </style>
</head>
<div>

<div id="your-cart">
    <div id="your-cart-wrapper"></div>
</div>

<div id="toy-more">
    <div id="toy-more-wrapper">
        <p class="title">✕</p>

        <div class="img-container">
            <img src="https://cdn1.ozone.ru/s3/multimedia-h/6655620365.jpg" alt="Фото товара">
        </div>

        @foreach($products as $product)
        <div class="content">
            <h3>{{ $product->name }}</h3>
            <p class="category">{{ $product->category->name }}</p>
            <p class="price">{{ number_format($product->price, 0, ',', ' ') }} ₽</p>
            <button type="button" class="btn">Добавить в корзину</button>
        </div>
        @endforeach
    </div>
</div>
</div>

<header>
    <div class="header-wrapper">
        <div class="header-top">
            <div>
                <a href="/" class="logo">
                    <img src="/img/icons/lightning.svg" alt="Молния">
                    <h1>Господин Ребёнок</h1>
                </a>

                <form>
                    <input type="search" name="search_toys" id="search_toys" placeholder="Поиск игрушек...">
                </form>
            </div>

            <div>
                <nav>
                    <a href="/">Главная</a>
                    <a href="/categories">Категории</a>
                </nav>

                <div class="cart" id="cart">
                    <img src="/img/icons/cart.svg" alt="Корзина">
                    <a href="/">Корзина</a>
                    <div class="quantity-of-products"></div>
                </div>
            </div>
        </div>

        <hr>
    </div>
</header>
<div class="toy-more">
    <div class="products-title">
        Товары
    </div>

    <div class="toy-more-wrapper">
        @foreach($products as $product)
            <div class="img-container">
                <img src="" alt="Фото товара отсутсвует">
            </div>
            <div class="content">

                <div class="product-name">
                    {{ $product->name }}
                </div>

                <!-- Категория -->
                <div class="product-category">
                    {{ $product->category->name }}
                </div>

                <div class="price">
                    {{ number_format($product->price, 0, ',', ' ') }} ₽
                </div>
                <a href="/basket/add/{{$product->id}}"><button type="button" class="btn">В корзину</button></a>

            </div>
        @endforeach
    </div>
<footer>
    <div class="footer-wrapper">
        <div class="footer-top">
            <div>
                <a href="/">
                    <h3>Господин Ребёнок</h3>
                </a>

                <p>Лучшие игрушки для ваших детей</p>
            </div>

            <div>
                <h3>Контакты</h3>
                <a href="tel:+79999999999">📞 +7 (999) 999-99-99</a>
                <a href="mailto:info@gospodinrebenok.ru">✉️ info@gospodinrebenok.ru</a>
                <p>📍 Абакан, ул. Щетинкина, д. 76</p>
            </div>

            <div>
                <h3>Часы работы</h3>
                <p>Пн-Пт: 10:00 - 20:00</p>
                <p>Сб-Вс: 10:00 - 22:00</p>
            </div>
        </div>

        <hr>

        <div class="footer-bottom">
            <p>&copy; 2025 Господин Ребёнок. Все права защищены.</p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
