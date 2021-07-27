<?php

$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$result = $mysql->query("SELECT * FROM `product_info`");
while ($result2 = mysqli_fetch_array($result)) {
    $wrap = "wrapper__row";

?>

    <div class=<?= $wrap ?>>
        <div class="wrapper__col1">
            <div class="product">
                <div class="product__img">
                    <form action="good.php" method="POST">
                        <input type="hidden" name="id" value=<?= $result2['product_id'] ?>>
                        <button type="submit"><a href="#"> <img src="../img/<?= $result2['img'] ?>" alt="">
                            </a></button>
                    </form>
                </div>
                <div class="product__col col">
                    <div class="col__row1">
                        <form action="good.php" method="POST">
                            <input type="hidden" name="id" value=<?= $result2['product_id'] ?>>
                            <button type="submit"><?= $result2['product_name'] ?></button>
                        </form>

                    </div>
                    <div class="col__row2 row2">
                        <div class="row2__1">
                            Цена: <?= $result2['price'] ?>р.
                        </div>
                        <div class="row2__2">
                            В наличии:<?= $result2['amount'] ?> шт.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? if ($_COOKIE['user1'] != '') : ?>
        <div class="wrapper__col2 btn-add">
            <form action="php/pocket/pocket.php" method="post">
                <div class="btn-add__row1">
                    <input type="number" name="num" value="1" min="1" max=<?= $result2['amount'] ?>>
                </div>
                <div>
                    <input type="hidden" name="productId" value=<?= $result2['product_id'] ?>>
                </div>
                <div>
                    <input type="hidden" name="cost" value=<?= $result2['price'] ?>>
                </div>
                <div class="btn-add__row2">
                    <button class="btn" type="submit">Добавить</button>
                </div>
            </form>
        </div>
        <? endif; ?>
    </div>

<?php
}
$mysql->close();
exit();
