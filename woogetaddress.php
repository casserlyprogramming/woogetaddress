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


function wga_add_address_lookup() {
?>
    <input type="text" class="typeahead" placeholder="Search an address" 
         name="billingSearch" id="billingSearch"/>

    <script type="text/javascript">
    jQuery("#billingSearch").typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    },
    {
        name: 'billing',
        source: getAddressFunc()
});

function getAddressFunc() {
    return function findMatches(q, cb) {
        var mathes = [];

        
    }
}
    </script>
<?php  
}
