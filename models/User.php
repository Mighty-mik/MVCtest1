

<?php



class User  
{
	private $pdo;
	
	public function __construct() 
	{
		
		
	     
			try {

					$host     = DBHOST;
					$user     = DBUSER;
					$pass     = DBPASSWORD;
					$database = DBNAME;

					//Custom PDO options.
					$options = array(
						PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_EMULATE_PREPARES => false
					);

					//Connect to MySQL and instantiate our PDO object.
					$this->pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
					$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
					$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

					
			}
			 catch (PDOException $e) 
			 {
				echo 'Connexion impossible';
			}

		
	}

	//***********************************************************************************

	function register($pseudo, $email, $userpass) 
	{
				

		//******* Vérification si l'email existe déjà  dans bdd *******
			// https://www.mitrajit.com/php-login-pdo-connection/
			try 
			{
		      $query = "select * from `users` where `email`=:email";
		      $stmt = $this->pdo->prepare($query);
		      $stmt->bindParam('email', $email, PDO::PARAM_STR);
		      
		      $stmt->execute();
		      $count = $stmt->rowCount();
		      $row   = $stmt->fetch(PDO::FETCH_ASSOC);

		      // print_r($row);
		      // echo "<br />";
		      //  echo "shal password : " . sha1($password) . "<br />";
		      // echo "row userpass : " . $row['userpass'];
		      // echo "email : " . $row['email'];
		      //  echo "row email : " . $row['email'];
		      // if($count == 1 && !empty($row)) 

		      if( $email != $row['email'] ) // register 
		      {
		        /******************** Your code ***********************/
		       
		        	//********************************************************************

						// Requête mysql pour insérer des données
						$sqlInsert = "INSERT INTO `users`(`pseudo`, `email`, `userpass`) VALUES (:pseudo,:email,:userpass)";
						$res       = $this->pdo->prepare($sqlInsert);
						$exec      = $res->execute(array(":pseudo" => $pseudo, ":email" => $email, ":userpass" => $userpass));
						// vérifier si la requête d'insertion a réussi
						if ($exec) 
						{
							echo 'Données insérées';
							// on la démarre la session
							session_start();

							$_SESSION['user_id'] = $email;
							$_SESSION['pseudo'] = $pseudo;
						} 
						else 
						{
							echo "Échec de l'opération d'insertion";
						}
				        
							
		        //*****************************************************
		       
		      } 
		      else 
		      {
		        $msg = "Invalid Email and password!";
		      }
		    } 
		    catch (PDOException $e) 
		    {
		      echo "Error : ".$e->getMessage();
		    }

		//****************************************************************************


/*
				//********************************************************************

				// Requête mysql pour insérer des données
				$sqlInsert = "INSERT INTO `users`(`pseudo`, `email`, `userpass`) VALUES (:pseudo,:email,:userpass)";
				$res       = $this->pdo->prepare($sqlInsert);
				$exec      = $res->execute(array(":pseudo" => $pseudo, ":email" => $email, ":userpass" => $userpass));
				// vérifier si la requête d'insertion a réussi
				if ($exec) 
				{
					echo 'Données insérées';
					// on la démarre la session
					session_start();

					$_SESSION['user_id'] = $email;
				} 
				else 
				{
					echo "Échec de l'opération d'insertion";
				}
*/
		//*******************************************************************

		//********************************************************************
	}

	//*************************************************************************************
	public function login($email, $password) 
	{


		//*****************************************************************************
			// https://www.mitrajit.com/php-login-pdo-connection/
			try 
			{
		      $query = "select * from `users` where `email`=:email and `userpass`=:userpass";
		      $stmt = $this->pdo->prepare($query);
		      $stmt->bindParam('email', $email, PDO::PARAM_STR);
		      $stmt->bindValue('userpass', sha1($password), PDO::PARAM_STR);
		      $stmt->execute();
		      $count = $stmt->rowCount();
		      $row   = $stmt->fetch(PDO::FETCH_ASSOC);

		      // print_r($row);
		      // echo "<br />";
		      //  echo "shal password : " . sha1($password) . "<br />";
		      // echo "row userpass : " . $row['userpass'];
		      // echo "email : " . $row['email'];
		      //  echo "row email : " . $row['email'];
		      // if($count == 1 && !empty($row)) 

		      if( sha1($password) == $row['userpass'] && $email == $row['email'] )
		      {
		        /******************** Your code ***********************/
		       

		        // $succesMessage = "<br />Vous êtes connecté<br />";

		        // echo $succesMessage;
		        //*****************************************************
		        		session_start();

						$_SESSION['user_id'] = $email;
						$_SESSION['pseudo'] = $row['pseudo'];

					
		        //*****************************************************
		       
		      } 
		      else 
		      {
		        $msg = "Invalid Email and password!";
		      }
		    } 
		    catch (PDOException $e) 
		    {
		      echo "Error : ".$e->getMessage();
		    }

		//****************************************************************************

	}

	//Find user by email. Email is passed in by the Controller.
	public function findUserByEmail($email) 
	{
		//Prepared statement
		$this->pdo->query('SELECT * FROM users WHERE email = :email');

		//Email param will be binded with the email variable
		$this->pdo->bind(':email', $email);

		//Check if email is already registered
		if ($this->pdo->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}


	//********************************************************************

	//**********************************************************************

}
