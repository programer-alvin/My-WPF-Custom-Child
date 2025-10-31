<?php
//the filter below filters html value for dropdown items to return only labels.
add_filter( 'wpforms_pdf_notifications_fields_field_html_value', function( $value, $field ) {
	//limit it to dropdown Items
	if('payment-select'=== $field['type']){
		return $field['value_choice'];
	}
	return $value;

}, 10, 2 );