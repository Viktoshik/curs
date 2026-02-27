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
        /* Блок категорий (как на фото) */
        .categories-block {
            background-color: #fefcf8;
            border: 2px solid #ede3d3;
            border-radius: 24px;
            padding: 28px 24px;
            box-shadow: 0 6px 0 #ddd2be;
        }

        .categories-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d3f2d;
            margin-bottom: 24px;
            padding-bottom: 14px;
            border-bottom: 2px dotted #d4c7b2;
        }

        /* Сетка категорий */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
        }

        /* Карточка категории (в стиле карточки товара с фото) */
        .category-card {
            background-color: #fefcf8;
            border: 2px solid #ede3d3;
            border-radius: 20px;
            padding: 20px 15px;
            text-align: center;
            transition: all 0.15s ease;
            box-shadow: 0 4px 0 #ddd2be;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 0 #d1c4ac;
            border-color: #c9b792;
        }

        .category-icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .category-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2d3f2d;
            margin-bottom: 5px;
        }

        .category-slug {
            font-size: 0.9rem;
            color: #8e7b64;
            font-style: italic;
        }

        /* Кнопка "Все товары" */
        .all-products-btn {
            display: inline-block;
            background-color: #f5e6d3;
            border: 2px solid #c7b5a0;
            color: #2e3d29;
            font-size: 1.3rem;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 60px;
            text-decoration: none;
            margin-top: 30px;
            box-shadow: 0 4px 0 #b8a690;
            transition: all 0.1s ease;
        }

        .all-products-btn:hover {
            background-color: #ecdbbf;
            transform: translateY(-2px);
            box-shadow: 0 6px 0 #a48f78;
        }

    </style>
</head>
<body>

<div id="your-cart">
    <div id="your-cart-wrapper"></div>
</div>

<div id="toy-more">
    <div id="toy-more-wrapper">
        <p class="title">✕</p>

        <div class="img-container">
            <img src="https://cdn1.ozone.ru/s3/multimedia-h/6655620365.jpg" alt="Фото товара">
        </div>

        <div class="content">
            <h3>Кукла Barbie</h3>
            <p class="category">Куклы</p>
            <p class="price">1790</p>
            <button type="button" class="btn">Добавить в корзину</button>
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
                    <a href="/auth">Войти</a>
                    <a href="/register">Зарегистрироваться</a>
                </nav>

                <div class="cart" id="cart">
                    <img src="/img/icons/cart.svg" alt="Корзина">
                    <a href="/show">Корзина({{\App\Services\BasketServices::count()['count']}})</a>
                    <div class="quantity-of-products"></div>
                </div>
            </div>
        </div>

        <hr>
    </div>
</header>

<section class="banner">
    <h1>🎪 Добро пожаловать в "Господин Ребёнок"! 🎁</h1>
    <p>Только сегодня — скидка 15% на все конструкторы!</p>
</section>
<div class="categories-block">
    <div class="categories-title">
        Наши категории
    </div>

    <div class="categories-grid">
        @foreach($categories as $category)
            <a href="/category/{{ $category->id }}" class="category-card">
                <div class="category-name">
                    {{ $category->name }}
                </div>
            </a>
        @endforeach
    </div>
    <!-- Кнопка "Все товары" -->
    <div style="text-align: center;">
        <a href="/catalog" class="all-products-btn">
            Все товары →
        </a>
    </div>
</div>


<main>
    <section class="products-wrapper mb-50">

    </section>

    <section class="location">
        <div class="title">
            <h2>Наш магазин на карте</h2>
        </div>

        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae97d04ecca3b2176d10d0e7ac423037cfc2e1cde81cfa29517d25b2886fe37bf&amp;width=100%25&amp;height=599&amp;lang=ru_RU&amp;scroll=true"></script>
    </section>
</main>

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
