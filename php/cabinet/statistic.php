<?
$date = new DateTime('+1 days');
$p_date = new DateTime('-30 days');
?>
<div class="">Диапозон</div>

<form action="php/cabinet/vivod.php" method="POST">
    <div class="stat-row1">
        <div class="stat-row1__s-col1">
            От: <input name="s-p-date" type="date" value=<?= $p_date->format('Y-m-d') ?>>
        </div>
        <div class="stat-row1__s-col2">
            До: <input name="s-date" type="date" value=<?= $date->format('Y-m-d') ?>>
        </div>
        <div class="s-btn">
            <button type="submit">вывод</button>
        </div>
    </div>
</form>