<?php

class Espaceclient extends Controller
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

            $data = array();

            
            $this->view('espaceclient',  $data ) ;
        
       
    
    }
        
}

