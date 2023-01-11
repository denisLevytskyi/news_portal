<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Привіт <?php echo $_SESSION['auth']['name']; ?>!</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/index.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Головний новосний портал Волині</p>
			</div>
		</div>
	</header>
	<?php if ($_SESSION['auth']['role'] == 0) { ?>
		<section class="login">
			<a href="/sign.php" class="loginA">
				Вхід / Реєстрація
			</a>
		</section>
	<?php } ?>
	<?php if ($_SESSION['auth']['role'] != 0) { ?>
		<section class="auth">
			<img src="<?php echo $_SESSION['auth']['photo']; ?>" alt="img" class="authImg">
			<div class="authWrap">
				<p class="authWrapName">
					<?php echo $_SESSION['auth']['name']; ?>
				</p>
				<a href="createPost.php" class="authWrapLink">
					Створити допис
				</a>
				<a href="/editAuth.php" class="authWrapLink">
					Редагування даних
				</a>
				<a href="/?auth_disconnect=1" class="authWrapLink">
					Вихід з системи
				</a>
			</div>
		</section>
	<?php } ?>
</body>
</html>