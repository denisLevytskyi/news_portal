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
				<?php foreach ($_SESSION['post']['category'] as $k => $v) { ?>
					<a href="/list.php?list_id=<?php echo $k; ?>" class="categoryWrapA">
						<?php echo $v; ?>
					</a>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="post">
		<div class="container">
			<h2 class="postH2">
				<?php echo $_SESSION['post']['body']['header']; ?>
			</h2>
			<img src="<?php echo $_SESSION['post']['body']['photo']; ?>" alt="img" class="postImg">
			<p class="postP">
				<?php echo $_SESSION['post']['body']['text_full']; ?>
			</p>
			<p class="postInfo">
				Автор: <?php echo $_SESSION['post']['body']['auth_name']; ?>
			</p>
			<p class="postInfo">
				Додано: <?php echo $_SESSION['post']['body']['time']; ?>
			</p>
			<p class="postInfo">
				Переглядів: <?php echo $_SESSION['post']['body']['views']; ?>
			</p>
			<?php if ($_SESSION['auth']['id'] == $_SESSION['post']['body']['auth_id'] or $_SESSION['auth']['role'] == '2') { ?>
				<a href="/postEdit.php/?post_edit_id=<?php echo $_SESSION['post']['body']['id']; ?>" class="postA">
					Редагувати
				</a>
				<a href="/post.php/?post_del_id=<?php echo $_SESSION['post']['body']['id']; ?>" class="postA">
					Видалити
				</a>
			<?php } ?>
		</div>
	</section>
	<section class="comments">
		<div class="container">
			<div class="commentsWrap">
				<?php if (!empty($_SESSION['post']['comments'])) {
					foreach ($_SESSION['post']['comments'] as $k => $v) { ?>
						<div class="commentsWrapItem">
							<img src="<?php echo $v['auth_photo']; ?>" alt="img" class="commentsWrapItemImg">
							<div class="commentsWrapItemWrap">
								<h3 class="commentsWrapItemWrapH3">
									<?php echo $v['auth_name']; ?>
								</h3>
								<p class="commentsWrapItemWrapP">
									<?php echo $v['text']; ?>
								</p>
								<p class="commentsWrapItemWrapInfo">
									<?php echo $v['time']; ?>
								</p>
								<?php if ($_SESSION['auth']['id'] == $v['auth_id'] or $_SESSION['auth']['role'] == '2') { ?>
									<a href="/commentEdit.php/?comment_edit_id=<?php echo $v['id']; ?>" class="commentsWrapItemWrapA">
										Редагувати
									</a>
									<a href="/post.php/?post_del_comment_id=<?php echo $v['id']; ?>" class="commentsWrapItemWrapA">
										Видалити
									</a>
								<?php } ?>
							</div>
						</div>
					<?php }
				} else { ?>
					<p class="commentsWrapP">
						Нажаль, коментарі відсутні
					</p>
				<?php } ?>
			</div>
			<a href="/" class="listA">
				На головну!
			</a>
		</div>
	</section>
	<section class="comment">
		<div class="container">
			<?php if ($_SESSION['auth']['role'] == 0) { ?>
				<p class="commentP">
					Для додавання кометарів виконайте ВХІД
				</p>
			<?php } else { ?>
				<form action="/post.php" class="commentForm" method="POST" enctype="application/x-www-form-urlencoded">
					<textarea rows="5" class="commentFormInp" name="post_add_comment_text" placeholder="Текст коментарю" required></textarea>
					<button type="confirm" class="commentFormBtn">Додати</button>
				</form>
				<a href="/" class="commentA">
					На головну!
				</a>
			<?php } ?>
		</div>
	</section>
</body>
</html>