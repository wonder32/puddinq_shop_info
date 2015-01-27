<?php
/**
 * @package Puddinq Admin Info Install
 * @version 0.1
 */

    /**********************************************
     *          INSTALL CLASS
     *          - CREATE TABLE
     *              - REGISTER psi_db_version
     *          - FILL TABLE
     *          - REGISTER WORDPRESS OPTIONS
     *          - UNINSTALL
     *              - DROP TABLE
     *              - UNREGISTER WORDPRESS OPTIONS
     *              - UNREGISTER psi_db_version
     **********************************************/

class puddinq_shop_install {

     /**********************************************
     *          CREATE TABLE
     **********************************************/
    

    public static function puddinq_shop_info_install(){
        puddinq_views::psi_cheating();
            global $wpdb;
            global $psi_db_version; 

            $pai_db_version = '0.1';
            $table_name = $wpdb->prefix . "psi";

            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
              time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
              fname tinytext NOT NULL,
              lname tinytext NOT NULL,
              text text NOT NULL,
              url varchar(55) DEFAULT '' NOT NULL,
              UNIQUE KEY id (id)
            ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );

            add_option( 'pai_db_version', $pai_db_version );
    }
    /**********************************************
     *          FILL TABLE
     **********************************************/

        public static function puddinq_shop_info_install_data(){
                $psi_fname = 'Stefan';
                $psi_lname = 'Schotvanger';
                $psi_text = 'Owner';
                $psi_url = 'www.puddinq.mobi/wip/profiel/';

                global $wpdb;
                $table_name = $wpdb->prefix . "psi";

                $wpdb->insert( 
                        $table_name, 
                        array( 
                                'time' => current_time( 'mysql' ), 
                                'fname' => $psi_fname,
                                'lname' => $psi_lname,
                                'text' => $psi_text,
                                'url'  => $psi_url,
                        ) 
                );

        }

    /**********************************************
     *          PLUGIN SETTINGS IN WORDPRESS TABLE (unused)
     **********************************************/

        public static function register_puddinq_shop_info_settings() {
                //register our settings
                register_setting( 'puddinq-info', 'option1' );
                register_setting( 'puddinq-info', 'option2' );
                register_setting( 'puddinq-info', 'option3' );
        }



    /**********************************************
     *          UNINSTALL
     **********************************************/

        public static function puddinq_shop_info_uninstall() {

            global $wpdb;
            $table = $wpdb->prefix."psi";

            //Delete any options thats stored
            delete_option('psi_db_version');
            delete_option('option1');
            delete_option('option2');
            delete_option('option3');

            $wpdb->query("DROP TABLE IF EXISTS $table");
        }
}