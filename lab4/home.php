<?php include 'header.html'; ?>

<main>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $category = $_POST['category'] === 'proposal' ? 'Предложение' : 'Жалоба';
        $source = $_POST['source'] === 'internet' ? 'Реклама из интернета' : 'Рассказали друзья';
        $file = $_FILES['attachment']['name'] ?? null;

        echo "<p>Здравствуйте, <strong>$name</strong></p>";
        echo "<p>Ваше сообщение: $message</p>";
        echo "<p>Тема обращения: $category</p>";
        echo "<p>Источник информации: $source</p>";
        if ($file) {
            echo "<p>Вы приложили файл: <strong>$file</strong></p>";
        }
        echo '<a class="btn" href="index.php?name=' . urlencode($name) . '&email=' . urlencode($email) . '&source=' . urlencode($_POST['source']) . '">Заполнить снова</a>';
    } else {
        echo '<p>Ошибка: форма не была отправлена.</p>';
    }
    ?>
</main>
</body>
</html>
