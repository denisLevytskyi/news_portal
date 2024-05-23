<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблиця користувачів</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/userList.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Таблиця користувачів</p>
			</div>
		</div>
	</header>
	<section class="list">
		<div class="container">
			<div class="listWrap">
				<?php foreach ($_SESSION['user_list'] as $k => $v) { ?>
					<form action="/userList.php" class="listWrapForm" method="POST" enctype="application/x-www-form-urlencoded">
						<img src="<?php echo $v['photo']; ?>" alt="img" class="listWrapFormImg">
						<?php if ($_SESSION['auth']['id'] == $v['id']) { ?>
							<p class="listWrapFormP" style="margin: auto;">
								ЦЕ ВАШ АКАУНТ
							</p>
						<?php } ?>
						<p class="listWrapFormP">
							ID: <?php echo $v['id']; ?>
						</p>
						<p class="listWrapFormP">
							Логін
						</p>
						<input type="text" class="listWrapFormInp" name="user_list_login" required value="<?php echo $v['login']; ?>">
						<p class="listWrapFormP">
							Ім'я
						</p>
						<input type="text" class="listWrapFormInp" name="user_list_name" required value="<?php echo $v['name']; ?>">
						<p class="listWrapFormP">
							Рівень доступу
						</p>
						<select class="listWrapFormInp" name="user_list_role" required>
							<option value="1" <?php echo $v['role'] != 1 ?: 'selected'; ?>>Користувач</option>
							<option value="2" <?php echo $v['role'] != 2 ?: 'selected'; ?>>Адмін</option>
						</select>
						<input type="text" style="display: none;" name="user_list_id" required value="<?php echo $v['id']; ?>">
						<button class="listWrapFormBtn">
							Змінити
						</button>
						<a href="/userList.php/?user_list_del_id=<?php echo $v['id']; ?>" class="listWrapFormA">
							Видалити
						</a>
					</form>
				<?php } ?>
			</div>
			<a href="/" class="listA">
				На головну
			</a>
		</div>
	</section>
</body>
</html>