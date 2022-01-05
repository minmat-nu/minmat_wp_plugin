<?php


function minmat_plugin_menu() {
       add_menu_page( 'MinMat', 'MinMat.nu', 'manage_options', 'minmat-options', 'minmat_options', 3);
    }


    function minmat_options() {
              if ( !current_user_can( 'manage_options' ) )  {
                        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
                }
              echo '<div class="wrap">';
              echo '<p>Here is where the form would go if I actually had options.</p>';
              echo '</div>';
        }
 ?>
