<?php
namespace Project_manager\Routes;

/**
 * Cette classe permet d'initialisé et d'instancier la classe TaskRoutes.Ceci permet a l'api de répondre
 * aux requetes demandées par l'entremise de nos fonctions
 */
class ManagerRoutes 
{
    public function __construct() {
        add_action("rest_api_init", [$this,"Manager_routes"]); 
    }
    /**
     * Fonction d'instanciation de taskRoutes
     */
    public function Manager_routes(){
        new TaskRoutes();
    }

}