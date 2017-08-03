<?php
/*
  Plugin Name: WooGetAddress
  Plugin URI: http://www.casserlyprogramming.com
  Description: Woocommerce Extension for getaddress.io 
  Version: 1.0.0
  Author: Daniel Casserly
  Author URI: http://dandalfprogramming.blogspot.co.uk/
 */


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

// Actions 
add_action('wp_enqueue_scripts', 'wga_insert_scripts');
add_action('woocommerce_before_checkout_billing_form', 'wga_add_address_lookup');

// Filters

// Functions
function wga_insert_scripts() {
    wp_register_script( 'typeahead', plugins_url( '/js/typeahead.jquery.js');
    wp_register_script( 'wgajs', plugins_url( '/js/wga.js', __FILE__ ) );
}


function wga_add_address_lookup() {
    // TODO: this needs to come from the options table
    $api_key = '...';
?>
    <input type="text" class="typeahead" placeholder="Search an address" 
         name="billingSearch" id="billingSearch"/>

    <script type="text/javascript">
    jQuery(document).ready(function(){
        WgaSelect2Hook ('billingSearch', '<?php echo $api_key; ?>' , function(data){
            // TOOD: do something here with the information
            console.log(data);
        });
    });
    </script>
<?php  
}
