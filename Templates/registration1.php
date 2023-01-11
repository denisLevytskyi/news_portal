<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Реєстрація</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/registration.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Реєстрація</p>
			</div>
		</div>
	</header>
	<section class="registration">
		<div class="container">
			<form action="/registration.php" class="registrationForm" method="POST" enctype="application/x-www-form-urlencoded">
				<input type="text" class="registrationFormInp" name="registration_name" placeholder="Им'я" required>
				<input type="email" class="registrationFormInp" name="registration_login" placeholder="Email" required>
				<input type="password" class="registrationFormInp" name="registration_password_1" placeholder="Пароль" required>
				<input type="password" class="registrationFormInp" name="registration_password_2" placeholder="Пароль" required>
				<input type="text" style="display: none;" name="registration_1" value="1" required>
				<button type="confirm" class="registrationFormBtn">Отримати код</button>
			</form>
		</div>
	</section>
</body>
</html>