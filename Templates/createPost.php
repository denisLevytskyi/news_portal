<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Користувач: <?php echo $_SESSION['auth']['name']; ?></title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/createPost.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Створення допису</p>
			</div>
		</div>
	</header>
	<section class="auth">
		<img src="<?php echo $_SESSION['auth']['photo']; ?>" alt="img" class="authImg">
		<div class="authWrap">
			<p class="authWrapName">
				<?php echo $_SESSION['auth']['name']; ?>
			</p>
			<a href="/createPost.php" class="authWrapLink">
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
	<section class="create">
		<div class="container">
			<form action="/createPost.php" class="createForm" method="POST" enctype="multipart/form-data">
				<p class="createFormP">
					Фотокартка
				</p>
				<input type="file" class="createFormInp" name="create_post_photo">
				<p class="createFormP">
					Категорія статті:
				</p>
				<select class="createFormInp" name="create_post_category" id="list" required>
					<?php $list = Logics\Category::get_category();
					foreach ($list as $k => $v) { ?>
						<option value="<?php echo $k; ?>">
							<?php echo $v; ?>
						</option>
					<?php } ?>
				</select>
				<p class="createFormP">
					Заголовок:
				</p>
				<input type="text" class="createFormInp" name="create_post_header" required>
				<p class="createFormP">
					Текст:
				</p>
				<textarea rows="15" class="createFormInp" name="create_post_text" required></textarea>
				<button type="submit" class="createFormBtn">Створити допис</button>
				<a class="createFormA" href="/">На головну</a>
			</form>
		</div>
	</section>
</body>
</html>