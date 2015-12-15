<?php
	// htmlspecialchars, наверное, нигде не нужен?
	// Подключаемся к MySQL
	require_once("mysql.php");

	//Редактирование/удаление
	if (isset($_POST["add"])) {						// Добавляем новость в БД
		$DataBase->PostAdd($_POST["title"], $_POST["content"], $_POST["category"]);
	} else if (isset($_POST["edt"])) { 				// Изменяем новость в БД
		$DataBase->PostUpdate($_POST["edt"], $_POST["title"], $_POST["content"], $_POST["category"]);
	}

	//Вывод сайта
	require_once("includes/globals.php");
	$allCategories = $DataBase->getCategories();
	if (isset($_GET["p"])) {
		$pageData = $DataBase->getPostByID($_GET["p"]);
		require_once("includes/page.php");			// Страница новости
	} else if (isset($_GET["admin"])) {
		$pageData = $DataBase->getPosts(100, 0);
		require_once("includes/admin.php");			// Админ-панель
	} else if (isset($_GET["add"])) {
		$pageData = NULL;
		require_once("includes/edit.php");			// Добавление новости
	} else if (isset($_GET["edit"])) {
		$pageData = $DataBase->getPostByID($_GET["edit"]);
		require_once("includes/edit.php");			// Редактирование новости
	} else if (isset($_GET["del"])) {
		$DataBase->PostDelete($_GET["del"]);
		$pageData = $DataBase->getPosts(100, 0);
		require_once("includes/admin.php");			// Удаление новости
	} else if (isset($_GET["search"])) {
		$pageData = $DataBase->getPostsBySubstring($_GET["search"]);
		require_once("includes/search.php");		// Поиск
	} else if (isset($_GET["cat"])) {
		$pageData = $DataBase->getPostsByCat($_GET["cat"]);
		require_once("includes/search.php");		// Новости по категории
	} else {
		$pageData = $DataBase->getPosts(100, 0);
		require_once("includes/main.php");			// Главная страница
	}
?>