<?
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
} 
$id= $_COOKIE['user3'];
$result = $mysql->query("SELECT birthday FROM `info_ab_cust` where `user_id` = $id ");
$result = $result->fetch_assoc();
echo($result['birthday']);
$mysql->close();