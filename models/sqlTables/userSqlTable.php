<?php 


/**
 * 
 */
class UserSqlTable 
{
	
	
	function __construct()
	{
		# code...
		 //parent::__construct();  // call parent constructor for d connect
		// parent::__construct();	
		 $this->createUserTable(); // create user table
	}
    
    public function createUserTable()
    {
   		//**********************************************
		
    	$servername = "localhost:3308";
		$username = 'mvc';
		$password = 'mvc';
		$dbname = 'mvc';

		

		// sql to create table
		  $sql = "CREATE TABLE IF NOT EXISTS users (
		  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		  pseudo VARCHAR(30) NOT NULL,
		  firstname VARCHAR(30) DEFAULT '',
		  lastname VARCHAR(30) DEFAULT '',
		  email VARCHAR(50) NOT NULL,
		  userpass varchar(255)  NOT NULL DEFAULT '',
		  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		  )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1  COLLATE=utf8mb4_general_ci";

		try 
		{
		  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		  // set the PDO error mode to exception
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  

		  // use exec() because no results are returned
		  $conn->exec($sql);
		 // echo "Table MyGuests created successfully";
		} 
		catch(PDOException $e) 
		{
		 // echo $sql . "<br>" . $e->getMessage();
		}

		$conn = null;


		//**********************************************   
    }


   //****************************************************


}