<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редагування даних</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/editAuth.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Редагування даних</p>
			</div>
		</div>
	</header>
	<section class="editAuth">
		<div class="container">
			<form action="/editAuth.php" class="editAuthForm" method="POST" enctype="multipart/form-data">
				<input  type="text" style="display: none;" name="edit_auth_id" value="<?php echo($_SESSION['auth']['id']);?>" readonly>
				<p class="editAuthFormP">
					Ім'я
				</p>
				<input type="text" class="editAuthFormInp" name="edit_auth_name" value="<?php echo($_SESSION['auth']['name']);?>">
				<p class="editAuthFormP">
					Логін
				</p>
				<input type="email" class="signFormInp" name="edit_auth_login" value="<?php echo($_SESSION['auth']['login']);?>">
				<p class="editAuthFormP">
					Пароль
				</p>
				<input type="password" class="editAuthFormInp" name="edit_auth_password_1" placeholder="Новий пароль" required>
				<p class="editAuthFormP">
					Пароль
				</p>
				<input type="password" class="editAuthFormInp" name="edit_auth_password_2" placeholder="Новий пароль" required>
				<p class="editAuthFormP">
					Фото
				</p>
				<input type="file" class="editAuthFormInp" name="edit_auth_photo">
				<input type="text" style="display: none;" name="edit_auth_1" value="1" required>
				<button type="confirm" class="editAuthFormBtn">Редагувати</button>
				<a class="editAuthFormA" href="/editAuth.php/?edit_auth_delete=1">Видалити профіль!</a>
				<a class="editAuthFormA" href="/">На головну!</a>
			</form>
		</div>
	</section>
</body>
</html>