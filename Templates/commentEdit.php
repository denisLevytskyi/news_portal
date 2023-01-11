<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редагування коментарю</title>
	<link rel="stylesheet" href="/Styles/main.css">
	<link rel="stylesheet" href="/Styles/commentEdit.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="headerWrap">
				<img src="/Materials/main_logo.png" alt="img" class="headerWrapImg">
				<p class="headerWrapP">Редагування коментарю</p>
			</div>
		</div>
	</header>
	<section class="commentEdit">
		<div class="container">
			<form action="/commentEdit.php" class="commentEditForm" method="POST" enctype="application/x-www-form-urlencoded">
				<p class="commentEditFormP">
					Новий текст коментарю:
				</p>
				<textarea rows="15" class="postEditFormInp" name="comment_edit_text" required><?php echo $_SESSION['comment_edit']['text']; ?></textarea>
				<button type="confirm" class="commentEditFormBtn">Змінити</button>
				<a class="commentEditFormA" href="/">На головну!</a>
			</form>
		</div>
	</section>
</body>
</html>