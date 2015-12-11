<?php require_once("includes/globals.php"); 
	if ($pageData == NULL) {
		$title = "";
		$content = "";
		$category = "";
	} else {
		$title = $pageData["title"];
		$content = $pageData["content"];
		$category = $pageData["category"];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
	<head>
		<meta charset="utf-8">
		<title>Редактирование записи <?php echo($title); ?></title>
	</head>
	<body>
		<div> <a href="javascript:history.back();">Назад</a> </div>
		<center><form action="/" method="post">
			<?php if ($pageData == NULL) { ?>
				<p><input type="hidden" name="add" value=""></p>
			<?php } else { ?>
				<p><input type="hidden" name="edt" value="<?php echo($pageData["id"]); ?>"></p>
			<?php } ?>
			<p><b>Заголовок:</b></p>
			<p><input type="text" name="title" size="45" value="<?php echo($title); ?>"></p>		
			<p><b>Текст:</b></p>
			<p><textarea rows="10" cols="45" name="content"><?php echo($content); ?></textarea></p>
			<p><b>Категория:</b></p>
			<p><input type="text" name="category" size="45" value="<?php echo($category); ?>"></p>
			<p><input type="submit" value="ОК"></p>
		</form></center>
	</body>
</html>