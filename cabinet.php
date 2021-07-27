<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <link rel="stylesheet" href="css/cabinet.css">
    <link rel="stylesheet" href="css/history1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                                <li><a class="menu__item" href="php/pocket/userPocket.php">Корзина <<?= $_SESSION['n'] ?>> </a></li>
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
        <div class="personal-info">
            <div class="personal-info__f-name f-name">
                <div class="f-name__col1">
                    Имя
                </div>
                <form action="php/change/c-f-name.php" method="post">
                    <div class="f-name__col2">
                        <input type="text" name="f-name" value=<? include('php/f-name.php'); ?>>
                    </div>
                    <div class="f-name__col3">
                        <button type="submit"><img src="img/change.jpg" alt=""></button>
                    </div>
                </form>
            </div>

            <div class="personal-info__l-name">
                <div class="f-name__col1">
                    Фамилия
                </div>
                <form action="php/change/c-l-name.php" method="post">
                    <div class="f-name__col2">
                        <input type="text" name="f-name" value=<? include('php/l-name.php'); ?>>
                    </div>
                    <div class="f-name__col3">
                        <button type="submit"><img src="img/change.jpg" alt=""></button>
                    </div>
                </form>
            </div>

            <div class="personal-info__patron">
                <div class="f-name__col1">
                    Отчество
                </div>
                <form action="php/change/c-patron.php" method="post">
                    <div class="f-name__col2">
                        <input type="text" name="f-name" value=<? include('php/patron.php'); ?>>
                    </div>
                    <div class="f-name__col3">
                        <button type="submit"><img src="img/change.jpg" alt=""></button>
                    </div>
                </form>
            </div>

            <div class="personal-info__passport">
                <div class="f-name__col1">
                    Паспорт
                </div>
                <form action="php/change/c-passport.php" method="post">
                    <div class="f-name__col2">
                        <input type="number" name="f-name" value=<? include('php/passport.php'); ?>>
                    </div>
                    <div class="f-name__col3">
                        <button type="submit"><img src="img/change.jpg" alt=""></button>
                    </div>
                </form>
            </div>

            <div class="personal-info__phone">
                <div class="f-name__col1">
                    Телефон
                </div>
                <form action="php/change/c-phone.php" method="post">
                    <div class="f-name__col2">
                        <input type="number" name="f-name" value=<? include('php/phone.php'); ?>>
                    </div>
                    <div class="f-name__col3">
                        <button type="submit"><img src="img/change.jpg" alt=""></button>
                    </div>
                </form>
            </div>

            <div class="personal-info__e-mail">
                <div class="f-name__col1">
                    E-mail
                </div>
                <form action="php/change/c-e-mail.php" method="post">
                    <div class="f-name__col2">
                        <input type="text" name="f-name" value=<? include('php/e-mail.php'); ?>>
                    </div>
                    <div class="f-name__col3">
                        <button type="submit"><img src="img/change.jpg" alt=""></button>
                    </div>
                </form>

            </div>
            <?php
            if ($_COOKIE['user2'] == 1) : ?>
                <div class="personal-info__birthday">
                    <div class="f-name__col1">
                        День рождения
                    </div>
                    <form action="php/change/c-birthday.php" method="post">
                        <div class="f-name__col2">
                            <input type="text" name="f-name" value=<? include('php/birthday.php'); ?>>
                        </div>
                        <div class="f-name__col3">
                            <button type="submit"><img src="img/change.jpg" alt=""></button>
                        </div>
                    </form>
                </div>

                <div class="personal-info__location">
                    <div class="f-name__col1">
                        Место жительства
                    </div>
                    <form action="php/change/c-place.php" method="post">
                        <div class="f-name__col2">
                            <input type="text" name="f-name" value=<? include('php/place.php'); ?>>
                        </div>
                        <div class="f-name__col3">
                            <button type="submit"><img src="img/change.jpg" alt=""></button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($_COOKIE['user2'] == 1) : ?>
            <div class="pocket">
                <div class="pocket__row1">
                    <div class="pocket__col1" style="font-size:30px; font-weight: bold">
                        История покупок
                    </div>
                </div>
                <div class=" pocket__row2" id="row2"></div>
            </div>
        <? else : ?>

            <div class="m-pocket">
                <div class="m-pocket__row1">
                    <div class="m-pocket__col0">
                        <button id="m-btn0">История покупок</button>
                    </div>
                    <div class="m-pocket__col1">
                        <button id="m-btn1">Оформляется</button>
                    </div>
                    <div class="m-pocket__col2">
                        <button id="m-btn2">Принят</button>
                    </div>
                    <div class="m-pocket__col3">
                        <button id="m-btn3">Отменён</button>
                    </div>
                    <div class="m-pocket__col4">
                        <button id="m-btn4">Cтатистика</button>
                    </div>

                </div>
                <div class="m-pocket__row2">
                    <div class="col0" id="m-row1"></div>
                    <div class="col1" id="m-row2"></div>
                    <div class="col2" id="m-row3"></div>
                    <div class="col3" id="m-row4"></div>
                    <div class="col4" id="m-row5"></div>
                </div>

            </div>
        <? endif ?>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#row2").load("php/cabinet/user-history.php");

        $("#m-row1").load("php/cabinet/user-history.php");

        $("#m-btn0").click(function() {
            $("#m-row1").css("display", "block");
            $("#m-row2").css("display", "none");
            $("#m-row3").css("display", "none");
            $("#m-row4").css("display", "none");
            $("#m-row5").css("display", "none");
            $("#m-row1").load("php/cabinet/user-history.php");

        })
        $("#m-btn1").click(function() {
            $("#m-row1").css("display", "none");
            $("#m-row2").css("display", "block");
            $("#m-row3").css("display", "none");
            $("#m-row4").css("display", "none");
            $("#m-row5").css("display", "none");
            $("#m-row2").load("php/cabinet/oforml.php");

        })
        $("#m-btn2").click(function() {
            $("#m-row1").css("display", "none");
            $("#m-row2").css("display", "none");
            $("#m-row3").css("display", "block");
            $("#m-row4").css("display", "none");
            $("#m-row5").css("display", "none");
            $("#m-row3").load("php/cabinet/priniat.php");
        })
        $("#m-btn3").click(function() {
            $("#m-row1").css("display", "none");
            $("#m-row2").css("display", "none");
            $("#m-row3").css("display", "none");
            $("#m-row4").css("display", "block");
            $("#m-row5").css("display", "none");
            $("#m-row4").load("php/cabinet/otmenen.php");
        })
        $("#m-btn4").click(function() {
            $("#m-row1").css("display", "none");
            $("#m-row2").css("display", "none");
            $("#m-row3").css("display", "none");
            $("#m-row4").css("display", "none");
            $("#m-row5").css("display", "block");
            $("#m-row5").load("php/cabinet/statistic.php");
        })
    });
</script>