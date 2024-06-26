<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редагування</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/postEdit.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Редагування допису</p>
			</div>
		</div>
	</header>
	<section class="auth">
		<img src="<?php echo $_SESSION['auth']['photo']; ?>" alt="img" class="authImg">
		<div class="authWrap">
			<p class="authWrapName">
				<?php echo $_SESSION['auth']['name']; ?>
			</p>
			<a href="/editAuth.php" class="authWrapLink">
				Редагування даних
			</a>
			<a href="/?auth_disconnect=1" class="authWrapLink">
				Вихід з системи
			</a>
			<?php if ($_SESSION['auth']['role'] == 2) { ?>
				<a href="/createPost.php" class="authWrapLink">
					Створити допис
				</a>
				<a href="/userList.php" class="authWrapLink">
					Таблиця користувачів
				</a>
				<a href="/categoryEdit.php" class="authWrapLink">
					Редагування категорій
				</a>
			<?php } ?>
		</div>
	</section>
	<section class="postEdit">
		<div class="container">
			<form action="/postEdit.php" class="postEditForm" method="POST" enctype="multipart/form-data">
				<p class="postEditFormP">
					Фотокартка
				</p>
				<input type="file" class="postEditFormInp" name="post_edit_photo">
				<p class="postEditFormP">
					Категорія статті:
				</p>
				<select class="postEditFormInp" name="post_edit_category" id="list" required>
					<option value=""></option>
					<?php foreach (Controllers\CategoryController::get_categories() as $k => $v) { ?>
						<option value="<?php echo $k; ?>" <?php echo $_SESSION['post_edit']['category'] != $k ?: 'selected'; ?>>
							<?php echo $v; ?>
						</option>
					<?php } ?>
				</select>
				<p class="postEditFormP">
					Заголовок:
				</p>
				<input type="text" class="postEditFormInp" name="post_edit_header" required value="<?php echo $_SESSION['post_edit']['header']; ?>">
				<p class="postEditFormP">
					Текст:
				</p>
				<textarea rows="15" class="postEditFormInp" name="post_edit_text" required><?php echo $_SESSION['post_edit']['text_full']; ?></textarea>
				<input type="text" style="display: none;" name="post_edit_id" value="<?php echo $_SESSION['post_edit']['id']; ?>" required>
				<input type="text" style="display: none;" name="post_edit_photo_old" value="<?php echo $_SESSION['post_edit']['photo']; ?>" required>
				<button class="postEditFormBtn">Оновити допис</button>
				<a class="postEditFormA" href="/">На головну</a>
			</form>
		</div>
	</section>
</body>
</html>