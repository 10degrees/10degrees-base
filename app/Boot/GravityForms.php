<?php

namespace App\Boot;

/**
 * Gravity forms integration
 *
 * Set options for integration in setOptions()
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class GravityForms
{

    protected $options;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setOptions();
        $this->main();
    }

    /**
     * Set options for this class
     *
     * @return void
     */
    private function setOptions()
    {
        $this->options =  [
            'disable_default_css' => true,
            'override_default_buttons' => false,
            'override_address_types' => false,
        ];
    }

    /**
     * Main method
     *
     * @return void
     */
    private function main()
    {
        $this->disableCSS();
        $this->overrideDefaultButtons();
        $this->overrideAddressFields();
    }

    
    /**
     * Override buttons
     *
     * @return void
     */
    private function overrideAddressFields()
    {
        if ($this->options['override_default_buttons']) {
            add_filter('override_address_types', [$this, 'ukAddressFormat'], 10, 2);
        }
    }

    /**
     * Disable Gravity forms default CSS
     *
     * @return void
     */
    private function disableCSS()
    {
        if ($this->options['disable_default_css']) {
            add_filter('pre_option_rg_gforms_disable_css', '__return_true');
        }
    }

    /**
     * Replace default previous/next/submit buttonas
     *
     * @return void
     */
    public function overrideDefaultButtons()
    {
        if ($this->options['override_default_buttons']) {
            add_filter('gform_submit_button', [$this, 'convertGFormsToButton'], 10, 5);
            add_filter('gform_next_button', [$this, 'convertGFormsToButton'], 10, 5);
            add_filter('gform_previous_button', [$this, 'convertGFormsToButton'], 10, 5);
        }
    }

    /**
     * Change Gravity Forms form nav inputs to a button elements
     *
     * @param string $button Button
     * @param array  $form   Form
     *
     * @return string
     */
    public function convertGFormsToButton($button, $form)
    {
        preg_match("/value=['\"](.*?)['\"]/", $button, $matches);

        if (isset($matches[1])) {
            $button = str_replace('input', 'button', $button);
            $button = str_replace('/', '', $button);
            $button .= "{$matches[1]}</button>";
            return $button;
        }
    }

    //@TODO Check param descriptions make sense
    /**
     * Add UK address type
     *
     * @param array $address_types Address types
     * @param int   $form_id       ID of form
     *
     * @link https://docs.gravityforms.com/gform_address_types/
     *
     * @return array $address_types Filtered address types
     */
    public function ukAddressFormat($address_types, $form_id)
    {
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

    //@TODO param descriptions
    /**
     * Exclude address 2 and county from validation
     *
     * @param [type] $result
     * @param [type] $value
     * @param [type] $form
     * @param [type] $field
     *
     * @return array $result
     */
    private function ukCustomAddressValidation($result, $value, $form, $field)
    {
        if ($result['is_valid']) {
            foreach ($form['fields'] as &$field) {
                if (array_key_exists('addressType', $field) && $field->addressType == 'uk') {
                    $address2 = rgar($value, $field->id . '.2');
                    $county   = rgar($value, $field->id . '.4');
                    if (empty($address2) || empty($county)) {
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
