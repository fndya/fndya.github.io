<?php include 'header.html'; ?>

<main>
    <form action="home.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="name">ФИО:</label>
            <input type="text" id="name" name="name" value="<?php echo $_GET['name'] ?? ''; ?>" required>

            <label for="email">Ваш e‐мэйл:</label>
            <input type="email" id="email" name="email" placeholder="Введите ваш email" value="<?php echo $_GET['email'] ?? ''; ?>" required>

            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <label for="category">Тема обращения:</label>
            <select id="category" name="category" required>
                <option value="proposal">Предложение</option>
                <option value="complaint">Жалоба</option>
            </select>
        </fieldset>

        <fieldset class="checkbox-group">
            <label>
                <input type="checkbox" id="consent" name="consent" required>
                Даю согласие на обработку данных
            </label>
        </fieldset>

        <fieldset class="radio-group">
            <label>
                <input type="radio" id="internet" name="source" value="internet" <?php echo ($_GET['source'] ?? '') === 'internet' ? 'checked' : ''; ?> required>
                Реклама из интернета
            </label>
            <label>
                <input type="radio" id="friends" name="source" value="friends" <?php echo ($_GET['source'] ?? '') === 'friends' ? 'checked' : ''; ?> required>
                Рассказали друзья
            </label>
        </fieldset>

        <button type="submit">Отправить</button>
    </form>
</main>
</body>
</html>
