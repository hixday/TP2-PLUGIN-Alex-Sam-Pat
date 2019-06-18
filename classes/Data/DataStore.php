<?php
namespace Project_manager\Data;

class DataStore
{
    public function __construct() {
        add_action('save_post_manager', [$this, "save_task_data_to_database"]);
        
    }
    /**
     * Cette fonction permet d'insérer et enregistrer la tâche en question dans la base de donnée 
     */
    public function save_task_data_to_database($post_id){

        global $wpdb;
	        
        $table_name = $wpdb->prefix . 'table_task';
        
        $result = $wpdb->insert( 
            $table_name, 
            array( 
                'ID' => $post_id,
            ) 
        );
        return $result;
    }
}