<?php
$id = $_COOKIE['user3'];
$fname = filter_var(trim($_POST['f-name']), FILTER_SANITIZE_STRING);
$lname = filter_var(trim($_POST['l-name']), FILTER_SANITIZE_STRING);
$patr = filter_var(trim($_POST['patr']), FILTER_SANITIZE_STRING);
$passport = filter_var(trim($_POST['passport']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
$birthday = date('Y/m/d', strtotime($_POST['birthday']));
$place = str_replace(" ", "_", (filter_var(trim($_POST['place']), FILTER_SANITIZE_STRING)));
$mail =  filter_var(trim($_POST['e-mail']), FILTER_SANITIZE_STRING);

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	echo "Адрес почты указан не правильно.";
	exit();
} else if (mb_strlen($fname) == 0) {
	echo "Введите ИМЯ!!!";
	exit();
} else if (mb_strlen($lname) == 0) {
	echo "Введите ФАМИЛИЮ!!!";
	exit();
} else if (mb_strlen($patr) == 0) {
	echo "Введите Отчество!!!";
	exit();
} else if (mb_strlen($passport) == 0) {
	echo "Введите паспорт!!!";
	exit();
} else if (mb_strlen($phone) == 0) {
	echo "Введите телефон!!!";
	exit();
} else if (mb_strlen($birthday) != 10 & $_COOKIE['user2'] == 1) {
	echo "Введите День рождения!!!";
	exit();
} else if (mb_strlen($place) == 0 & $_COOKIE['user2'] == 1) {
	echo "Введите место жительства!!!";
	exit();
}

$mysql = new mysqli('localhost', 'root', 'root', 'cite');

if ($_COOKIE['user2'] == 1) {
	$mysql->query("INSERT INTO `info_ab_cust` (`user_id`,`passport`,`phone_num`,`f_name`,`l_name`,`patron`,`e-mail`,`location`,`birthday`) VALUES ('$id','$passport','$phone','$fname','$lname','$patr','$mail','$place','$birthday')");
} else {
	$mysql->query("INSERT INTO `info_ab_cust` (`user_id`,`passport`,`phone_num`,`f_name`,`l_name`,`patron`,`e-mail`) VALUES ('$id','$passport','$phone','$fname','$lname','$patr','$mail')");
}

$result = $mysql->query("SELECT*FROM `passwords`  WHERE `user_id` = '$id'");
$user = $result->fetch_assoc();

$mysql->close();
setcookie('abc', $user['login'], time() + 3600, "/");
header('Location: auth.php');
