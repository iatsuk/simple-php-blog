<?php
	require_once("config.php");
	
	////
	// Подключение к MySQL
	function yav_mysql_init() {
		// from config.php
		global $hostDB, $portDB, $userDB, $passwordDB, $nameDB;
		// Connect to MySQL
		$link = mysql_connect(
			"$hostDB:$portDB", 
			$userDB, 
			$passwordDB
		) or die (mysql_error ());
		// Connect to data base
		mysql_select_db(
			$nameDB, 
			$link
		) or die(mysql_error());
		// Setting charset
		mysql_set_charset("utf8", $link);
		// Return $link
		return $link;
	}
	
	////
	// Вспомогательная функция. Возвращает массив со всеми значениями ответа БД
	function yav_getArrayByQuery($query){
		$i = 0;
		while($result = mysql_fetch_assoc($query)){	    
		    $array[$i] = $result;
		    $i++;
		}
		return $array;		
	}
	
	////
	// Показывает новости
	function yav_mysql_show($count=10, $offset=0){
		$query = mysql_query("SELECT * FROM posts ORDER BY id DESC LIMIT $count OFFSET $offset");
		return yav_getArrayByQuery($query);
	}
	
	////
	// Новость по ID
	function yav_mysql_byID($id){
		$query = mysql_query("SELECT * FROM posts WHERE id='$id'");
		return mysql_fetch_assoc($query);
	}
	
	////
	// Показывает новости по выбранной категории
	function yav_mysql_byCat($category){
		$query = mysql_query("SELECT * FROM posts WHERE category='$category' ORDER BY id DESC");
		return yav_getArrayByQuery($query);		
	}
	
	////
	// Выдает список всех категорий
	function yav_mysql_getCategories(){
		$query = mysql_query("SELECT DISTINCT category FROM posts ORDER BY category");
		return yav_getArrayByQuery($query);			
	}
	
	////
	// Добавление новости
	function yav_mysql_add($title, $content, $category) {
		$title = mysql_escape_string($title);
		$content = mysql_escape_string($content);
		$category = mysql_escape_string($category);
		$query = mysql_query("INSERT INTO posts (title, content, category)
							VALUES ('$title', '$content', '$category')");
	}
	
	////
	// Редактирование новости
	function yav_mysql_edit($id, $title, $content, $category) {
		$query = mysql_query("UPDATE posts
							SET title='$title', content='$content', category='$category'
							WHERE id='$id'");	
	}
	
	////
	// Удаление новости
	function yav_mysql_del($id) {
		$query = mysql_query("DELETE FROM posts WHERE id='$id'");
	}
	
	////
	// Поиск
	function yav_mysql_search($text) {
		$query = mysql_query("SELECT * FROM posts 
							WHERE title LIKE '%$text%'
							OR content LIKE '%$text%' 
							OR category LIKE '%$text%'
							ORDER BY id DESC");
		return yav_getArrayByQuery($query);
	}
	
	////
	// Количество новостей
	function yav_mysql_count() {
		$query = mysql_query("SELECT COUNT(*) FROM posts");
		return mysql_fetch_row($query)[0];		
	}
?>