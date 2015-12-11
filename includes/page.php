<?php require_once("includes/globals.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo($pageData["title"]); ?></title>
	</head>
	<body>
		<div><a href="javascript:history.back();">Назад</a></div>
		<div>
			<a href="?p=<?php echo($pageData["id"]); ?>">
				<h2><?php echo($pageData["title"]); ?></h2>
			</a>
		</div>
		<div>
			<?php echo($pageData["content"]); ?>
		</div>
		<div style="width:50%; display: inline-block">
			Категория: <?php echo($pageData["category"]); ?>
		</div><div style="width:50%; display: inline-block;">
			Дата публикации: <?php echo($pageData["date"]); ?>
		</div>
	</body>
</html>