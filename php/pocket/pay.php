<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$userId = ($_COOKIE['user3']);

$mysql->query("INSERT INTO `purchase_hist` (`user_id`) VALUES ('$userId')");

$purchId = $mysql->query("SELECT `purchase_id` FROM `purchase_hist` WHERE `user_id` = '$userId' ORDER BY `purchase_data` DESC  ");
$purchId = $purchId->fetch_assoc();
$purchId = $purchId['purchase_id'];

for ($i = 1; $i <= $_SESSION['n']; $i++) {
    $id = $_SESSION['mas_ID_prod'][$i - 1];
    $num = $_SESSION['mas_amount'][$i - 1];
    $mysql->query("INSERT INTO `purchase_info` (`purchase_id`,`product_id`,`amount`) VALUES ('$purchId','$id','$num')");
}
$mysql->query("INSERT INTO `purchase_status` (`purchase_id`) VALUES ('$purchId')");

$mysql->close();
session_destroy();
header('Location: userPocket.php');
