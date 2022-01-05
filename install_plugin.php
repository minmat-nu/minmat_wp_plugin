<?php
function minmat_create_db($minmat_pluginname) {
    add_option( "minmat_db_version", "1.0" );
    // WP Globals
    global $table_prefix, $wpdb;

    // Customer Table
    $customerTable = $table_prefix . $minmat_pluginname . 'ingredienser';
    // Create Customer Table if not exist
    if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {
        $charset_collate = $wpdb->get_charset_collate();
        // Query - Create Table
        $sql = "CREATE TABLE $customerTable (
             `ID` int(10) NOT NULL auto_increment,
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
        $sql .= " `author_id` int(10) , ";
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
        $sql .= " `mat_ID` int(10) NOT NULL , ";
        $sql .= " `ingrediens_id` INT(10) , ";
        $sql .= " `value` int(10) , ";
        $sql .= " `unit_id` tinyint(2) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

        // Include Upgrade Scriptw
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
    $customerTable = $table_prefix . $minmat_pluginname . 'units';

    if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {

        // Query - Create Table
        $sql = "CREATE TABLE `$customerTable` (
            `unit_id` int(10) NOT NULL auto_increment,
            `unit_name` varchar(10),
            `parent_id` int(10),
            `convert_to_parent` float(10),
            PRIMARY KEY (`unit_id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

        // Include Upgrade Script
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        // Create Table
        dbDelta( $sql );

    }

    //array with measurements,first
    $units = ['Liter'=>['',''],'deciliter'=>['1','0.1'],'centliter'=>['1','0.01'], 'milliliter'=>['1', '0.001']];

        foreach($units as $key => $values){
            $string = array ('unit_id' => (int) $id, 'unit_name'=> $key, 'parent_id'=>(int)$values[0], 'convert_to_parent'=>(float) $values[1]);
            $wpdb->insert( $customerTable, $string);
        }

}


function minmat_remove_db($minmat_pluginname) {
    global $table_prefix, $wpdb;

    $database_name = ['matratter', 'ingredienser', 'units', 'users_matratter','matratter_ingredienser'];
    foreach($database_name as $key){
        $customerTable = $table_prefix . $minmat_pluginname . $key;
        $sql = "DROP TABLE IF EXISTS $customerTable";
        $wpdb->query($sql);
    }
        delete_option("minmat_db_version");

}



 ?>
