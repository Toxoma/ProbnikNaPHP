<?
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
$amount = filter_var(trim($_POST['amount']), FILTER_SANITIZE_STRING);
$descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);
$id= $_POST['id'];

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
} 

$userId = $mysql->query("SELECT `user_id` FROM `passwords` WHERE `login`= '$_COOKIE[user1]' ");
$userId = $userId->fetch_assoc();
$userId = $userId['user_id'];

$mysql->query("INSERT INTO `product_history`(`user_id`,`product_id`,`product_name`,`img`,`amount`,`descr`,`task_id`) VAlUES ('$userId','$id','$name','$img','$amount','$descr',3)");

$mysql->query("UPDATE `product_info` SET `product_name`  = '$name'  where `product_id` = $id ");
$mysql->query("UPDATE `product_info` SET `descr`  = '$descr'  where `product_id` = $id ");
$mysql->query("UPDATE `product_info` SET `amount`  = '$amount'  where `product_id` = $id ");
$mysql->query("UPDATE `product_info` SET `img`  = '$img'  where `product_id` = $id ");

$mysql->close();
header('Location: /');
exit();
?>