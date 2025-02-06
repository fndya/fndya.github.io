<?php
$title = "Контакты";
$current_page = basename($_SERVER['PHP_SELF']);
$menu_items = [
    ['href' => 'index.php', 'text' => 'Главная'],
    ['href' => 'about.php', 'text' => 'О нас'],
    ['href' => 'contacts.php', 'text' => 'Контакты']
];
function get_menu_class($href, $current_page) {
    return $href === $current_page ? 'active' : '';
}
$list_items = ["Адрес: г. Москва, ул. Маршала Савицкого, д. 55", "Телефон: +7 495 456 78 90", "Email: omnom@moscow.ru"];
$second = date('s');
$photo = $second % 2 === 0 ? "fotos/foto1.webp" : "fotos/foto2.webp";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <?php foreach ($menu_items as $item): ?>
                <li class="<?= get_menu_class($item['href'], $current_page) ?>">
                    <a href="<?= $item['href'] ?>"><?= $item['text'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<main>
    <h1>$title</h1>
    <h2>Свяжитесь с нами</h2>
    <ul>
        <?php foreach ($list_items as $item): ?>
            <li><?= $item ?></li>
        <?php endforeach; ?>
    </ul>
    <h3>Текущее состояние Амняма</h3>
    <img src="<?= $photo ?>" alt="Текущее состояние Амняма"  width="500">
</main>
<footer>
    <p>Сформировано <?= date('d.m.Y в H:i:s') ?></p>
</footer>
</body>
</html>
