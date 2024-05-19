<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сторінка входу</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/sign.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Вхід або реєстрація</p>
			</div>
		</div>
	</header>
	<section class="sign">
		<div class="container">
			<form action="/sign.php" class="signForm" method="POST" enctype="application/x-www-form-urlencoded">
				<input type="email" class="signFormInp" name="sign_login" placeholder="Логін" required>
				<input type="password" class="signFormInp" name="sign_password" placeholder="Пароль" required>
				<div class="signFormRem">
					<input type="checkbox" class="signFormRemCheck" name="sign_remember" checked>
					<p class="signFormRemP">
						Запам'ятати мене
					</p>
				</div>
				<button type="submit" class="signFormBtn">Увійти</button>
				<a class="signFormA" href="/registration.php">Реєстрація</a>
				<a class="signFormA" href="/reset.php">Відновити пароль</a>
			</form>
		</div>
	</section>
	</body>
</html>