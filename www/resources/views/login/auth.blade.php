<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Господин Ребёнок — Вход</title>
    <style>
        /* ===== Стиль, вдохновлённый изображением "Господин Ребёнок" ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f2f0e6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .page-wrapper {
            max-width: 700px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 30px 30px 20px 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), 0 1px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5ddd0;
            padding: 32px 32px 40px;
        }

        .style-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 24px;
            border-bottom: 2px solid #f0e5d5;
            padding-bottom: 18px;
            margin-bottom: 30px;
            font-weight: 500;
            color: #4a3f32;
            font-size: 1.1rem;
        }

        .style-categories span {
            cursor: default;
        }

        .style-categories span:first-child {
            font-weight: 700;
            color: #2b4b3b;
        }

        .form-card {
            background-color: #fefcf8;
            border: 2px solid #ede3d3;
            border-radius: 24px;
            padding: 28px 24px 30px;
            box-shadow: 0 6px 0 #ddd2be;
            transition: 0.15s ease;
            margin-bottom: 20px;
        }

        .form-card:hover {
            box-shadow: 0 8px 0 #d1c4ac;
            transform: translateY(-2px);
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
            border-bottom: 2px dotted #d4c7b2;
            padding-bottom: 14px;
        }

        .form-icon {
            background: #e7dfce;
            border-radius: 50%;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #2d3f2d;
        }

        .field-group {
            margin-bottom: 24px;
        }

        .field-label {
            display: block;
            font-size: 1.1rem;
            font-weight: 600;
            color: #4e3f2c;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .field-input {
            width: 100%;
            padding: 16px 20px;
            font-size: 1.2rem;
            border: 2px solid #d9ccb8;
            border-radius: 60px;
            background-color: white;
            outline: none;
            transition: 0.15s;
            color: #1f2e1f;
            font-weight: 500;
        }

        .field-input:focus {
            border-color: #7d9f7a;
            box-shadow: 0 0 0 4px rgba(125, 159, 122, 0.15);
        }

        .field-input::placeholder {
            color: #aa9f8c;
            font-weight: 400;
            font-size: 1rem;
        }

        /* чекбокс + "забыли пароль" в одной строке */
        .auth-extra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 16px 0 20px;
            font-size: 1.1rem;
        }

        .remember-check {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .remember-check input {
            width: 20px;
            height: 20px;
            accent-color: #8faa6e;
            cursor: pointer;
        }

        .forgot-link {
            color: #3c5a3c;
            text-decoration: underline wavy #ddc7a6 2px;
            text-underline-offset: 6px;
            font-weight: 500;
        }

        .price-sticker {
            font-size: 1.8rem;
            font-weight: 800;
            color: #405a3a;
            background: #f0e7d6;
            display: inline-block;
            padding: 6px 24px;
            border-radius: 40px;
            margin: 10px 0 5px;
            border: 1px solid #b9ab91;
            align-self: flex-start;
        }

        .action-btn {
            background-color: #f5e6d3;
            border: 2px solid #c7b5a0;
            color: #2e3d29;
            font-size: 1.8rem;
            font-weight: 700;
            padding: 16px 10px;
            border-radius: 60px;
            text-align: center;
            cursor: pointer;
            transition: all 0.1s ease;
            box-shadow: 0 5px 0 #b8a690;
            width: 100%;
            margin: 16px 0 8px;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border: none;
            border-bottom: 3px solid #b8a690;
        }

        .action-btn:hover {
            background-color: #ecdbbf;
            transform: translateY(-2px);
            box-shadow: 0 7px 0 #a48f78;
        }

        .action-btn:active {
            transform: translateY(4px);
            box-shadow: 0 2px 0 #a48f78;
        }

        .page-nav {
            display: flex;
            justify-content: flex-end;
            gap: 28px;
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .page-nav a {
            color: #3c5a3c;
            text-decoration: underline wavy #ddc7a6 2px;
            text-underline-offset: 6px;
            font-weight: 500;
        }

        .style-footer {
            margin-top: 30px;
            border-top: 2px solid #e7d9c6;
            padding-top: 24px;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 20px;
            color: #5a4e3e;
        }

        .style-footer div {
            background: #f2ebdd;
            border-radius: 60px;
            padding: 10px 25px;
            border: 1px solid #cfc2ab;
        }
    </style>
</head>
<body>
<div class="page-wrapper">

    <!-- форма авторизации -->
    <div class="form-card">
        <div class="form-header">
            <span class="form-icon">🔐</span>
            <h2>Вход</h2>
        </div>

        <div class="field-group">
            <label class="field-label">Логин</label>
            <input class="field-input" type="text">
        </div>

        <div class="field-group">
            <label class="field-label">Пароль</label>
            <input class="field-input" type="password">
        </div>

        <div class="auth-extra">
            <label class="remember-check">
                <input type="checkbox"> Запомнить меня
            </label>
        </div>

        <button class="action-btn">Войти</button>

        <!-- ссылка на страницу регистрации -->
        <div class="page-nav">
            <a href="/register">Нет аккаунта? Создать</a>
        </div>
    </div>

</div>
</body>
</html>
