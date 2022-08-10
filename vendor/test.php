<?php
    //затестив метод require_once за допомогою змінною $test, працює! Не розумію що не так зі змінною $connect
    require_once 'connect.php';

    if (!$test) {
        echo 'Хуйня, змінної немає!!!';
    } else {
        echo 'Йоб твою мать, підключилось!!';
    }






