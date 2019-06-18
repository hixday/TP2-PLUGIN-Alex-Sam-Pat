<?php
namespace Project_manager\PostType;

class ManagerPostType
{
    public function __construct(  )
    {
        $this->create_manager_post_type();
    }
/**
 * Cette fonction permet de créer tout les libelés dans le plugin de wordpress
 */
    public function create_manager_post_type(  )
    {
        $labels = array(
            'name'                => _x( 'Task', 'Post Type General Name', 'manager'),
            'singular_name'       => _x( 'Task', 'Post Type Singular Name', 'manager'),
            'menu_name'           => __( 'Task', 'manager'),
            'all_tasks'           => __( 'All Tasks', 'manager'),
            'view_task'           => __( 'View all tasks', 'manager'),
            'add_new_task'        => __( 'Add new task', 'manager'),
            'add_new'             => __( 'Add', 'manager'),
            'edit_task'           => __( 'Edit', 'manager'),
            'update_task'         => __( 'Modify', 'manager'),
            'search_tasks'        => __( 'Search', 'manager'),
            'not_found'           => __( 'Not found', 'manager'),
            'not_found_in_trash'  => __( 'Not found in the trash', 'manager'),
        );

        $args = array(
            'label'               => __( 'Task', 'manager'),
            'description'         => __( 'Task list', 'manager'),
            'labels'              => $labels,
            'supports'            => array( 'title' ),
            'show_in_rest'        => true,
            'hierarchical'        => false,
            'public'              => true,
            'has_archive'         => true,
            'rewrite'			  => array( 'slug' => 'manager-post'),

        );
        /**
         * Défini le post type
         */
        register_post_type( 'manager', $args );
    }
}