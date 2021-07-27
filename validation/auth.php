<?php
session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password);

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
$result = $mysql->query("SELECT*FROM `passwords` WHERE `login` = '$login' and `password` = '$password'");
$user = $result->fetch_assoc();

if ($_COOKIE['abc'] == '') {
	if (count($user) == 0) {
		echo "Такой пользователь не найден!";
		exit();
	}
}

if ($user['user_id'] != 0) {
	$id = $user['user_id'];
} else {
	$id = $_COOKIE['user3'];
}

$result2 = $mysql->query("SELECT*FROM `info_ab_cust`  WHERE `user_id` = '$id'");
$user2 = $result2->fetch_assoc();

if (count($user2) == 0) {
	setcookie('user2', $user['role_id'], time() + 3600, "/");
	setcookie('user3', $user['user_id'], time() + 3600, "/");
	header("Location: auth2.php");
	exit();
}

if ($_COOKIE['abc'] == '') {
	setcookie('user1', $user['login'], time() + 3600, "/");
	setcookie('user2', $user['role_id'], time() + 3600, "/");
	setcookie('user3', $user['user_id'], time() + 3600, "/");
} else {
	setcookie('user1', $_COOKIE['abc'], time() + 3600, "/");
}
$mysql->close();
header('Location: /');
exit();
