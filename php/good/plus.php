<? 
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
$amount = filter_var(trim($_POST['amount']), FILTER_SANITIZE_STRING);
$descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$mysql->query("INSERT INTO `product_info` (`product_name`,`img`,`price`,`amount`,`descr`) VALUES ('$name','$img','$price','$amount','$descr')");

$prodId = $mysql->query("SELECT `product_id` FROM `product_info` ORDER BY `product_id` DESC LIMIT 1");
$prodId = $prodId->fetch_assoc();
$prodId = $prodId['product_id'];

$userId = $mysql->query("SELECT `user_id` FROM `passwords` WHERE `login`= '$_COOKIE[user1]' ");
$userId = $userId->fetch_assoc();
$userId = $userId['user_id'];

$mysql->query("INSERT INTO `product_history`(`user_id`,`product_id`,`product_name`,`img`,`amount`,`descr`,`task_id`) VAlUES ('$userId','$prodId','$name','$img','$amount','$descr',1)");
$mysql->close();
header('Location: /add-good.php');
exit();