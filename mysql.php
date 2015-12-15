<?php
	require_once("config.php");

	class SBMySQL
	{
		private $link;

		////
		// Конструктор
		// Подключение к MySQL
		public function __construct(){
			// from config.php
			global $Config;
			// Connect to MySQL
			$this->link = mysql_connect(
					$Config->getHostDB() . ":" . $Config->getPortDB(),
					$Config->getUserDB(),
					$Config->getPasswordDB()
			) or die (mysql_error ());
			// Connect to data base
			mysql_select_db(
					$Config->getNameDB(),
					$this->link
			) or die(mysql_error());
			// Setting charset
			mysql_set_charset($Config->getCharset(), $this->link);
		}

		////
		// Деструктор
		public function __destruct(){
			mysql_close($this->link);
		}

		////
		// Вспомогательная функция. Возвращает массив со всеми значениями ответа БД
		private function getArrayByQuery($query){
			$array = [];
			$i = 0;
			while($result = mysql_fetch_assoc($query)){
				$array[$i] = $result;
				$i++;
			}
			return $array;
		}

		////
		// Показывает новости
		public function getPosts($count=10, $offset=0){
			$query = mysql_query("SELECT * FROM posts ORDER BY id DESC LIMIT $count OFFSET $offset");
			return $this->getArrayByQuery($query);
		}

		////
		// Новость по ID
		public function getPostByID($id){
			$query = mysql_query("SELECT * FROM posts WHERE id='$id'");
			return mysql_fetch_assoc($query);
		}

		////
		// Поиск
		public function getPostsBySubstring($text) {
			$query = mysql_query("SELECT * FROM posts
								WHERE title LIKE '%$text%'
								OR content LIKE '%$text%'
								OR category LIKE '%$text%'
								ORDER BY id DESC");
			return $this->getArrayByQuery($query);
		}

		////
		// Показывает новости по выбранной категории
		public function getPostsByCat($category){
			$query = mysql_query("SELECT * FROM posts WHERE category='$category' ORDER BY id DESC");
			return $this->getArrayByQuery($query);
		}

		////
		// Выдает список всех категорий
		public function getCategories(){
			$query = mysql_query("SELECT DISTINCT category FROM posts ORDER BY category");
			return $this->getArrayByQuery($query);
		}

		////
		// Добавление новости
		public function PostAdd($title, $content, $category) {
			$title = mysql_escape_string($title);
			$content = mysql_escape_string($content);
			$category = mysql_escape_string($category);
			mysql_query("INSERT INTO posts (title, content, category)
						VALUES ('$title', '$content', '$category')");
		}

		////
		// Редактирование новости
		public function PostUpdate($id, $title, $content, $category) {
			mysql_query("UPDATE posts
						SET title='$title', content='$content', category='$category'
						WHERE id='$id'");
		}

		////
		// Удаление новости
		public function PostDelete($id) {
			mysql_query("DELETE FROM posts WHERE id='$id'");
		}

		////
		// Количество новостей
		public function getPostsCount() {
			$query = mysql_query("SELECT COUNT(*) FROM posts");
			return mysql_fetch_row($query)[0];
		}
	}

	// Создаем единственный экземпляр БД
	$DataBase = new SBMySQL();
?>