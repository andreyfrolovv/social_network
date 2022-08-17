<?php

phpinfo();

$link = mysqli_connect("db", "user", "123456789");

if ($link === false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

