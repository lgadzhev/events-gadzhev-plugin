jQuery(document).ready(function() {

    jQuery('#the-list :input').each(function () {

        if(jQuery(this).val() == 'Date'){

            var id = jQuery(this).attr('id').replace("key","value");
            var code = id.split('-')[1];

            jQuery("#" + id).replaceWith('<input id=\"' + id + '\" name=\"meta[' + code + '][value]\" type=\"text\">');
            jQuery("#"+ id).datepicker({ dateFormat: 'yy-mm-dd' });
        }
    });

    jQuery('#metakeyselect').on('change', function () {

        var elementValue = jQuery('#metavalue');

        elementValue.replaceWith('<textarea id=\"metavalue\" name=\"metavalue\" rows=\"2\" cols=\"25\"></textarea>');

        if ( $(this).val() == 'Date') {

            elementValue.replaceWith('<input id=\"metavalue\" name=\"metavalue\" type=\"text\">');
            elementValue.datepicker({ dateFormat: 'yy-mm-dd' });
        }
    });
});