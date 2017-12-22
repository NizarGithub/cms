"use strict";

jQuery(document).ready(function($) {
    Enliven_Plus_Contact.init();
});

jQuery(window).load(function($) {
    Enliven_Plus_Twitter.init();
    Enliven_Plus_Social.init();
});


var Enliven_Plus_Twitter = {

    init: function() {
        var twitterFeeds = jQuery('.e_widget_tweets_list');

        if (twitterFeeds.length > 0) {
            jQuery.each(twitterFeeds, function() {
                var widget = jQuery(this);

                if( widget.find( '.e_loading_text' ).length ){

                    var is_from_aegis = 0;

                    if(widget.hasClass('aegis_widget')){
                        is_from_aegis = 1;
                    }

                    /*jQuery.ajax({
                        type: 'GET',
                        url: widget.find('.e_loading_url').val(),
                        dataType: 'html',
                        data: {
                            widget_id: jQuery(this).attr('id'),
                            post_id: enliven_plus_config.data.post_id,
                            is_from_aegis: is_from_aegis
                        },
                        beforeSend: function() {},
                        complete: function(data) {
                          widget.find('.e_content').linkify({target: '_blank'});
                        },
                        error: function(errorThrown) {},
                        success: function(data) {
                            if ('' !== data) {
                                widget.find('.widget-content').html(data).linkify({
                                    target: "_blank"
                                });
                            }
                        },
                    });*/
                }else{                    
                    widget.find('.e_content').linkify({
                        target: "_blank"
                    });
                }

            });
        }
    }
};

var Enliven_Plus_Social = {
    init: function() {
        var socials = jQuery('.e_widget_socials_counter');

        if (socials.length > 0) {
            jQuery.each(socials, function() {
                var widget        = jQuery(this);
                var is_from_aegis = 0;

                if(widget.hasClass('aegis_widget')){
                    is_from_aegis = 1;
                }

                /*jQuery.ajax({
                    type: 'GET',
                    url: widget.find('.e_loading_url').val(),
                    dataType: 'html',
                    data: {
                        widget_id: jQuery(this).attr('id'),
                        post_id: enliven_plus_config.data.post_id,
                        is_from_aegis: is_from_aegis
                    },
                    beforeSend: function() {},
                    complete: function(data) {},
                    error: function(errorThrown) {},
                    success: function(data) {
                        if ('' !== data) {
                            widget.find('.widget-content').html(data);
                        }
                    },
                });*/
            });
        }
    }
}

var Enliven_Plus_Contact = {

    init: function() {

        var form_contact = jQuery('form.e_form_contact');

        if(form_contact.length){

            form_contact.validate({
                rules: {
                    e_contact_name: {
                        required: true,
                        minlength: 2
                    },
                    e_contact_email: {
                        required: true,
                        email: true
                    },
                    e_contact_message: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    e_contact_name: {
                        required: enliven_plus_config.translate.name.required,
                        minlength: jQuery.format(enliven_plus_config.translate.name.min_length)
                    },
                    e_contact_email: {
                        required: enliven_plus_config.translate.email.required,
                        email: enliven_plus_config.translate.email.email
                    },
                    e_contact_message: {
                        required: enliven_plus_config.translate.message.required,
                        minlength: jQuery.format(enliven_plus_config.translate.message.min_length)
                    }
                },
                submitHandler: function(form) {

                    jQuery(form).ajaxSubmit({
                        dataType: 'json',
                        clearForm: true,
                        beforeSubmit: function(arr, $form, options) {
                            jQuery.amaran({
                                message: 'Thanks! Your message is sending..',
                                position: 'bottom left',
                                inEffect: 'slideLeft'
                            });
                        },
                        success: function(response, statusText, xhr, $form) {
                            if(response.message){
                                jQuery.amaran({
                                    message: response.message,
                                    position: 'bottom left',
                                    inEffect: 'slideLeft'
                                });
                            }
                        }
                    });

                    return false;
                }
            });

        }


    }
};
