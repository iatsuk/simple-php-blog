<?php
	// htmlspecialchars, наверное, нигде не нужен?
	// Подключаемся к MySQL
	require_once("mysql.php");
	yav_mysql_init();
	
	//Редактирование/удаление
	if (isset($_POST["add"])) {						// Добавляем новость в БД
		yav_mysql_add($_POST["title"], $_POST["content"], $_POST["category"]);
	} else if (isset($_POST["edt"])) { 				// Изменяем новость в БД
		yav_mysql_edit($_POST["edt"], $_POST["title"], $_POST["content"], $_POST["category"]);
	}
	
	//Вывод сайта
	require_once("includes/globals.php");
	$allCategories = yav_mysql_getCategories();
	if (isset($_GET["p"])) {
		$pageData = yav_mysql_byID($_GET["p"]);
		require_once("includes/page.php");			// Страница новости
	} else if (isset($_GET["admin"])) {
		$pageData = yav_mysql_show(100, 0);
		require_once("includes/admin.php");			// Админ-панель
	} else if (isset($_GET["add"])) {
		$pageData = NULL;
		require_once("includes/edit.php");			// Добавление новости
	} else if (isset($_GET["edit"])) {
		$pageData = yav_mysql_byID($_GET["edit"]);
		require_once("includes/edit.php");			// Редактирование новости
	} else if (isset($_GET["del"])) {
		yav_mysql_del($_GET["del"]);
		$pageData = yav_mysql_show(100, 0);
		require_once("includes/admin.php");			// Удаление новости
	} else if (isset($_GET["search"])) {
		$pageData = yav_mysql_search($_GET["search"]);
		require_once("includes/search.php");		// Поиск
	} else if (isset($_GET["cat"])) {
		$pageData = yav_mysql_byCat($_GET["cat"]);
		require_once("includes/search.php");		// Новости по категории
	} else {
		$pageData = yav_mysql_show(100, 0);
		require_once("includes/main.php");			// Главная страница
	}
?>