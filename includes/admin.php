<?php require_once("includes/globals.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
	<head>
		<meta charset="utf-8">
		<title>Админ-панель</title>
	</head>
	<body>
		<div> <a href="javascript:history.back();">Назад</a> </div>
		<a href="/?add">Добавить новость</a>
		<center><table border=1>
			<tr>
				<td><center>Заголовок</center></td>
				<td><center>Категория</center></td>
				<td><center>Дата</center></td>
				<td><center>Изменить</center></td>
				<td><center>Удалить</center></td>
			</tr>
			<?php for ($i = 0; $i < count($pageData); $i++) {?>
			<tr>
				<td><a href="?p=<?php echo($pageData[$i]["id"]); ?>">
					<?php echo($pageData[$i]["title"]); ?>
					</a>
				</td>
				<td><center><?php echo($pageData[$i]["category"]); ?></center></td>
				<td><center><?php echo($pageData[$i]["date"]); ?></center></td>
				<td><center><a href="/?edit=<?php echo($pageData[$i]["id"]); ?>">Изм</a></center></td>
				<td><center><strong><a href="/?del=<?php echo($pageData[$i]["id"]); ?>">Удалить</a></strong></center></td>
			</tr>
			<?php }	?>
		</table></center>
	</body>
</html>