<?php
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}
$userId = $_COOKIE['user3'];
$num = $_POST['rating'];
$id = $_POST['prod_id'];

$mysql->query("INSERT feedback(`user_id`,`product_id`,response) VALUES ('$userId','$id','$num')");
$mysql->close();
header('Location: /');
exit();
