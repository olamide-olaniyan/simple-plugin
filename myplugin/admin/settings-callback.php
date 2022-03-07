<?php   // MyPlugin - Settings callbacks 

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// callback: login section
function myplugin_callback_setion_login() {
    echo '<p>'. esc_html__('This sections enables you to customize the WP Login Area.', 'myplugin') .'</p>';
}

// callback: admin section
function myplugin_callback_setion_admin() {
    echo '<p>'. esc_html__('This sections enables you to customize the WP Admin Area.', 'myplugin') .'</p>';
}

// callback: text field
function myplugin_callback_field_text($args) {

    $options = get_option('myplugin_options', myplugin_options_defaults() );

    $id = isset( $args['id'] ) ? $args['id'] : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $value = isset ($options[$id]) ? sanitize_text_field( $options[$id] ) : '';

    echo '<input id="myplugin_options_'. $id .'" name="myplugin_options[' . $id .']" 
    type="text" size="40" value="'. $value .'"><br>';
    echo '<label for="myplugin_options_'. $id .'">'. $label . '</label>';
}

// callback: radio field
function myplugin_callback_field_radio($args) {

    $options = get_option('myplugin_options', myplugin_options_defaults() );

    $id = isset( $args['id'] ) ? $args['id'] : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $selected_options = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    $radio_options = array(
        'enable' => esc_html__('Enable custom styles', 'myplugin'),
        'disable' => esc_html__('Disable custom styles', 'myplugin')
    );

    foreach ($radio_options as $value => $label) {
        $checked = checked( $selected_options === $value, true, false );

        echo '<label><input name="myplugin_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'>';
        echo '<span>'. $label . '</span></label><br>';
    }

    
}

// callback: textarea field
function myplugin_callback_field_textarea($args) {

    $options = get_option('myplugin_options', myplugin_options_defaults() );

    $id = isset( $args['id'] ) ? $args['id'] : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $allowed_tags = wp_kses_allowed_html( 'post' );

    $value = isset ($options[$id]) ? wp_kses( stripslashes( $options[$id] ), $allowed_tags) : '';

    echo '<textarea id="myplugin_options_'. $id .'" name="myplugin_options[' . $id .']" 
    rows="5" cols="50">'. $value .'</textarea><br>';
    echo '<label for="myplugin_options_'. $id .'">'. $label . '</label>';
}

// callback: checkbox field
function myplugin_callback_field_checkbox($args) {

    $options = get_option('myplugin_options', myplugin_options_defaults() );

    $id = isset( $args['id'] ) ? $args['id'] : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

    echo '<input id="myplugin_options_'. $id .'" name="myplugin_options[' . $id .']" 
    type="checkbox" value="1"'. $checked .'>';
    echo '<label for="myplugin_options_'. $id .'">'. $label . '</label>';
}

// callback: Select Menu
function myplugin_callback_field_select($args) {

    $options = get_option('myplugin_options', myplugin_options_defaults() );

    $id = isset( $args['id'] ) ? $args['id'] : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $selected_option = isset ($options[$id]) ? sanitize_text_field( $options[$id] ) : '';

    $select_options = array (
        'default' => esc_html__('Default', 'myplugin'),
        'light' => esc_html__('Light', 'myplugin'),
        'blue' => esc_html__('Blue', 'myplugin'),
        'coffee' => esc_html__('Coffee', 'myplugin'),
        'ectoplasm' => esc_html__('Ectoplasm', 'myplugin'),
        'midnight' => esc_html__('Midnight', 'myplugin'),
        'ocean' => esc_html__('Ocean', 'myplugin'),
        'sunrise' => esc_html__('Sunrise', 'myplugin'),
    );

    echo '<select id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']">';

    foreach ($select_options as $value => $option) {
        $selected = selected( $selected_option === $value, true, false );

        echo '<option value="'. $value .'"'. $selected . '>'. $option .'</options>';
    }

    echo '</select><label for="myplugin_options_'. $id .'">'. $label . '</label>';

}