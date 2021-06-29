<?php

class Accuiel extends Controller
{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    public function index()
    {
        
       /* echo  file_get_contents (ROOT.'views/head.php');
        echo  file_get_contents (ROOT.'views/header.php');
        echo  file_get_contents (ROOT.'views/contenu.php');
        echo  file_get_contents (ROOT.'views/footer.php');

        */

            $data = array(
         //'head' =>   ROOT.'views/parts/head.php',
         //'header' =>   ROOT.'views/parts/header.php',
         'contenu' =>   ROOT.'views/contenu.php',         
         //'footer' =>  ROOT.'views/parts/footer.php'
        );

            
            $this->view('accuiel',  $data ) ;
        
       
    
    }
        
}

