<?php
	// Берем данные из конфига
	class SPConfig
	{
		private $ini_array;

		private $userDB;
		private $passwordDB;
		private $nameDB;
		private $hostDB;
		private $portDB;
		private $charset;

		public function __construct(){
			$this->ini_array = parse_ini_file("config.cfg");

			$this->userDB 		= $this->ini_array['user'];
			$this->passwordDB 	= $this->ini_array['password'];
			$this->nameDB		= $this->ini_array['db'];
			$this->hostDB		= $this->ini_array['host'];
			$this->portDB		= $this->ini_array['port'];
			$this->charset		= $this->ini_array['charset'];
		}

		public function getUserDB()
		{
			return $this->userDB;
		}

		public function getPasswordDB()
		{
			return $this->passwordDB;
		}

		public function getNameDB()
		{
			return $this->nameDB;
		}

		public function getHostDB()
		{
			return $this->hostDB;
		}

		public function getPortDB()
		{
			return $this->portDB;
		}

		public function getCharset()
		{
			return $this->charset;
		}
	}

	$Config = new SPConfig();
?>