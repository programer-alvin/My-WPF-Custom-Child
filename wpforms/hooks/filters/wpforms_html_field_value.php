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
#add_filter( 'wpforms_html_field_value', 'my_custom_wpforms_html_field_value', 10, 4 );

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



/**
 * Modify the HTML address field value in WPForms email notifications.This applies in all forms and all address fields
 *
 * @param string $field_val  The field value.
 * @param array  $field      The field data array.
 * @param array  $form_data  The form data and settings.
 * @param string $context    The context ('email-html' in this case).
 *
 * @return string
 */
add_filter( 'wpforms_html_field_value', 'my_custom_wpforms_html_address_field_value_for_all_fields_fields_in_all_forms', 10, 4 );

function my_custom_wpforms_html_address_field_value_for_all_fields_fields_in_all_forms( $field_val, $field, $form_data, $context ) {
	// Apply only for email HTML output and address fields.
	if ( 'email-html' === $context && isset( $field['type'] ) && 'address' === $field['type'] ) {

		// Initialize an empty array to hold address parts.
		$parts = [];

		// Check each key before using it.
		if ( ! empty( $field['address1'] ) ) {
			$parts[] = $field['address1'];
		}

		if ( ! empty( $field['address2'] ) ) {
			$parts[] = $field['address2'];
		}

		if ( ! empty( $field['city'] ) ) {
			$parts[] = $field['city'];
		}

		if ( ! empty( $field['state'] ) ) {
			$parts[] = $field['state'];
		}

		if ( ! empty( $field['postal'] ) ) {
			$parts[] = $field['postal'];
		}

		if ( ! empty( $field['country'] ) ) {
			$parts[] = $field['country'];
		}

		// Join parts with commas and spaces.
		$field_val = implode( ', ', $parts );
	}

	return $field_val;
}