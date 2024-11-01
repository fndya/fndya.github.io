<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "clothing_store"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;


$sql = "SELECT * FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Товар не найден.";
    exit;
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
</head>
<body>
    <header>
        <h1>Магазин одежды</h1>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="shop.php">Магазин</a></li>
                <li><a href="contact.php">Контакты</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width:300px; height:300px;">
        <p><strong>Цена:</strong> <?php echo htmlspecialchars($product['price']); ?> Р.</p>
        <p><strong>Описание:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
        <p><strong>Количество в наличии:</strong> <?php echo htmlspecialchars($product['stock']); ?></p>
        <a href="shop.php" class="button">Вернуться в магазин</a>
    </main>

    <footer>
        <p>&copy; 2024 Магазин одежды. Все права защищены.</p>
    </footer>
</body>
</html>
