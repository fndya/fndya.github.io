<?php
include 'db.php';

$result = $mysql->query("SELECT * FROM terms");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Термины</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Список терминов</h1>
    <table>
        <thead>
            <tr>
                <th>Термин</th>
                <th>Определение</th>
                <th>Изображение</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['term']); ?></td>
                    <td><?php echo htmlspecialchars($row['definition']); ?></td>
                    <td>
                        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['term']); ?>" title="<?php echo htmlspecialchars($row['term']); ?>" />
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="add.php" class="btn">Добавить новый термин</a>
</body>
</html>
