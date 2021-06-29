<?php
/*
session_start();
include 'app/Model.php';

if (isset($_POST['submit'])){
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password_confirm = sha1($_POST['password_confirm']); 
    date_default_timezone_set('Europe/Paris');
    $date = date('d/m/Y à H:i:s');

    if ((!empty($pseudo)) && (!empty($email)) && (!empty($password_confirm)) && (!empty($password))) {
        if (strlen($pseudo) <= 16) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($password == $password_confirm) {
                    
                    $database = getPDO();
                    $rowEmail = countDatabaseValue($database, 'user_email', $email);
                    if ($rowEmail == 0) {

                    } else {
                        $errorMessage = 'Cette email est utilisée..';
                    }
                } else {
                    $errorMessage = 'Les mots de passes ne correspondent pas...';
                }
            }else {
                $errorMessage = "Votre email n'est pas valide...";
            }
        } else {
            $errorMessage = 'Le pseudo est trop long...';
        }
    } 

}

*/
?>
<?php 
    require 'head.php'; 
    require 'header.php'; 

?>


      <!-------------------------------------------
        <div class="text-center">
            <h3>Espace Client - Inscription</h3>
        </div>

      --------------------------------------------->  
      
        <div class="form-div text-center">
            <h3>Inscription</h3>

            <?php

                if (!empty($data['errorMessage']))
                {
                    echo '<p style="color: red;">'. $data['errorMessage']. '</p>';
                }
                else
                {
                   // echo "errorMessage is empty";
                }

                if (!empty($data['succesMessage']))
                {
                    echo '<p style="color: green;">'. $data['succesMessage']. '</p>';
                }
                else
                {
                   // echo "succesMessage is empty";
                }




            ?>
            


            <form method="post" action="">
                
                <span>Pseudo :</span><br>
                <input type="text" name="pseudo" placeholder="Pseudo"><br>

                <span>Adresse Email :</span><br>
                <input type="email" name="email" placeholder="Email"><br>

                <span>Mot de passe :</span><br>
                <input type="password" name="password" placeholder="Mot de passe"><br>

                <span>Confirmation Mot de passe :</span><br>
                <input type="password" name="password_confirm" placeholder="Confirmation Mot de passe"><br><br>

                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    
    <?php  require 'footer.php';  ?>