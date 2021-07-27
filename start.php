<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Форма регистрации/авторизации</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col1">
				<h1>Форма регистрации</h1>
				<form action="validation/check.php" method="post">
					<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" maxlenth="20"><br>
					<input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль" maxlenth="32"><br>
					<?php if ($_COOKIE['auth'] != '') : ?>
						<div class="succcess" style="text-align: center; background-color: rgb(112, 228, 77);border-radius: 10px; font-size: 20px;	margin: 0px 10px; ">
							<p style="padding: 5px 0">Пользователь успешно зарегестрирован! Авторизуйтесь для продолжения регистрации.</p>
						</div>
					<?php endif; ?>
					<button class="btn btn-success" type="submit">Зарегистрировать</button>
				</form>
			</div>
			<div class="col2">
				<h1>Форма авторизации</h1>
				<form action="validation/auth.php" method="post">
					<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" maxlenth="20"><br>
					<input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль" maxlenth="32"><br>
					<button class="btn btn-success" type="submit">Авторизоваться</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>