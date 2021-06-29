
   <body>
 
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
         <!-- Brand -->
         <a class="navbar-brand" href="<?php echo ROOTURL; ?>">o7planning</a>
 
         <!-- Toggler/collapsibe Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
         </button>
 
         <!-- Navbar links -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
             
             <?php 
                   // vérifie la session
                   if ( !empty($_SESSION['user_id']) &&  !empty($data['email'])  && $_SESSION['user_id'] ==  $data['email'] ) 
                   {
                           
                     // echo '<p style="color: green;">Session user_id = '. $_SESSION['user_id'] . '</p>';                           

                 

             ?>  
                        <li class="nav-item">
                           <a class="btn btn-primary m-1" href="logout" role="button">D&eacute;connexion</a>
                        </li>
                        

               <?php 

                   }
                   else
                   {
               ?>
                        <li class="nav-item">
                           <a class="btn btn-primary m-1" href="login" role="button">Se connecter</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-primary m-1" href="register" role="button">S'inscrire</a>
                        </li>
               <?php                

                   }  

               ?>


            </ul>
         </div>
      </nav>
 
      