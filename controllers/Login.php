<?php

require_once ROOT.'models/User.php';

class Login extends Controller
{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */

  //*****************************************
   
    public function index()
    {              

          //  $data = array();
            
          //  $this->view('login',  $data ) ;

  

  //*******************************************

   //*******************************************
        $errorMessage = "";
        $succesMessage = "";
        $email = "";
        $view = "login";

        if (isset($_POST['submit']))        
        {
            
           // $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password']; 
           
            date_default_timezone_set('Europe/Paris');
            $date = date('d/m/Y à H:i:s');

            if ( (!empty($email)) && (!empty($password) ) )  
            {
                   
                 $succesMessage = "Email and pasword Not empty"; 
                    
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                       // $succesMessage = "Email filtered Ok"; 

                             $Mo = new User();
                             
                            if (isset( $Mo )  ) 
                            {
                              // $succesMessage = "Mo isset ok<br />";

                                  if ( !$Mo -> login($email, $password) ) // si ok method login
                                  {
                                       $succesMessage = "Vous êtes connecté.";                                                        
                                     $view = "espaceclient"; 
                                  }
                                  else
                                  {
                                        
                                         $errorMessage = "L'mail ou le mot de passe n'est pas correct ";
                                         $view = "login";
                                  }


                                                                  

                            }
                            else
                            {
                                 //$errorMessage = 'Erreur de la Method login '; 
                                 //$errorMessage = 'Aucune connexion à la Bdd ';
                                 $view = "login";
                            }    
                             
                        
                        
                    }
                    else 
                    {
                        $errorMessage = "Votre email n'est pas valide...";
                        $email = "";
                        $view = "login";
                    }
                
            }
            else
            {
                 $errorMessage = "Email and pasword are empty"; 
            }

        }

             //***************************************************

                $data = array(
                    'errorMessage'=> $errorMessage,
                    'succesMessage'=> $succesMessage,
                     'email' =>  $email                   
                );

                
                $this->view( $view,  $data ) ;
      
    }            

   //*******************************************
        
}

