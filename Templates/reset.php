<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Відновлення доступу</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/reset.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Відновлення доступу</p>
			</div>
		</div>
	</header>
	<section class="reset">
		<div class="container">
			<form action="/reset.php" class="resetForm" method="POST" enctype="application/x-www-form-urlencoded">
				<p class="resetFormP">
					Новий пароль буде надіслано на вказану пошту:
				</p>
				<input type="email" class="resetFormInp" name="reset_login" placeholder="Логін (Email)" required>
				<button type="confirm" class="resetFormBtn">Відновити!</button>
				<a class="resetFormA" href="/">На головну!</a>
			</form>
		</div>
	</section>
</body>
</html>