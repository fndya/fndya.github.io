<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $term = $mysql->real_escape_string($_POST['term']);
    $definition = $mysql->real_escape_string($_POST['definition']);
    $image = $_FILES['image'];

    // Проверка и загрузка изображения
    $targetDir = "images/";
    $targetFile = $targetDir . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $targetFile);

    // Добавление записи в БД
    $mysql->query("INSERT INTO terms (term, definition, image) VALUES ('$term', '$definition', '" . $image['name'] . "')");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Успех</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Термин успешно добавлен!</h1>
    <a href="index.php" class="btn">Назад к списку</a>
</body>
</html>
