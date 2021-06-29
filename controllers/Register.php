<?php

//require_once ROOT.'models/Registration.php';

 require_once ROOT.'models/User.php';


 // cette classe herite du Model

class Register extends Controller
{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    public function index()
    {
       
       //****************************************************

       // session_start();
      //  include 'app/Model.php';
        $errorMessage = "";
        $succesMessage = "";
        $email = "";
        $view = "register";

        if (isset($_POST['submit']))        
        {
            
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = sha1($_POST['password']); 
            $password_confirm = sha1($_POST['password_confirm']); 
            date_default_timezone_set('Europe/Paris');
            $date = date('d/m/Y à H:i:s');

            if ((!empty($pseudo)) && (!empty($email)) && (!empty($password_confirm)) && (!empty($password))) 
            {
                if (strlen($pseudo) <= 16) 
                {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                        if ($password == $password_confirm) 
                        {
                            
                           
                            //*** insertion dabns la table sql
                            $user_login = $pseudo;
                            $firstname = "";
                            $lastname = "";
                            $user_email = $email;
                            $user_pass = $password;
                          


                            $data = [
                                    'pseudo' => $user_login,
                                    'email' =>  $email,
                                    'user_pass' => $password
                            ];


                         
                          

                           // ... instance de la classe user
                             $Mo = new User();
                             
                            if (isset( $Mo )  ) 
                            {
                               
                               //  $succesMessage = "Class Registration()   OK "; 

                                  $Mo ->  register($user_login, $email, $password ); 
                                                                     
                                    // $succesMessage = "Method register()   OK "; 

                                $succesMessage = "Votre inscription s'est bien passée, vous êtes connecté."; 

                                 
                                     $view = "espaceclient";                                

                            }
                            else
                            {
                                // $errorMessage = 'Aucune Isertion dans Bdd ';
                                 $view = "register";
                            }    
                             

                        } 
                        else 
                        {
                            $errorMessage = 'Les mots de passes ne correspondent pas...';
                            $view = "register";
                        }
                    }
                    else 
                    {
                        $errorMessage = "Votre email n'est pas valide...";
                        $email = "";
                        $view = "register";
                    }
                } 
                else 
                {
                    $errorMessage = 'Le pseudo est trop long...';
                    $view = "register";
                }
            } 

                
        }

        
        


            //***************************************************

                $data = array(
                    'errorMessage'=> $errorMessage,
                    'succesMessage'=> $succesMessage,
                    'email' => $email
                );

                
                $this->view( $view,  $data ) ;
        
            
       
    
    }


        
}

