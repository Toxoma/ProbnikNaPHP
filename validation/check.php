<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
setcookie('auth', $user['login'], time() - 30, "/");

if  (mb_strlen($login) < 5) {
	echo "Длина логина должна быть > 5.";
	exit();
} else if (mb_strlen($password) < 6) {
	echo "Недопустимая длина пароля. От 6 до 32 символов!";
	exit();
}

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
} 
$result = $mysql->query("SELECT*FROM `passwords` WHERE `login` = '$login'");
$user = $result->fetch_assoc();
if (count($user) != 0) {
	echo "Такой пользователь есть!";
	exit();
}

$password = md5($password);

$mysql->query("INSERT INTO `passwords` (`login`,`password`) VALUES ('$login','$password')");

setcookie('auth', $login, time() + 30, "/");

$mysql->close();
header('Location: /start.php');
