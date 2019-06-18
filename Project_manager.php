<?php

/**
 * Plugin name: Project-manager
 * Plugin URI: https:/sampatalex.com/project-manager
 * Description: Gestionnaire de projets
 * Version: 0.0.1
 * Author: Sam,Pat,Alex
 * Author URI: sampatalex.com
 */

require __DIR__ . '/vendor/autoload.php';

use Project_manager\Data\DataStore;
use Project_manager\Data\Datatable;
use Project_manager\PostType\ManagerPostType;
use Project_manager\Routes\ManagerRoutes;
use Project_manager\Metaboxes\ManagerFields;

 class TodoManager
 {

    public function __construct() 
    {
      add_action( 'init', [ $this, 'Init' ] );
      register_activation_hook( __FILE__, [ $this, 'Init_data' ] );
    }

    public function Init()
    {
        new ManagerPostType();
        new ManagerRoutes();
        new DataStore();
        new ManagerRoutes( 'project_manager/v1', 'task' );
    }

    public function Init_data()
    {
        new Datatable();
    }
    
    
 }
 
 new TodoManager();