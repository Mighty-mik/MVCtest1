<?php 
    
 if (!isset($_SESSION))
  {
    session_start();
  }

    require 'head.php'; 
    require 'header.php'; 

?>


        <div class="text-center">
            <h3>Espace Client</h3>

            <div>
            	
            	<?php 

            		if (!empty($data['succesMessage']))
		            {
		               echo '<p style="color: green;">'. $data['succesMessage']. '</p>';


		                  //  vérifier la session

		                  if ( $_SESSION['user_id'] ==  $data['email'] ) 
		                  {
		                  	
		                  		if (!empty( $_SESSION['pseudo'] )) 
                                {
                                   echo '<p style="color: green;">Bonjour '. $_SESSION['pseudo'] . '</p>';   
                                }

                               // echo '<p style="color: green;">Session user_id = '. $_SESSION['user_id'] . '</p>';	


		                  }

                          
		               
		            }

            	?>

            </div>

        </div>
      

<?php  require 'footer.php';  ?>        
    


