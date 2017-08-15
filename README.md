# Woo Get Address
Woocommerce Extension for getaddress.io

[getaddress.io](https://getaddress.io/) returns a list of addresses when we give it a full url. We want to use this in a woocommerce website on the billing address and potentially down the line for the shipping address. This development was born out of necessity for that and we are opening it up if this becomes something that might be useful to others down the line. 

## Using the plugin on a site
Download the source code and upload to your site's plugins folder. Then you can activate on the wordpress backend. 

There is one setting on the Woocommerce -> Settings -> Products -> WooGetAddress section that allows for the api key. You can get a key from the [getaddress website](https://getaddress.io/). It is free to get the key and free for so many uses per day. 

Then on your checkout pages you will see the extra fields at the top of your billing section. 

## Developing
As this is a simple plugin, everything currently resides in the one php file. We may be moving this out down the line to include more js / css or even php files but for now that is the way it is. This probably doesn't conform to the best standards of plugin design but if you can change it so that the code is still readable then I am happy to accept pull requests. 

Please feel free to use and give back any changes that would be useful for other users. Thanks

