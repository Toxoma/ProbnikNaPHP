<?php
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$userId = ($_COOKIE['user3']);

$purchId = $mysql->query("SELECT `purchase_id`,`purchase_data` FROM `purchase_hist` WHERE `user_id` = $userId ORdeR By `purchase_data` DESC");

while ($row = $purchId->fetch_assoc()) {
    echo "<div class='info'>";
    $total = 0;
    $id = $row['purchase_id'];
    $status = $mysql->query("SELECT `ready_id` FROM `purchase_status` WHERE `purchase_id` = '$id' ORDER BY `change_data`");
    $status = $status->fetch_assoc();
    $status = $status['ready_id'];
    $status = $mysql->query("SELECT `status` FROM `ready_status` WHERE `ready-id` = '$status'");
    $status = $status->fetch_assoc();
    $result = $mysql->query("SELECT `product_id`,`amount` FROM `purchase_info` WHERE `purchase_id` = '$id'");
    echo "<div class='col'>";
    while ($row2 = $result->fetch_assoc()) {
        $prodId = $row2['product_id'];
        $prodName = $mysql->query("SELECT `product_name`,`price` FROM `product_info` WHERE `product_id` = '$prodId'");
        $prodName = $prodName->fetch_assoc();
        echo '<div>' . $prodName['product_name'] . '___Кол-во: ' . $row2['amount'] . ' шт.</div>';
        $total = $total + $prodName['price'] * $row2['amount'];
    }
    echo "</div>";
    echo '<div>Сумма:' . $total . ' р._____Дата: ' . $row['purchase_data'] . '____Статус: ' . $status['status'];
    echo "</div></div>";
};
$mysql->close();
