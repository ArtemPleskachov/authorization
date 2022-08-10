<?php
    session_start();// Для передачі значення месенджу про те що паролі не співпали необхідно запустити сесію

    require_once 'connect.php' ; // підключаємо файл з базою даних ПОЧИТАТИ ПРО МЕТОДИ require_once і т.д. Д/З

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {
        //continue якщо паролі співпадають, проходимо дальше реєстрацію

        //$_FILES['avatar']['name']; //Ми звертаємось до суперглобального методу $_FILES з ключом avatar
        $path = 'uploads/' . time() . $_FILES['avatar']['name']; // створюємо шлях куди будемо завантажувати картинки
        // time() - присвоює цифри, щоб ім'я з кожним файлом було унікальне
        // ['name'] - ми взяли з масиву, котрий нам видає print_r($_FILES)

       if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
           $_SESSION['message'] = 'Помилка при завантаженні зображення!';
           header('Location: ../register.php');
       }

       $password = md5($password);

       mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')" );

       $_SESSION['message'] = 'Реєстрація пройшла успішно';
       header('Location: ../index.php');

        //читай документацію по move_uploaded_file там круто і коротко все розписано, що ми беремо файл з 'tmp_name' і завантажуємо в шлях котрий вкажемо
        //['avatar'] - ключ з форми, по якому скрипт розуміє яку з картинок будемо завантажувати (якщо наприклад багато строк для завантаження)
        //['tmp_name'] - путь де знаходиться на сервері наше зображення


    } else {
        $_SESSION['message'] = 'Паролі не співпали'; // Message - которий вирішили передати
        //Якщо паролі не співпали точерез $_SESSION ми передаємо те повідомлення яке створили, $_SESSION - по своєї суті це масив
        header('Location: ../register.php');
        // Пишемо путь для переносу на сторінку котра нам потрібна, щоб повідомлення з'являлось на тій же сторінці Реєстрації
    }


    ?>

<pre>
    <?php
       // print_r($_FILES); // перевірка як виводить файл метод $_FILES
        //print_r($_POST); // Для вивиоду масиву з даними котрі вводить клієнт через суперглобальний метод $_POST
    ?>
</pre>
