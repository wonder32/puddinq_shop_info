<?php
/**
 * @package Puddinq Admin Info Functions
 * @version 0.1
 * 
 */

/**
 * Options admin page
 */

function puddinq_admin_info_view_all() {
    // make database connection available for function
    global $wpdb;
    // get all rows from database
    $query = " SELECT * FROM wp_pai";
    // check if it worked
    if($wpdb->query($query) === FALSE) {
        $wpdb->show_errors();
	$wpdb->print_error(); 
    } else {
        $results = $wpdb->get_results($query);
    }
    // loop true the results
    echo "<table class='wp-list-table widefat fixed'>";
    echo '<tr><th>Voornaam</th><th>Achternaam</th><th>Tekst</th><th>URL</th><th>Bewerk</th></tr>';
    foreach ( $results as $contact ) {
        echo '<tr>';
        echo '<td>' . $contact->fname . '</td>';
        echo '<td>' . $contact->lname . '</td>';
        echo '<td>' . $contact->text . '</td>';
        echo "<td><a href='" . $contact->url . "'>weblink</a></td>";
        echo "<td><a href='".admin_url('admin.php?page=puddinq_admin_info_bewerk&id='.$contact->id)."'>Update</a></td>";
        echo '</tr>';
    }
    echo '</table>';    
}

function pai_cheating() {
    
        // die if not welcome
    if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'Cheatin&#8217; uh?' ) );
    }
    
}