<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Продолжение регистрации</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col1">
				<h1>Продолжение регистрации</h1>
				<form action="auth3.php" method="post">
					<input type="text" class="form-control" name="e-mail" id="e-mail" placeholder="Введите почту"><br>
					<input type="text" class="form-control" name="f-name" id="f-name" placeholder="Введите Имя"><br>
					<input type="text" class="form-control" name="l-name" id="l-name" placeholder="Введите Фамилию"><br>
					<input type="text" class="form-control" name="patr" id="patr" placeholder="Введите Отчество"><br>
					<input type="number" class="form-control" name="passport" id="passport" placeholder="Введите паспорт"><br>
					<input type="tel" class="form-control" name="phone" id="phone" placeholder="Введите номер телефона" ><br>
					<?php
					if ($_COOKIE['user2'] == 1) : ?>
						<input type="date" class="form-control" name="birthday" id="birthday" placeholder="Введите День рождения формата: гггг-мм-дд"><br>
						<input type="text" class="form-control" name="place" id="place" placeholder="Введите место жительства"><br>
					<?php endif; ?>
					<button class="btn btn-success" type="submit">Зарегистрировать</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>