<?php
function minmat_create_db() {
    add_option( "minmat_db_version", "1.0" );
    // WP Globals
    global $table_prefix, $wpdb;
    $minmat_pluginname = minmat_;

    // Customer Table
    $customerTable = $table_prefix . $minmat_pluginname . 'ingredienser';
    // Create Customer Table if not exist
    if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {
        $charset_collate = $wpdb->get_charset_collate();
        // Query - Create Table
        $sql = "CREATE TABLE $customerTable (
             `id` int(10) NOT NULL auto_increment,
             `family` int(10) ,
             `name` varchar(15) ,
             `density` float(10) ,
             PRIMARY KEY (`ID`)
        ) $charset_collate;";

        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        // Create Table
        dbDelta( $sql );
    }
    $customerTable = $table_prefix . $minmat_pluginname . 'matratter';

    if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {

        // Query - Create Table
        $sql = "CREATE TABLE `$customerTable` (";
        $sql .= " `ID` int(10) NOT NULL auto_increment, ";
        $sql .= " `name` TEXT(255) , ";
        $sql .= " `author` int(10) , ";
        $sql .= " `description` TEXT(200) , ";
        $sql .= " `instructions` TEXT(200) , "; //TODO Instructions cannot only be 200 Byte large. (200 Characters)
        $sql .= " PRIMARY KEY (`ID`)";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

        // Include Upgrade Script
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        // Create Table
        dbDelta( $sql );
    }
    $customerTable = $table_prefix . $minmat_pluginname . 'matratter_ingredienser';

    if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {

        // Query - Create Table
        $sql = "CREATE TABLE `$customerTable` (";
        $sql .= " `mat_id` int(10) NOT NULL , ";
        $sql .= " `ingrediens_id` INT(10) , ";
        $sql .= " `value` int(10) , ";
        $sql .= " `unit` tinyint(2) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

        // Include Upgrade Script
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        // Create Table
        dbDelta( $sql );

    }

    $customerTable = $table_prefix . $minmat_pluginname . 'users_matratter';

    if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {

        // Query - Create Table
        $sql = "CREATE TABLE `$customerTable` (";
        $sql .= " `user_id` int(10) NOT NULL , ";
        $sql .= " `matratt_id` INT(10) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

        // Include Upgrade Script
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        // Create Table
        dbDelta( $sql );

    }

}

function minmat_remove_db() {
    global $wpdb;
        $table_name = $wpdb->prefix . 'mionmat_matratter';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
        $table_name = $wpdb->prefix . 'mionmat_ingredienser';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
        $table_name = $wpdb->prefix . 'mionmat_matratter_ingredienser';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
        //delete_option("my_plugin_db_version");

}



 ?>
