define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap'
    //, 'nanoscroller'
    //, 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker', 'magnific.popup', 'jquery.placeholder'
    //, 'jquery.validate', 'jquery.typeit', 'snap.svg', 'liquid.meter'
    , 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                
                $('body').removeClass("loading-overlay-showing");
            });
        }
);
