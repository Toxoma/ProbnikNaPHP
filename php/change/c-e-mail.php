<?
$name =  filter_var(trim($_POST['f-name']), FILTER_SANITIZE_STRING);
if (!filter_var($name, FILTER_VALIDATE_EMAIL)) {
	echo "Адрес почты указан не правильно.";
	exit();
}
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}
$id= $_COOKIE['user3'];

$result = $mysql->query("UPDATE `info_ab_cust` SET `e_mail`  = '$name' where `user_id` = $id ");
$mysql->close();
header('Location: ../../cabinet.php');
exit();