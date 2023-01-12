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
	<?php } ?>
	<section class="category">
		<div class="container">
			<div class="categoryWrap">
				<a href="/list.php?list_id=*" class="categoryWrapA">
					УСІ НОВИНИ
				</a>
				<?php foreach ($_SESSION['list']['category'] as $k => $v) { ?>
					<a href="/list.php?list_id=<?php echo $k; ?>" class="categoryWrapA">
						<?php echo $v; ?>
					</a>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="list">
		<div class="container">
			<h2 class="listH2">
				Новини за обраною категорією:
			</h2>
			<div class="listWrap">
				<?php if (!empty($_SESSION['list']['news'])) {
					foreach ($_SESSION['list']['news'] as $k => $v) { ?>
						<div class="listWrapItem">
							<img src="<?php echo $v['photo']; ?>" alt="img" class="listWrapItemImg">
							<div class="listWrapItemWrap">
								<h3 class="listWrapItemWrapH3">
									<?php echo $v['header']; ?>
								</h3>
								<a href="/post.php?post_id=<?php echo $v['id']; ?>" class="listWrapItemWrapA">
									<?php echo $v['text_first']; ?>
								</a>
							</div>
						</div>
					<?php }
				} else { ?>
					<p class="listWrapP">
						Нажаль, новини поки відсутні
					</p>
				<?php } ?>
			</div>
			<a href="/" class="listA">
				На головну!
			</a>
		</div>
	</section>
</body>
</html>