<?php
/**
 *  Puddinq Shop Info - Admin Page
 *  version 0.2
 * 
 */
class psi_page {
    public static function puddinq_shop_info_options () {

    // die if not manager
    puddinq_views::psi_cheating();
    
    // global settings form
            ?>

            <link type="text/css" href="<?php echo PSIDIR; ?>css/style.css" rel="stylesheet" />
            <div class="wrap">
            <h2>
            <?php
            $page_title = 'Puddinq admin info';
            printf( __( 'Welcome to WordPress&nbsp;%s' ), $page_title );
            ?></h2>


            <form method="post" action="options.php">
              <?php settings_fields( 'puddinq-info' ); ?>
              <?php //do_settings( 'puddinq-info' ); ?>
                <table class="form-table">
                 <tr valign="top">
                  <th scope="row">option 1</th>
                  <td><input type="text" name="option1" value="<?php echo get_option('option1'); ?>" /></td>
                 </tr>

                <tr valign="top">
                  <th scope="row">option 2</th>
                  <td><input type="text" name="option2" value="<?php echo get_option('option2'); ?>" /></td>
                </tr>

                <tr valign="top">
                  <th scope="row">option 3</th>
                  <td><input type="text" name="option3" value="<?php echo get_option('option3'); ?>" /></td>
                </tr>
               </table>
                <?php submit_button(); ?>
             </form>

                <br />
                <br />


            <?php
                // 
            ?>
                <a class="button" href="<?php echo admin_url('admin.php?page=puddinq_shop_info_new'); ?>">Shop Toevoegen</a>

                <?php puddinq_views::puddinq_shop_info_view_all()?>
            </div>
            <?php
    }
}