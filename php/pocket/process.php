<?php
if ($_SESSION['n'] == '') {
    echo "<div class='pusto'>В корзине пусто!!!</div>";
    exit();
}

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}
$total = 0;

for ($i = 1; $i <= $_SESSION['n']; $i++) {
    $id = $_SESSION['mas_ID_prod'][$i - 1];
    $total = $total + $_SESSION['mas_cost'][$i - 1] * $_SESSION['mas_amount'][$i - 1];
    $name = $mysql->query("SELECT `product_name` FROM `product_info` where `product_id` = $id ");
    $name = $name->fetch_assoc();
?>
    <div class="row-p">
        <div class="row-p__col">
            <?php
            echo $name['product_name'] . ' ______ Кол-во: ' . $_SESSION['mas_amount'][$i - 1] . ' шт. ______ ' . $_SESSION['mas_cost'][$i - 1] . ' p. _______ Итого: ' . $_SESSION['mas_cost'][$i - 1] * $_SESSION['mas_amount'][$i - 1] . ' р.';
            echo ('<br/><br/>');
            ?>
        </div>
        <div class="row-p__col2">
            <form action="deletePos.php" method="POST">
                <input type="hidden" name="num" value="<?= $i - 1 ?>">
                <button type="submit">Убрать</button>
            </form>
        </div>
    </div>
<?php
}
$_SESSION['total'] = $total;
