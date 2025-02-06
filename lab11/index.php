<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    // Получаем параметры
    $html_type = isset($_GET['html_type']) ? $_GET['html_type'] : 'TABLE';
    $content = isset($_GET['content']) ? (int)$_GET['content'] : 0;

    // Главное меню
    echo '<div id="main_menu">';
    echo '<a href="?html_type=TABLE' . (isset($_GET['content']) ? '&content=' . $_GET['content'] : '') . '"';
    if ($html_type === 'TABLE') echo ' class="selected"';
    echo '>Табличная верстка</a>';
    echo '<a href="?html_type=DIV' . (isset($_GET['content']) ? '&content=' . $_GET['content'] : '') . '"';
    if ($html_type === 'DIV') echo ' class="selected"';
    echo '>Блочная верстка</a>';
    echo '</div>';

    // Основное меню
    echo '<div id="content">';
    echo '<div id="product_menu">';
    echo '<a href="?html_type=' . $html_type . '&content=0"' . ($content === 0 ? ' class="selected"' : '') . '>Вся таблица умножения</a>';
    for ($i = 2; $i <= 9; $i++) {
        echo '<a href="?content=' . $i . ($html_type ? '&html_type=' . $html_type : '') . '"';
        if ($content === $i) echo ' class="selected"';
        echo '>Таблица умножения на ' . $i . '</a>';
    }
    echo '</div>';

    // Таблица умножения
    echo '<div id="multiplication_table">';
    if ($html_type === 'TABLE') {
        echo '<table class="multiplication-table">';
        for ($i = 1; $i <= 9; $i++) {
            echo '<tr>';
            for ($j = 2; $j <= 9; $j++) {
                if ($content === 0 || $content === $j) {
                    echo '<td>';
                    echo '<a href="?content=' . $j . '">';
                    echo $j;
                    echo '</a>';
                    echo ' x ';
                    echo '<a href="?content=' . $i . '">';
                    echo $i;
                    echo '</a>';
                    echo ' = ';
                    echo '<a href="?content=' . ($i * $j) . '">';
                    echo ($i * $j);
                    echo '</a>';
                    echo '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<div class="multiplication-block">';
        for ($i = 1; $i <= 9; $i++) {
            for ($j = 2; $j <= 9; $j++) {
                if ($content === 0 || $content === $j) {
                    echo '<div>';
                    echo '<a href="?content=' . $j . '">';
                    echo $j;
                    echo '</a>';
                    echo ' x ';
                    echo '<a href="?content=' . $i . '">';
                    echo $i;
                    echo '</a>';
                    echo ' = ';
                    echo '<a href="?content=' . ($i * $j) . '">';
                    echo ($i * $j);
                    echo '</a>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';

    // Подвал
    echo '<footer>';
    echo 'Тип верстки: ' . ($html_type === 'TABLE' ? 'Табличная' : 'Блочная') . '. ';
    echo 'Содержание: ' . ($content === 0 ? 'Полная таблица' : 'Таблица умножения на ' . $content) . '. ';
    echo 'Дата и время: ' . date('Y-m-d H:i:s');
    echo '</footer>';
    ?>
</body>
</html>
