<?php
add_menu_page(
    'Standalone Block Editor',         // Visible page name
    'Block Editor',                    // Menu label
    'edit_posts',                      // Required capability
    'getdavesbe',                      // Hook/slug of page
    'getdave_sbe_render_block_editor', // Function to render the page
    'dashicons-welcome-widgets-menus'  // Custom icon
);

function getdave_sbe_render_block_editor() {
    ?>
    <div
        id="getdave-sbe-block-editor"
        class="getdave-sbe-block-editor"
    >
        Loading Editor...
    </div>
    <?php
}

function getdave_sbe_block_editor_init( $hook ) {

    // Exit if not the correct page.
    if ( 'toplevel_page_getdavesbe' !== $hook ) {
        return;
    }
}

add_action( 'admin_enqueue_scripts', 'getdave_sbe_block_editor_init' );

wp_enqueue_script( $script_handle, $script_url, $script_asset['dependencies'], $script_asset['version'] );

// Enqueue default editor styles.
wp_enqueue_style( 'wp-format-library' );

// Enqueue custom styles.
wp_enqueue_style(
    'getdave-sbe-styles',                       // Handle
    plugins_url( 'build/index.css', __FILE__ ), // Block editor CSS
    array( 'wp-edit-blocks' ),                  // Dependency to include the CSS after it
    filemtime( __DIR__ . '/build/index.css' )
);


// Get custom editor settings.
$settings = getdave_sbe_get_block_editor_settings();

// Inline all settings.
wp_add_inline_script( $script_handle, 'window.getdaveSbeSettings = ' . wp_json_encode( $settings ) . ';' );