<!DOCTYPE html>
<html lang="en">
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
				<input type="text" class="registrationFormInp" name="registration_name" value="<?php echo($_POST['registration_name']);?>" readonly>
				<input type="email" class="registrationFormInp" name="registration_login" value="<?php echo($_POST['registration_login']);?>" readonly>
				<input type="password" class="registrationFormInp" name="registration_password_1" value="<?php echo($_POST['registration_password_1']);?>" readonly>
				<input type="password" class="registrationFormInp" name="registration_password_2" value="<?php echo($_POST['registration_password_1']);?>" readonly>
				<input type="text" class="registrationFormInp" name="registration_pin" placeholder="PIN з Email" required>
				<input type="text" style="display: none;" name="registration_2" value="1" required>
				<button type="confirm" class="registrationFormBtn">Завершити реєстрацію</button>
			</form>
		</div>
	</section>
</body>
</html>