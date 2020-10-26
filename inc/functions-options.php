<?php
//add code in header
if (!empty(get_option('add-in-header-01', true))) {
add_action('wp_head', 'add_code_in_header');
function add_code_in_header() {
    echo get_option('add-in-header-01', true);
}
}

//add code in footer
if (!empty(get_option('add-in-footer-01', true))) {
add_action('wp_footer', 'add_code_in_footer');
function add_code_in_footer() {
    echo get_option('add-in-footer-01', true);
}
}


//add code after body tag
if (!empty(get_option('add-after-body-tag-01', true))) {
add_action('wp_body_open', 'add_code_on_body_open');
function add_code_on_body_open() {
    echo get_option('add-after-body-tag-01', true);
}
}

if (get_option('logo-support-01', true) == 1) {
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );
} else {
    remove_theme_support( 'custom-logo' );
};

?>