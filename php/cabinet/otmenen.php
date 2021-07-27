<?php
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$userId = ($_COOKIE['user3']);

$result = $mysql->query("SELECT * FROM `purchase_status` WHERE `ready_id` = 3 ORDER BY `change_data` DESC");

while ($row = $result->fetch_assoc()) {

    $id = $row['purchase_id'];
    $userId = $mysql->query("SELECT `user_id` FROM `purchase_hist` WHERE `purchase_id` = $id ");
    $userId = $userId->fetch_assoc();
    $userId = $userId['user_id'];
    $userName = $mysql->query("SELECT `login` FROM `passwords` WHERE `user_id` = $userId ");
    $userName = $userName->fetch_assoc();
    echo "<div class = 'wrap'>";
    echo '<div>Id покупки: ' . $row['purchase_id'] . '</div><div>Имя пользователя: ' . $userName['login'] . '</div><div>Дата: ' . $row['change_data'] . '</div>';
?>
    <div class="coll">
        <div class="bt1" id="bt1">
            <form action="php/cabinet/btn/plus.php" method="POST"> <button type="submit" value="<?= $id ?>" name="btn">Принять</button></form>
        </div>
        <div class="bt2" id="bt2">
            <form action="php/cabinet/btn/zero.php" method="POST"> <button type="submit" value="<?= $id ?>" name="btn">Оформляется</button></form>
        </div>

    </div>
<?php
    echo '</div>';
}
$mysql->close();
