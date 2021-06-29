<?php

require_once ROOT.'controllers/Accuiel.php';

// cette classe herite tout de la classe  du controller Accuiel

class Logout extends Accuiel
{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    public function index()
    {
        
        
            // On détruit les variables de notre session
            session_unset ();
            // On détruit notre session
           // session_destroy ();   // à voir
            
           // $this->view('accuiel',  $data ) ;
            $this ->get_accueil_index();
       
    
    }


    public function get_accueil_index()
    {

         parent::index();  // Appel de la method index() du controller Accueil
        
     }
        
}

