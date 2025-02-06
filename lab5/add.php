<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить термин</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Добавить новый термин</h1>
    <form action="success.php" method="POST" enctype="multipart/form-data">
        <label for="term">Термин:</label>
        <input type="text" id="term" name="term" required>

        <label for="definition">Определение:</label>
        <textarea id="definition" name="definition" rows="5" required></textarea>

        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image" required>

        <button type="submit">Добавить</button>
    </form>
    <a href="index.php" class="btn">Назад к списку</a>
</body>
</html>
