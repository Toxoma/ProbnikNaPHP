<?
$name =  filter_var(trim($_POST['f-name']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}
$id= $_COOKIE['user3'];

$result = $mysql->query("UPDATE `info_ab_cust` SET `phone_num`  = '$name' where `user_id` = $id ");
$mysql->close();
header('Location: ../../cabinet.php');
exit();