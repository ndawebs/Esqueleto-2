<?php
class esqueleto20_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}
	public function wph_create_settings() {
		$page_title = 'Esqueleto 2 Configuration';
		$menu_title = 'Esqueleto 2.0';
		$capability = 'manage_options';
		$slug = 'esqueleto20';
		$callback = array($this, 'wph_settings_content');
		$icon = 'dashicons-admin-settings';
		$position = 2;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
	}
	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>Esqueleto 2 Configuration</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'esqueleto20' );
					do_settings_sections( 'esqueleto20' );
					submit_button();
				?>
			</form>
		</div> <?php
	}
	public function wph_setup_sections() {
		add_settings_section( 'esqueleto20_section', '', array(), 'esqueleto20' );
	}
	public function wph_setup_fields() {
		$fields = array(
			array(
				'label' => 'Add in Header',
				'id' => 'add-in-header-01',
				'type' => 'textarea',
				'section' => 'esqueleto20_section',
				'desc' => 'Enter here the code that will be loaded in the header',
				'placeholder' => 'Enter here the code!',
			),
			array(
				'label' => 'Add in Footer',
				'id' => 'add-in-footer-01',
				'type' => 'textarea',
				'section' => 'esqueleto20_section',
				'desc' => 'Enter here the code that will be loaded in the footer',
				'placeholder' => 'Enter here the code!',
			),
			array(
				'label' => 'Add after body tag',
				'id' => 'add-after-body-tag-01',
				'type' => 'textarea',
				'section' => 'esqueleto20_section',
				'desc' => 'Enter here the code that will be loaded after the body tag',
				'placeholder' => 'Enter here the code!',
			),
			array(
				'label' => 'Add Logo Support',
				'id' => 'logo-support-01',
				'type' => 'checkbox',
				'section' => 'esqueleto20_section',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'esqueleto20', $field['section'], $field );
			register_setting( 'esqueleto20', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
		switch ( $field['type'] ) {
				case 'checkbox':
					printf('<input %s id="%s" name="%s" type="checkbox" value="1">',
						$value === '1' ? 'checked' : '',
						$field['id'],
						$field['id']
				);
					break;
				case 'textarea':
				printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>',
					$field['id'],
					$placeholder,
					$value
					);
					break;
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}
		if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
	}
}
new esqueleto20_Settings_Page();

require_once "functions-options.php";
?>