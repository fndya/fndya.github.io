<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №9</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Логотип университета">
        <h1>Прокофьев Фёдор, группа 231-362. Лабораторная №9</h1>
    </header>
    <main>
        <?php
        // Инициализация переменных
        $x_start = -5; // Начальное значение x
        $step = 1; // Шаг изменения x
        $type = 'D'; // Тип верстки (A, B, C, D, E)
        $x_max = 25; // Максимальное значение x
        $min_value = PHP_FLOAT_MAX;
        $max_value = PHP_FLOAT_MIN;
        $sum = 0;
        $count = 0;

        // Функция для вычисления значений
        function calculate($x) {
            if ($x <= 10) {
                return 10 * $x - 5;
            } elseif ($x > 10 && $x < 20) {
                return ($x + 3) * $x ** 2;
            } elseif ($x >= 20) {
                return ($x - 25) == 0 ? 'error' : 3 / ($x - 25);
            }
            return null;
        }

        // Вывод данных в зависимости от типа верстки
        echo "<section>";
        switch ($type) {
            case 'A':
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate($x);
                    echo "f($x) = $y<br>";
                    if (is_numeric($y)) {
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    }
                }
                break;
            case 'B':
                echo "<ul>";
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate($x);
                    echo "<li>f($x) = $y</li>";
                    if (is_numeric($y)) {
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    }
                }
                echo "</ul>";
                break;
            case 'C':
                echo "<ol>";
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate($x);
                    echo "<li>f($x) = $y</li>";
                    if (is_numeric($y)) {
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    }
                }
                echo "</ol>";
                break;
            case 'D':
                echo "<table><tr><th>№</th><th>x</th><th>f(x)</th></tr>";
                $index = 1;
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate($x);
                    echo "<tr><td>$index</td><td>$x</td><td>$y</td></tr>";
                    if (is_numeric($y)) {
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    }
                    $index++;
                }
                echo "</table>";
                break;
            case 'E':
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate($x);
                    echo "<div class='block'>f($x) = $y</div>";
                    if (is_numeric($y)) {
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    }
                }
                break;
        }
        echo "</section>";

        // Вывод статистики
        $average = $count > 0 ? $sum / $count : 0;
        echo "<p>Максимальное значение: $max_value</p>";
        echo "<p>Минимальное значение: $min_value</p>";
        echo "<p>Среднее арифметическое: " . round($average, 3) . "</p>";
        echo "<p>Сумма значений: " . round($sum, 3) . "</p>";
        ?>
    </main>
    <footer>
        Тип верстки: <?= $type ?>
    </footer>
</body>
</html>
