<?
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
} 
$id= $_POST['id'];

$userId = $mysql->query("SELECT `user_id` FROM `passwords` WHERE `login`= '$_COOKIE[user1]' ");
$userId = $userId->fetch_assoc();
$userId = $userId['user_id'];

$result = $mysql->query("SELECT* FROM `product_info` WHERE `product_id`='$id'");
$result = $result->fetch_assoc();

$name = $result['product_name'];
$img = $result['img'];
$amount = $result['amount'];
$descr = $result['descr'];

$mysql->query("INSERT INTO `product_history`(`user_id`,`product_id`,`product_name`,`img`,`amount`,`descr`,`task_id`) VAlUES ('$userId','$id','$name','$img','$amount','$descr',2)");

$result = $mysql->query("DELETE FROM `product_info` where `product_id` = $id ");

$mysql->close();
header('Location: /');
exit();