define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap', 'bootstrap.datepicker','magnific.popup'
    //, 'nanoscroller'
    //, 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker', 'magnific.popup', 'jquery.placeholder'
    //, 'jquery.validate', 'jquery.typeit', 'snap.svg', 'liquid.meter'
    , 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');

                 var iframe = null;

                // IE8/7
                var frameInterval = window.setInterval(function () {
                    iframe = $('#iframe_designer').contents();
                    if ($('head', iframe).length) {
                        window.clearInterval(frameInterval);
                    }
                }, 100);

                // on iframe loaded
                $('#iframe_designer').on('load', function (e) {
                    iframe = $('#iframe_designer').contents();
                });

                $('#btn-save').on('click', function(){
                    console.log(iframe);
                    iframe.find(".gjs-pn-btn.save-page").click();
                    console.log(iframe.find("#content-return").html());
                });
                
                $('body').removeClass("loading-overlay-showing");
            });
        }
);
