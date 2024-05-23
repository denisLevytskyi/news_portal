<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редагування категорій</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/index.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Редагування категорій</p>
			</div>
		</div>
	</header>
	<section class="categoryList">
		<div class="container">
			<div class="categoryListWrap">
				<form action="/categoryEdit.php" class="categoryListWrapForm" method="POST">
					<input type="text" class="categoryListWrapFormInp" name="category_edit_new" placeholder="Нова категорія" required>
					<button type="submit" style="display: none;"></button>
				</form>
				<?php foreach ($_SESSION['category_edit'] as $k => $v) { ?>
						<div class="categoryListWrapItem">
							<form action="/categoryEdit.php" class="categoryListWrapItemForm" method="POST">
								<input style="display: none;" name="category_edit_id" value="<?php echo $k; ?>" required>
								<input type="text" class="categoryListWrapItemFormInp" name="category_edit_name" value="<?php echo $v; ?>" required>
								<button type="submit" style="display: none;"></button>
							</form>
							<a href="/categoryEdit.php?category_edit_del_id=<?php echo $k; ?>" class="categoryListWrapItemA">
								X
							</a>
						</div>
				<?php } ?>
			</div>
			<a href="/" class="categoryListA">
				На головну
			</a>
		</div>
	</section>
</body>
</html>