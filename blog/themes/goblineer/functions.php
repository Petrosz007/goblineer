<?php
// Support Featured Images
add_theme_support( 'post-thumbnails' );

// Custom settings
function custom_settings_add_menu() {
    add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
    <div class="wrap">
      <h1>Custom Settings</h1>
      <form method="post" action="options.php">
         <?php
             settings_fields( 'section' );
             do_settings_sections( 'theme-options' );      
             submit_button(); 
         ?>          
      </form>
    </div>
  <?php }

// Github
function setting_github() { ?>
    <input type="text" name="github" id="github" value="<?php echo get_option( 'github' ); ?>" />
<?php }

// Twitter
function setting_twitter() { ?>
    <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

function custom_settings_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
    add_settings_field( 'github', 'Github URL', 'setting_github', 'theme-options', 'section' );
    add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
  
    register_setting('section', 'github');
    register_setting('section', 'twitter');
}
add_action( 'admin_init', 'custom_settings_page_setup' );