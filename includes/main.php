<?php require_once("includes/globals.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
	<head>
		<meta charset="utf-8">
		<title>Главная</title>
	</head>
	<body>
		<div><a href="/?admin">Режим администратора</a></div>
		<br />
		<div>Поиск:
			<form action="/" method="get">
				<input type="text" name="search" size="45" value="">
				<input type="submit" value="ОК">
			</form>
		</div>
		<br />
		<div>Выбор категории:
			<form action="/" method="get">
				<select size="1" name="cat" required>
				<?php for ($i = 0; $i < count($allCategories); $i++) { ?>
					<option value="<?php echo($allCategories[$i]["category"]); ?>">
						<?php echo($allCategories[$i]["category"]); ?>
					</option>
				<?php } ?>
				</select>
				<input type="submit" value="Выбрать">
			</form>
		</div>
		<br />
		<?php for ($i = 0; $i < count($pageData); $i++) {?>
			<div>
				<a href="?p=<?php echo($pageData[$i]["id"]); ?>">
					<h2><?php echo($pageData[$i]["title"]); ?></h2>
				</a>
			</div>
			<div>
				<?php echo($pageData[$i]["content"]); ?>
			</div>
			<div style="width:50%; display: inline-block">
				Категория: <?php echo($pageData[$i]["category"]); ?>
			</div><div style="width:50%; display: inline-block;">
				Дата публикации: <?php echo($pageData[$i]["date"]); ?>
			</div>
		<?php } ?>
	</body>
</html>