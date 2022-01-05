<?php


function minmat_plugin_menu() {
       add_menu_page( 'MinMat', 'MinMat.nu', 'manage_options', 'minmat-options', 'minmat_options', 3);
       add_submenu_page( 'minmat-options' , 'Editera Databas', 'Editera Databas', 'manage_options', 'submenu', 'minmat_edit_database');
    }


    function minmat_options() {
        echo "<h3> MinMat.nu</h3>";
              if ( !current_user_can( 'manage_options' ) )  {
                        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
                }
              echo '<div class="wrap">';
              echo '<p>Here is where the form would go if I actually had options.</p>';
              echo '</div>';
        }

    function minmat_edit_database() {
        echo "<h3> Editera Databas</h3>";
        if ( !current_user_can( 'manage_options' ) )  {
                  wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
          }
        echo '<div class="wrap">';
        echo '<p>Here is where the form would go if I actually had options.</p>';
        echo '</div>';
    }

 ?>
