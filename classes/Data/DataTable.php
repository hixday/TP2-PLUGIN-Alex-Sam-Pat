<?php
namespace Project_manager\Data;

class DataTable
{
  public function __construct(){
    $this->database_init();
  }
/**
 * Créer et initialise la nouvelle table personnalisée
 */
    public function database_init(){

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "table_task` (
          ID bigint(9) NOT NULL AUTO_INCREMENT,
          PRIMARY KEY  (ID)

        ) $charset_collate;";
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

}