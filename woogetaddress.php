<?php
/*
  Plugin Name: WooGetAddress
  Plugin URI: https://github.com/casserlyprogramming/woogetaddress 
  Description: Woocommerce Extension for getaddress.io 
  Version: 1.0.0
  Author: Daniel Casserly
  Author URI: http://dandalfprogramming.blogspot.co.uk/
 */


if (!defined('ABSPATH'))
    exit; // Exit 

// Actions 
add_action('woocommerce_before_checkout_billing_form', 'wga_add_address_lookup');
add_action('woocommerce_get_sections_products', 'wga_add_setting_section');
add_action('woocommerce_get_settings_products', 'wga_add_settings', 10, 2);

// Adding the settings
function wga_add_setting_section($sections) {
    $sections['wga']  = __('WooGetAddress', 'wga');
    return $sections;
}

function wga_add_settings($settings, $current_section){
    if($current_section === 'wga') {
        $settings_wga = array();
        // Add the title to the settings...
        $settings_wga[] = array(
            'name' => __('Woo Get Address Settings', 'wga'), 
            'type' => 'title',
            'desc' => __('The following options are for the WooGetAddress Plugin', 'wga'),
            'id' => 'wga');


        $settings_wga[] = array(
            'name' => __('API Key', 'wga'),
            'desc_tip' => __('Enter you api key from getaddress.io here', 'wga'),
            'id' => 'wga_apikey',
            'type' => 'text', 
            'desc' => __('The ApiKey is needed to show the billing and shipping search for the address', 'wga')
        );

        $settings_wga[] = array('type' => 'sectionend', 'id'=> 'wga');

        return $settings_wga;
    }
    else {
        return $settings;
    }

}

// Front end code
function wga_add_address_lookup() {
    $api_key = get_option('wga_apikey');
?>
    <p>
        <input type="text" class="input-text" placeholder="Enter postcode" 
               name="billingSearch" id="billingSearch"/>
        <a href="#" class="button" id="btnSearchPC">Search</a>
    </p>
    <p>
        <select id="addressChoices" class="input-text"></select>
    </p>
    <script type="text/javascript">
    jQuery(document).ready(function(){
        var options;
        // Button click event
        jQuery("#btnSearchPC").click(function(){
            // TODO: error handling here too!
            var uri = 'https://api.getaddress.io/find/' + jQuery("#billingSearch").val() + '?api-key=<?php echo $api_key; ?>';

            jQuery.getJSON(uri).done(function(data){
                // TODO: error handling here
                options = data.addresses;
                var optionsHTML;

                for(var i = 0; i < data.addresses.length; i++) {
                    optionsHTML += '<option value="' + i + '">' + data.addresses[i] + "</option>";
                }
                jQuery("#addressChoices").html(optionsHTML);
            });
            return false;
        });

        jQuery("#addressChoices").on('change', function(){
            var address = options[this.value];
            var addressArray = address.split(', ');

            jQuery('#billing_address_1').val(addressArray[0]);
            jQuery('#billing_address_2').val(addressArray[1]);
            jQuery('#billing_city').val(addressArray[5]);
            jQuery('#billing_state').val(addressArray[6]);
            jQuery('#billing_postcode').val(jQuery("#billingSearch").val());
        });
    });
    </script>
<?php  
}

