<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "clothing_store"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$items_per_page = 5;


$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;


$total_items_result = $conn->query("SELECT COUNT(*) as count FROM products");
$total_items_row = $total_items_result->fetch_assoc();
$total_items = $total_items_row['count'];
$total_pages = ceil($total_items / $items_per_page);


$sql = "SELECT * FROM products LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $items_per_page);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Магазин одежды</title>
</head>
<body>
    <header>
        <h1>Магазин одежды</h1>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="shop.php">Магазин</a></li>
                <li><a href="contact.php">Контакты</a></li>
                <li><a href="login.php">Вход</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <h2>Каталог товаров</h2>
        <?php
        
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Изображение</th><th>Название</th><th>Цена</th><th>Действие</th></tr>";
            while ($product = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "' style='width:100px;height:100px;'></td>";
                echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                echo "<td>" . htmlspecialchars($product['price']) . " Р.</td>";
                echo "<td><a href='product.php?product_id=" . $product['product_id'] . "' class='button'>Посмотреть</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Товары не найдены.";
        }

        
        echo "<div class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo "<span>$i</span>"; 
            } else {
                echo "<a href='shop.php?page=$i'>$i</a>"; 
            }
        }
        echo "</div>";

        
        $conn->close();
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Магазин одежды. Все права защищены.</p>
    </footer>
</body>
</html>
