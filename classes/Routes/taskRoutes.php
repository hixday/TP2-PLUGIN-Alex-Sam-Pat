<?php
namespace Project_manager\Routes;
use Project_manager\Data\DataStore;

class TaskRoutes
{
    private $data;
    /**
     * TaskRoutes constructor.
     */
    public function __construct()
    {
        $this->create_task_routes();
        $this->data = new DataStore();
    }


    /**
     * Fonction de creation des routes qui nous mène à des fonctions précises de l'api
     */
    public function create_task_routes()
    {
        /**
         * Cette route retourne la tâche de l'id précisé
         */
        register_rest_route('project_manager/v1', '/manager/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => [$this,"get_task_with_id"],
        ));


        /**
         * Cette route retourne toutes les tâches
         */
        register_rest_route('project_manager/v1', '/manager', array(
            'methods' => 'GET',
            'callback' => [$this,"get_all_tasks"],
        ));


        /**
         * Cette route permet de créer une nouvelle tâche
         */
        register_rest_route('project_manager/v1', '/manager', array(
            'methods' => 'POST',
            'callback' => [$this,"create_task"],
        ));


        /**
         * Cette route nous permet de modifier les champs de la tâche choisie par l'utilisateur
         */
        register_rest_route('project_manager/v1', '/manager/(?P<id>\d+)', array(
            'methods' => 'PUT',
            'callback' => [$this,"update_task"],
        ));


        /**
         * Cette route nous permet de supprimé la tâche choisie
         */
        register_rest_route('project_manager/v1', '/manager/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => [$this,"delete_task"],
        ));
    }

    /**
     * Cette fonction appelle toutes les tâches
     */
    public function get_all_tasks()
    {
        $args = array(
            'post_type'	 => 'manager',
            'post_status'	 => 'publish',
            'posts_per_page' => -1
        );
        $query = new \WP_Query( $args );
        var_dump($query->posts);
        die;
        return rest_ensure_response($query->posts);
    }


    /**
     * Cette fonction supprime la tâche selecitonnée
     */
    public function delete_task($request){  
        wp_trash_post($request['id'], $force = true);
    }


    /**
     * Cette fonction appelle la tâche selectionnée
     */
    public function get_task_with_id($request)
    {
        $param = $request->get_param('id');
        
        $args = array(
            'p'          => $param,
        );
        $query = new \WP_Query( $args );

        return rest_ensure_response($query->posts);
    }


    /**
     * Cette fonction permet à l'utilisateur de créer une tâche
     */
    public function create_task()
    { 
        global $wpdb;
        $table_name = $wpdb->prefix . 'table_task';


        $post_id = wp_insert_post( [
            'ID' => "1",
            'post_type' => "manager",
            'post_title' => "Test de titre modif95858584",
            'post_status'	 => 'publish'
        ] );

        $args = $this->data->save_task_data_to_database($post_id);
        return rest_ensure_response(json_encode($args));
       
    }

    
    /**
     * Cette fonction permet à l'utilisateur de modifier une tâche
     */
    public function update_task()
    { 
        $args = [
            'post_title' => "Test de titre modif",
            'post_status'	 => 'draft'
        ];
        wp_insert_post( $args );
        return rest_ensure_response(json_encode($args));
    }
    
}