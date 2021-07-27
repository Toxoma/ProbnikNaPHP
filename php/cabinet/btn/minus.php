<?php
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$id = $_POST["btn"];
$userId = $_COOKIE['user3'];

$mysql->query("UPDATE `purchase_status` SET `ready_id` = 3 , `user_id`='$userId', `change_data`=  CURRENT_TIMESTAMP() where `purchase_id` = '$id' ");

$mysql->close();
header('Location: ../../../cabinet.php');
