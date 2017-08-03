function WgaSelect2Hook (name, apikey, selectedCallback) {
    // get the search query
    var searchQ = encodeURIComponent(jQuery('#'+ name).val()); 

    jQuery('#' + name).typeahead({
        hint: true,
        highlight: true,
        minLength: 3 
    }, {
        name: name, 
        async: true,
        limit: 11,
        source: function(query, process, asyncProcess) {
            jQuery.getJSON('https://api.getaddress.io/find/' + name + '?api-key=' + apikey).done(function(data){
                return asyncProcess(data.addresses);
            });
        }
    }).on('typeahead:selected', function (event, data) { self.selectedCallback(data); })
    .on('typeahead:autocompleted', function (event, data) { self.selectedCallback(data); });;
}

