<?
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}

$userId = $_COOKIE['user3'];
$id = $_POST['prod_id'];
$result = $mysql->query("SELECT* FROM feedback WHERE  `user_id`=$userId and `product_id`=$id ");

if($result->fetch_assoc()){
    echo "Отзыв уже оставлен!";
    $mysql->close();
    exit();
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/feed.css">
    <title>feedback</title>
</head>

<body>
    <div class="wrapper">
        <div class="text">!!!Ваша оценка!!!</div>
        <form action="feedDB.php" method="POST">
            <input type="hidden" name="prod_id" value=<?= $_POST['prod_id'] ?>>
            <div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div>
            <div class="btn "><button type="submit">Отправить
                </button></div>
        </form>

    </div>
</body>

</html>