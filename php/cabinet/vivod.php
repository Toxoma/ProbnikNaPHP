<?php
$mysql = new mysqli('localhost', 'root', 'root', 'cite');
if ($mysql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysql->connect_error);
    exit();
}
$date_1 = $_POST['s-date'];
$date_2 = $_POST['s-p-date'];
$result = $mysql->query("SELECT * FROM `purchase_hist` WHERE `purchase_data` between '$date_2' and '$date_1'");
$n = 0;
while ($row = $result->fetch_assoc()) {
    $amount = 0;
    $date = date('Y-m-d', strtotime(
        $row['purchase_data']
    ));

    $id = $row['purchase_id'];
    $num = $mysql->query("SELECT `amount` FROM `purchase_info` WHERE `purchase_id` = '$id' ");
    while ($col = $num->fetch_assoc()) {
        $amount = $amount + $col['amount'];
    }
    if (isset($mas[$date])) {
        $amount = $mas[$date] + $amount;
        $mas[$date] = $amount;
    } else {
        $mas[$date] = $amount;
        $masDate[$n] = $date;
        $n++;
    }
}

$count = 0;
for ($i = $date_2; $i < $date_1; $i = date('Y-m-d', strtotime($i . ' + 1 day'))) {
    $count++;
}
$maxY = max($mas);

$y = count($mas); //!!!

header('Content-type: image/png');
$image = imageCreateTrueColor(1100, 400);
$white = imageColorAllocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, 1099, 399, $white);
$blue = imageColorAllocate($image, 0, 0, 255);
imageLine($image, 50, 250, 1050, 250, $blue);
imageLine($image, 50, 50, 50, 250, $blue);
$green = imageColorAllocate($image, 50, 237, 35); //цвет графика
imageSetThickness($image, 2); //толщина линий

for ($i = 0; $i < count($masDate); $i++) {
    $x = $masDate[$i];
    if (isset($mas[$x])) {
        if ($mas[$x] == $maxY) {
            imageString($image, 5, 30, 45, $mas[$x], $blue);
            imageLine($image, 51, 250 - 200 / $maxY * $mas[$x], 54, 250 - 200 / $maxY * $mas[$x], $blue);
        } else {
            imageLine($image, 51, 250 - 200 / $maxY * $mas[$x], 54, 250 - 200 / $maxY * $mas[$x], $blue);
            imageString($image, 5, 30, 245 - 200 / $maxY * $mas[$x], $mas[$x], $blue);
        }
    }
}

for ($i = 1; $i <= $count; $i++) {

    imageLine($image, 50 + 1000 / $count * $i, 246, 50 + 1000 / $count * $i, 249, $blue);
    imageString($image, 5, 50 + 1000 / $count * $i, 255, $i, $blue);
}

$n = 0;
for (
    $i = $date_2;
    $i < $date_1;
    $i = date('Y-m-d', strtotime($i . ' + 1 day'))
) {
    imageLine($image, 50 + 1000 / $count * $n, 250 - 200 / $maxY * $mas[$i], 50 + 1000 / $count * ($n + 1), 250 - 200 / $maxY * $mas[date('Y-m-d', strtotime($i . ' + 1 day'))], $green);
    $n++;
}

imageString($image, 5, 450, 300, "Ot: $date_2       Do: $date_1", $blue);
imageString($image, 5, 10, 30, "Kol-vo", $blue);
imageString($image, 5, 1060, 270, "days", $blue);
imagepng($image);
imagedestroy($image);
?>

<?
$mysql->close();