<?php

namespace App\Boot;

class GravityForms
{
	public function __construct()
	{
		add_filter( 'gform_submit_button', [$this, 'convertGFormsSubmitToButton'], 10, 5 );
		add_filter( 'gform_address_types', [$this, 'ukAddressFormat'], 10, 2 );
		// add_filter( 'gform_field_validation', [$this, 'ukCustomAddressValidation'], 10, 4 );
		
		// Enable the "hidden" setting for labels
		add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
	}
	
	/**
	 * Change Gravity Forms submit input to a button element
	 *
	 * It's not perfect - it leaves some inapplicable attributes in the 
	 * element but I can live with that to avoid a whole bunch more 
	 * str_replace and it leaves the important onclick and tab 
	 * index intact
	 * 
	 * @see https://gist.github.com/mannieschumpert/8334811 
	 * 
	 * @param  string $button
	 * @param  array $form
	 * @return string
	 */
	public function convertGFormsSubmitToButton( $button, $form ) 
	{
		$button = str_replace( 'input', 'button', $button );
	
		$button = str_replace( '/', '', $button );
	
		$button .= "{$form['button']['text']}</button>";
	
		return $button;
	}

	/*
	* Add UK address type
	*
	* @link https://docs.gravityforms.com/gform_address_types/
	*/
	public function ukAddressFormat( $address_types, $form_id ) {
		$address_types['uk'] = array(
			'label'       => 'UK',
			'country'     => 'United Kingdom',
			'zip_label'   => 'Postcode',
			'state_label' => 'County',
			'states'      => array(
				'-- Please select --',
				'England'          => array(
					'Avon', 'Bedfordshire', 'Berkshire', 'Buckinghamshire', 'Cambridgeshire', 'Cheshire', 'Cleveland', 'Cornwall', 'Cumbria', 'Derbyshire', 'Devon', 'Dorset', 'Durham', 'East Sussex', 'Essex', 'Gloucestershire', 'Hampshire', 'Herefordshire', 'Hertfordshire', 'Isle of Wight', 'Kent', 'Lancashire', 'Leicestershire', 'Lincolnshire', 'London', 'Merseyside', 'Middlesex', 'Norfolk', 'Northamptonshire', 'Northumberland', 'North Humberside', 'North Yorkshire', 'Nottinghamshire', 'Oxfordshire', 'Rutland', 'Shropshire', 'Somerset', 'South Humberside', 'South Yorkshire', 'Staffordshire', 'Suffolk', 'Surrey', 'Tyne and Wear', 'Warwickshire', 'West Midlands', 'West Sussex', 'West Yorkshire', 'Wiltshire', 'Worcestershire',
				),
				'Wales'            => array(
					'Clwyd', 'Dyfed', 'Gwent', 'Gwynedd', 'Mid Glamorgan', 'Powys', 'South Glamorgan', 'West Glamorgan',
				),
				'Scotland'         => array(
					'Aberdeenshire', 'Angus', 'Argyll', 'Ayrshire', 'Banffshire', 'Berwickshire', 'Bute', 'Caithness', 'Clackmannanshire', 'Dumfriesshire', 'Dunbartonshire', 'East Lothian', 'Fife', 'Inverness-shire', 'Kincardineshire', 'Kinross-shire', 'Kirkcudbrightshire', 'Lanarkshire', 'Midlothian', 'Moray', 'Nairnshire', 'Orkney', 'Peeblesshire', 'Perthshire', 'Renfrewshire', 'Ross-shire', 'Roxburghshire', 'Selkirkshire', 'Shetland', 'Stirlingshire', 'Sutherland', 'West Lothian', 'Wigtownshire',
				),
				'Northern Ireland' => array(
					'Antrim', 'Armagh', 'Down', 'Fermanagh', 'Londonderry', 'Tyrone',
				),
			),
		);
	
		return $address_types;
	}

	/*
	* Exclude address 2 and county from validation
	*/
	public function ukCustomAddressValidation( $result, $value, $form, $field ) {

		if ($result['is_valid']) {
			foreach( $form['fields'] as &$field ) {
				if (array_key_exists('addressType', $field) && $field->addressType == 'uk') {
					$address2 = rgar( $value, $field->id . '.2' );
					$county   = rgar( $value, $field->id . '.4' );
					if ( empty( $address2 ) || empty( $county) ) {
						$result['is_valid'] = true;
					}
				} else {
					continue;
				}
			}
		}
		return $result;
	}

}