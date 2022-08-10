<?php
    //mysqli_connect

    $connect = mysqli_connect('localhost', 'root', 'root',  'test');


    /*
    if (!$connect) {
        die('Error connect to Database');
    } else {
        echo "My Database work corect";
    }
    */

    if (!$connect) {
        error_log('Ошибка при подключении: ' . mysqli_connect_error());
    }


    //підключення до mysql працює норм, не розумію чого не вистачає. Скоріше всього не працює змінна $connect у файлі signup.php


    $test = 'a';





?>



