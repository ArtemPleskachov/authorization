<?php
    session_start();

if (!$_SESSION['user']) {
    header('Location: /');
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
<!--Profile -->
    <form>
        <img src="<?= $_SESSION['user']['avatar']; ?>" width="400" height="400" alt=""> <!--гадаю, що саме в $_SESSION проблеми, але поки не придумав як вирішити -->
        <h2 style="margin: 10px 0; text-align: center"><?= $_SESSION['user']['full_name']; ?></h2>
        <a style="text-align: center" href="#"><?= $_SESSION['user']['email']; ?></a>
        <a style="text-align: center" href="vendor/logout.php" class="logout">Вихід</a>
    </form>





</body>
</html>