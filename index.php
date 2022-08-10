<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизація та реєстрація користувача</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!--Форма авторизації -->
    <form action="vendor/signin.php" method="post">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть ваш логін">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть ваш пароль">
        <button type="submit">Вхід</button>
        <p>
            Ще немає акаунту?  - <a href="/register.php">Реєструйся зараз!</a>
        </p>

        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . '</p>'; //Ми зробили функцію, що тільки при появі $_SESSION['message'] будуть
        }                                                            //відображатись <p> з його класом та наше повідомлення з функції перевірки відповідності паролей
        unset($_SESSION['message']); // зупиняємо, щоб при оновлені сторінки зникало повідомлення
        // <!--Метод $_SESSION['message'] з ключем message для повідомлення знаходиться в signup.php -->

        ?>
    </form>

</body>
</html>