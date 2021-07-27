<?
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
} 
$id= $_POST['id'];
$result = $mysql->query("SELECT * FROM `product_info` where `product_id` = $id ");
$result = $result->fetch_assoc();


$str = "wrapper__row6 row0";
if ( $_COOKIE['user2'] == 1 ){ 
    $str =" row6" ;
}

?>
<div class="wrapper">
    <? if ( $_COOKIE['user2'] != "" ) : ?>
    <div class=<?= $str ?>>

        <div class="row0__col3">
            <form action="php/goodpage/feedback.php" method="POST">
                <input type="hidden" name="prod_id" value=<?= $id; ?>>
                <button type="submit">Отзыв</button>
            </form>
        </div>

        <? if ( $_COOKIE['user2'] != 1 ) : ?>
        <div class="row0__col1">
            <form action="php/goodpage/changeform.php" method="POST">
                <input type="hidden" name="id" value=<?= $id ?>>
                <button type="submit">Редактироввать</button>
            </form>
        </div>
        <div class="row0__col2">
            <form action="php/goodpage/delete.php" method="POST">
                <input type="hidden" name="id" value=<?= $id ?>>
                <button type="submit">Удалить</button>
            </form>
        </div>
    </div>
    <? endif; endif;?>
    <div class="wrapper__row1">
        <?= $result['product_name'] ?>
    </div>
    <div class="wrapper__row2 row2">
        <div class="row2__col1">
            <img src="img/<?= $result['img'] ?>">
        </div>
        <div class="row2__col2 col2">
            <div class="col2__row1 price">
                <div class="price__col1">
                    Цена:
                </div>
                <div class="price__col2">
                    <?= $result['price'] ?> р.
                </div>
            </div>
            <div class="col2__row2 amount">
                <div class="amount__col1">
                    Количество:
                </div>
                <div class="amount__col2">
                    <?= $result['amount'] ?> шт.
                </div>
            </div>
        </div>
        <div class="feed">
            <div class="feed__text">Рейтинг:</div>
            <div class="feed__rate">
                <?
                $rate = $mysql->query("SELECT `response` FROM `feedback` where `product_id` = $id ");
                $mark = 0;
                $n = 0;
                while($row = $rate->fetch_assoc()){
                    $n++;
                    $mark = $mark + $row['response'];
                };
                echo $mark/$n*20;
                ?>%
            </div>

        </div>


    </div>
    <div class="wrapper__row3">
        <textarea disabled style="resize:vertical; min-height: 70px;background-color: #fff; color:black; font-size: 16px; min-width: 780px"><?= $result['descr'] ?></textarea>
    </div>

</div>
<?$mysql->close();