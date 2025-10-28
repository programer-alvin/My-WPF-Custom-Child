<?php
/**
 * Modify the HTML field value in WPForms email notifications.
 *
 * @param string $field_val  The field value.
 * @param array  $field      The field data array.
 * @param array  $form_data  The form data and settings.
 * @param string $context    The context ('email-html' in this case).
 *
 * @return string
 */
add_filter( 'wpforms_html_field_value', 'my_custom_wpforms_html_field_value', 10, 4 );

function my_custom_wpforms_html_field_value( $field_val, $field, $form_data, $context ) {

	// Check if this is for email HTML context.
	if ( 'email-html' === $context ) {

		// Example 1: Add a prefix to all field values.
		$field_val = '<strong>Value:</strong> ' . $field_val;

		// Example 2: Modify specific field by ID.
		if ( isset( $field['id'] ) && 4 === (int) $field['id'] ) {
			$field_val = '<em>Custom output for field #4:</em> ' . esc_html( $field_val );
		}
	}

	return $field_val;
}
