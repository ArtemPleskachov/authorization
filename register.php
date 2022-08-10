<?php
    session_start(); // запускаємо сесію для передання мессенджу

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизація та реєстрація користувача</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!--Форма реєстрації -->
    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>П.І.Б.</label>
        <input type="text" name="full_name" placeholder="Введіть своє ПІБ"> <!--Створюємо клас name для забору інформації від користувача-->
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть свій Логін">
        <label>Пошта</label>
        <input type="email" name="email" placeholder="Введіть свій email">
        <label>Зображення профілю</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть ваш пароль">
        <label>Підтвердженя паролю</label>
        <input type="password" name="password_confirm" placeholder="Підтвердіть ваш пароль">
        <button type="submit">Вхід</button>
        <p>
            Маєте акаунт? - <a href="/index.php">Авторизуйтесь зараз!</a>
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