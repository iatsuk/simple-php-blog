<?php require_once("includes/globals.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
	<head>
		<meta charset="utf-8">
		<title>Результаты поиска</title>
	</head>
	<body>
		<div>
			<a href="javascript:history.back();">Назад</a>
		</div>
		<?php for ($i = 0; $i < count($pageData); $i++) {?>
			<div>
				<h2><?php echo($pageData[$i]["title"]); ?></h2>
			</div>
			<div>
				<?php echo($pageData[$i]["content"]); ?>
			</div>
			<div style="width:50%; display: inline-block">
				Категория: <?php echo($pageData[$i]["category"]); ?>
			</div><div style="width:50%; display: inline-block;">
				Дата публикации: <?php echo($pageData[$i]["date"]); ?>
			</div>
		<?php }	?>
	</body>
</html>