<?php
    session_start();// Для передачі значення месенджу про те що паролі не співпали необхідно запустити сесію
    require_once 'connect.php' ; // підключаємо файл з базою даних ПОЧИТАТИ ПРО МЕТОДИ require_once і т.д. Д/З

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"); // запит в базу даних, витягуємо по совпадінню логіна та пароля
   // echo mysqli_num_rows($check_user); // якщо mysqli_num_rows($check_user) верне більше 0 то це означає, що ми пройшли авторизацію
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
        ];

//        print_r($_SESSION['user']); //перевірив, як виводиться наша суперглобальна змінна - нормас, видає все як прописав. Тільки чому собака не бажає працювати як нада на другій сторінці
        header('Location: ../profile.php');

    } else {
        $_SESSION['message'] = 'Невірно вказаний логін або пароль';
        header('Location: ../index.php');
    }


//        $user = mysqli_fetch_assoc($check_user); // звертаємось до mysqli_fetch_assoc для перетворення змінною $user в масив, щоб ми змогли взяти данні звідтіля
//
//        $_SESSION['user'] = [
//          "id" => $user['id'],
//          "full_name" => $user['full_name'],
//          "avatar" => $user['avatar'],
//          "email" => $user['email'],
//
//        ];
//        print_r($user);
//        header('Location: ../profile.php'); // пересилання працює, перевірив

//    } else {
//    $_SESSION['message'] = 'Невірно вказаний логін або пароль';
//    header('Location: ../index.php');


    //    print_r($check_user); подивитись як виглядить масив без mysqli_fetch_assoc
         // з mysqli_fetch_assoc
//};



?>
<pre>
    <?php
    print_r($_SESSION['user'])
    ?>
</pre>




