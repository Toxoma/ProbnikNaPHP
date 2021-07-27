<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changeform</title>
    <link rel="stylesheet" href="../../css/hamburger.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <header>
        <div class="headder">
            <div class="headder__row">
                <div class="headder__col1">
                    <a href="index.php">Главная страница</a>
                </div>

                <?php if ($_COOKIE['user1'] == '') : ?>
                    <div class="headder__col2 inter">
                        <a href="start.php">Вход в личный кабинет</a>
                    </div>
                <?php else : ?>

                    <div class="headder__col2 after">
                        <div class="after__col1">
                            <p> <?= $_COOKIE['user1'] ?></p>
                        </div>
                        <div class="after__col2 headder__hamburger">
                            <input id="menu__toggle" type="checkbox" />
                            <label class="menu__btn" for="menu__toggle">
                                <span></span>
                            </label>
                            <ul class="menu__box">
                                <?php if ($_COOKIE['user2'] != 1) : ?>
                                    <li><a class="menu__item" href="add-good.php">Добавить товар</a></li>
                                <?php endif; ?>
                                <li><a class="menu__item" href="cabinet.php">Личный кабинет</a></li>
                                <li><a class="menu__item" href="exit.php">Выход</a></li>
                            </ul>

                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </header>
    <?
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
} 
$id= $_POST['id'];
$result = $mysql->query("SELECT * FROM `product_info` where `product_id` = $id ");
$result = $result->fetch_assoc();
$mysql->close();
?>
    <div class="wrapper">
        <form action="change.php" method="POST">
            <div class="wrapper__row1">
                <input type="text" name="name" value=<?= $result['product_name'] ?>>
            </div>
            <div class="wrapper__row2">
                <input type="text" name="img" value=<?= $result['img'] ?>>
            </div>

            <div class="wrapper__row4">
                <input type="number" name="amount" value=<?= $result['amount'] ?>>
            </div>
            <div class="wrapper__row5">
                <textarea type="text" name="descr" rows="5" wrap="soft"><?= $result['descr'] ?></textarea>
            </div>
            <input type="hidden" name="id" value=<?= $id ?>>
            <div class="wrapper__row6">
                <button type="submit" class="btn"> Изменить</button>
            </div>
        </form>

    </div>
</body>

</html>