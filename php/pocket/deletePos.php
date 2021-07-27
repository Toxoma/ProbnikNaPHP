<?php
session_start();
$n = $_POST['num'];

unset($_SESSION['mas_ID_prod'][$n]);
unset($_SESSION['mas_cost'][$n]);
unset($_SESSION['mas_amount'][$n]);

sort($_SESSION['mas_ID_prod']);
sort($_SESSION['mas_cost']);
sort($_SESSION['mas_amount']);

$n = $_SESSION['n'] - 1;
$_SESSION['n'] = $n;

header('Location: userPocket.php');
