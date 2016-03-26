<?php //it will connect to the database ?>
<?php
	class Database
	{
		public $host;
		public $user;
		public $password;
		public $database;
		public $connection;
		function __construct()
		{
			switch($_SERVER['HTTP_HOST'])
			{
				case "localhost:7777":  //for windows
					$this->host="localhost";
					$this->user="root";
					$this->password="";
					$this->database="srmadt";
				break;
				case "localhost:8000":  //for youc PC change the port accordingly
					$this->host="localhost";
					$this->user="root";
					$this->password="root";
					$this->database="srmadt";
				break;
			}
		}

		//function to connect to database	
		function connect()
		{
			$this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database) or die("Server problem" . mysqli_error());
			//mysql_select_db() or die(mysql_error());
		}

		//function to insert data in database
		function makequery($insertQuery)
		{
			return mysqli_query($this->connection,$insertQuery);
		}
		

		// //function to select data from database
		// function selectData($selectQuery)
		// {
		// 	return mysqli_query($this->connection,$selectQuery);
		// }
		//function to disconnect the current connection from database
		function disconnect()
		{
			mysqli_close($this->connection);
		}
	}	 
?>
