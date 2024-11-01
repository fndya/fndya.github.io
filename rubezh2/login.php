<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Авторизация</h1>
    </header>

    <main>
        <form method="POST" action="">
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
            <button type="submit">Войти</button>
            <?php if (isset($error)) echo "<p>$error</p>"; ?>
        </form>
    </main>

    <footer>
        <p>Контакты: example@example.com</p>
        <p>© 2024 Магазин одежды</p>
    </footer>
</body>
</html>
