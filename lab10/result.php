<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты анализа</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    // Устанавливаем локаль для поддержки кириллицы
    setlocale(LC_ALL, 'ru_RU.UTF-8');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputText = $_POST['text'] ?? '';

        if (!empty(trim($inputText))) {
            $inputText = trim($inputText);

            // Подсчет символов (включая пробелы)
            $charCount = strlen($inputText);

            // Подсчет букв (игнорируем пробелы, цифры, знаки препинания)
            $lettersOnly = preg_replace('/[^a-zA-Zа-яА-ЯёЁ]/u', '', $inputText);
            $letterCount = strlen($lettersOnly);

            // Подсчет строчных и заглавных букв
            $lowercaseCount = strlen(preg_replace('/[^а-яa-zё]/u', '', $inputText));
            $uppercaseCount = strlen(preg_replace('/[^А-ЯA-ZЁ]/u', '', $inputText));

            // Подсчет знаков препинания
            $punctuationCount = strlen(preg_replace('/[^\p{P}]/u', '', $inputText));

            // Подсчет цифр
            $digitCount = strlen(preg_replace('/\D/u', '', $inputText));

            // Подсчет слов
            $wordCount = str_word_count(strtolower($inputText), 0, 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя');

            // Вхождения каждого символа (без учета регистра)
            $textLowered = strtolower($inputText);
            $charArray = preg_split('//u', $textLowered, -1, PREG_SPLIT_NO_EMPTY);
            $charFrequency = [];
            foreach ($charArray as $char) {
                $charFrequency[$char] = ($charFrequency[$char] ?? 0) + 1;
            }
            ksort($charFrequency);

            // Вхождения каждого слова (без учета регистра)
            $words = str_word_count(strtolower($inputText), 1, 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя');
            $wordFrequency = array_count_values($words);
            ksort($wordFrequency);

            echo "<h1>Результаты анализа</h1>";
            echo "<p>Исходный текст: <em>" . htmlspecialchars($inputText, ENT_QUOTES | ENT_HTML5, 'UTF-8') . "</em></p>";

            echo "<table>";
            echo "<tr><th>Параметр</th><th>Значение</th></tr>";
            echo "<tr><td>Количество символов (включая пробелы)</td><td>$charCount</td></tr>";
            echo "<tr><td>Количество букв</td><td>$letterCount</td></tr>";
            echo "<tr><td>Количество строчных букв</td><td>$lowercaseCount</td></tr>";
            echo "<tr><td>Количество заглавных букв</td><td>$uppercaseCount</td></tr>";
            echo "<tr><td>Количество знаков препинания</td><td>$punctuationCount</td></tr>";
            echo "<tr><td>Количество цифр</td><td>$digitCount</td></tr>";
            echo "<tr><td>Количество слов</td><td>$wordCount</td></tr>";
            echo "</table>";

            echo "<h2>Частота символов</h2>";
            echo "<table>";
            echo "<tr><th>Символ</th><th>Частота</th></tr>";
            foreach ($charFrequency as $char => $freq) {
                $displayChar = htmlspecialchars($char === ' ' ? '[Пробел]' : $char, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                echo "<tr><td>$displayChar</td><td>$freq</td></tr>";
            }
            echo "</table>";

            echo "<h2>Частота слов</h2>";
            echo "<table>";
            echo "<tr><th>Слово</th><th>Частота</th></tr>";
            foreach ($wordFrequency as $word => $freq) {
                echo "<tr><td>" . htmlspecialchars($word, ENT_QUOTES | ENT_HTML5, 'UTF-8') . "</td><td>$freq</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p><strong>Нет текста для анализа.</strong></p>";
        }
    } else {
        echo "<p>Ошибка: форма не была отправлена.</p>";
    }
    ?>
    <a href="index.html">Другой анализ</a>
</body>
</html>
