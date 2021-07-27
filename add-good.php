<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-good</title>
    <link rel="stylesheet" href="css/hamburger.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add-good.css">

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
                                    <li><a class="menu__item" href="#">Добавить товар</a></li>
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
    <div class="wrapper">
        <form action="php/good/plus.php" method="POST">
            <div class="wrapper__row1">
                <input type="text" name="name" required placeholder="название">
            </div>
            <div class="wrapper__row2">
                <input type="text" name="img" required placeholder="файл с картинкой">
            </div>
            <div class="wrapper__row3">
                <input type="number" name="price" required placeholder="цена">
            </div>
            <div class="wrapper__row4">
                <input type="number" name="amount" required placeholder="количество">
            </div>
            <div class="wrapper__row5">
                <textarea type="text" name="descr" required rows="5" wrap="soft" placeholder="описание"></textarea>
            </div>
            <div class="wrapper__row6">
                <button type="submit" class="btn btn-success"> Добавить товар</button>
            </div>
        </form>
    </div>
</body>

</html>