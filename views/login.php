<?php 
    require 'head.php'; 
    require 'header.php'; 



?>

    <!---------------
        <div class="text-center">
            <h3>Espace Client - Connexion</h3>

        </div>

    -------->

     <?php
            echo '<center>';
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

            echo '</enter>';


            ?>
            


        <div class="form-div text-center">
            <h3>Connexion</h3>
            <form  method="post" action="">
                <span>Adresse Email :</span><br>
                <input type="email" name="email" placeholder="Email" required><br>

                <span>Mot de passe :</span><br>
                <input type="password" name="password" placeholder="Mot de passe"  required><br>

                <p>
                    <input type="submit" name="submit"  value="Valider">
                </p>
            </form>
        </div>

<?php  require 'footer.php';  ?>        
    