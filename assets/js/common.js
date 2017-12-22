// Place third party dependencies in the lib folder
//
// Configure loading modules from the lib directory,
// except 'app' ones, 
requirejs.config({
    baseUrl: $baseUrl + "assets/libs",
    paths: {
		jquery: 'porto/vendor/jquery/jquery',
		'jquery.migrate': 'porto/vendor/jquery/jquery-migrate-1.2.1.min',
		'jquery.browser.mobile': 'porto/vendor/jquery-browser-mobile/jquery.browser.mobile',
		'bootstrap': 'porto/vendor/bootstrap/js/bootstrap',
		'nanoscroller': 'porto/vendor/nanoscroller/nanoscroller',
		//'raphael': 'porto/vendor/raphael/raphael',
		//'highcharts': 'highcharts/highcharts',
		//'highcharts.exporting': 'highcharts/modules/exporting',
		//'morris': 'porto/vendor/morris/morris',
		//'bootstrap.datepicker': 'porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker',
		//'bootstrap.confirmation': 'porto/vendor/bootstrap-confirmation/bootstrap-confirmation',
		//'bootstrap.maxlength': 'porto/vendor/bootstrap-maxlength/bootstrap-maxlength',
		'magnific.popup': 'porto/vendor/magnific-popup/magnific-popup',
		'jquery.placeholder': 'porto/vendor/jquery-placeholder/jquery.placeholder',
		'jquery.validate': 'porto/vendor/jquery-validation/jquery.validate',
		//'jquery.maskedinput': 'porto/vendor/jquery-maskedinput/jquery.maskedinput',
		//'jquery.number': 'porto/vendor/jquery-number/jquery.number.min',
		'jquery.popupoverlay': 'porto/vendor/jquery-popupoverlay/jquery.popupoverlay',
		//'jquery.alphanum': 'porto/vendor/jquery-alphanum/jquery.alphanum',
		//'jquery.typeit': 'porto/vendor/jquery-typeit/jquery.typeit',
		//'snap.svg': 'porto/vendor/snap-svg/snap.svg',
		//'liquid.meter': 'porto/vendor/liquid-meter/liquid.meter',
		'idle-timer': 'porto/vendor/jquery-idletimer/dist/idle-timer',
		'pnotify.custom': 'porto/vendor/pnotify/pnotify.custom',
		'select2': 'porto/vendor/select2/select2',
		//'markdown': 'porto/vendor/bootstrap-markdown/js/markdown',
		//'to.markdown': 'porto/vendor/bootstrap-markdown/js/to-markdown',
		//'bootstrap.markdown': 'porto/vendor/bootstrap-markdown/js/bootstrap-markdown',
		//'owl.carousel': 'porto/vendor/owl-carousel/owl.carousel',
		'jquery.dataTables': 'porto/vendor/jquery-datatables/media/js/jquery.dataTables',
		'jquery.dataTables.tableTools': 'porto/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min',
		'datatables': 'porto/vendor/jquery-datatables-bs3/assets/js/datatables',
		'ckeditor': 'ckeditor/ckeditor',
		'ckeditor.adapter': 'ckeditor/adapters/jquery',
		'colorbox': 'colorbox/jquery.colorbox.min',
		'plupload': 'plupload/plupload',
		'plupload.gears': 'plupload/plupload.gears',
		'plupload.silverlight': 'plupload/plupload.silverlight',
		'plupload.flash': 'plupload/plupload.flash',
		'plupload.browserplus': 'plupload/plupload.browserplus',
		'plupload.html4': 'plupload/plupload.html4',
		'plupload.html5': 'plupload/plupload.html5',
		'jquery.plupload.queue': 'jquery.plupload.queue/jquery.plupload.queue',
		'jquery.nestable': 'porto/vendor/jquery-nestable/jquery.nestable',
		'theme': 'porto/javascripts/theme',
		'theme.custom': 'porto/javascripts/theme.custom',
		'theme.init': 'porto/javascripts/theme.init',
		'app': '../js/app'
    },
    shim: {
        'jquery.migrate': ['jquery'],
        'jquery.browser.mobile': ['jquery'],
        'bootstrap': ['jquery'],
        'nanoscroller': ['jquery'],
        //'highcharts': ['jquery'],
        //'highcharts.exporting': ['highcharts'],
        //'morris': ['raphael'],
        //'bootstrap.datepicker': ['jquery','bootstrap'],
        //'bootstrap.confirmation': ['jquery','bootstrap'],
        //'bootstrap.maxlength': ['jquery','bootstrap'],
        'magnific.popup': ['jquery'],
        'jquery.placeholder': ['jquery'],
        'jquery.validate': ['jquery'],
        //'jquery.maskedinput': ['jquery'],
        //'jquery.number': ['jquery'],
        'jquery.popupoverlay': ['jquery'],
        //'jquery.alphanum': ['jquery'],
        //'jquery.typeit': ['jquery'],
        //'snap.svg': [],
        //'liquid.meter': ['snap.svg'],
        'pnotify.custom': ['jquery'],
        'idle-timer': ['jquery'],
        'select2': ['jquery'],
        //'owl.carousel': ['jquery'],
        'jquery.dataTables': ['jquery'],
        'jquery.dataTables.tableTools': ['jquery.dataTables'],
        'datatables': ['bootstrap','jquery.dataTables'],
        //'markdown': ['bootstrap'],
        //'to.markdown': ['markdown'],
        //'bootstrap.markdown': ['to.markdown'],
        'ckeditor': ['jquery'],
        'ckeditor.adapter': ['ckeditor'],
        'colorbox': ['jquery'],
        'plupload': ['jquery'],
		'plupload.gears': ['plupload'],
		'plupload.silverlight': ['plupload'],
		'plupload.flash': ['plupload'],
		'plupload.browserplus': ['plupload'],
		'plupload.html4': ['plupload'],
		'plupload.html5': ['plupload'],
		'jquery.plupload.queue': ['plupload','jquery'],
		'jquery.nestable': ['jquery'],
        'theme': ['jquery','bootstrap','nanoscroller','select2'],
        'theme.custom': ['theme'],
        'theme.init': ['theme.custom']
    }
});

function loadScript(url, callback)
{
	// Adding the script tag to the head as suggested before
	var head = document.getElementsByTagName('head')[0];
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = url;

	// Then bind the event to the callback function.
	// There are several events for cross browser compatibility.
	script.onreadystatechange = callback;
	script.onload = callback;

	// Fire the loading
	head.appendChild(script);
}

function tandaPemisahTitik(b){
	var _minus = false;
	if (b<0) _minus = true;
	b = b.toString();
	b=b.replace(".","");
	b=b.replace("-","");
	c = "";
	panjang = b.length;
	j = 0;
	for (i = panjang; i > 0; i--){
		 j = j + 1;
		 if (((j % 3) == 1) && (j != 1)){
		   c = b.substr(i-1,1) + "." + c;
		 } else {
		   c = b.substr(i-1,1) + c;
		 }
	}
	if (_minus) c = "-" + c ;
	return c;
}

function convertDate(d){
	if (d != "")
	{
		var ad = d.split('/');
		return ad[2] + '-' + ad[1] + '-' + ad[0];
	}
	else
		return d;
}

function isNullOrEmpty(val){
	if (val == null || val == "")
		return true;
	return false;
}

var ajaxRequest = function(url, param, success, always, isRefresh, stack_bar_bottom){
	if (typeof stack_bar_bottom === "undefined") stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
	if (typeof isRefresh === "undefined") isRefresh = false;
	$.post(url, param, success, 'json').fail(function(){
		//PNotify.desktop.permission();
		/* var notice = new PNotify({
			title: 'Error',
			text: 'Terjadi error ketika mengakses server. Refreshing page...',
			type: 'error',
			addclass: 'stack-bar-bottom',
			stack: stack_bar_bottom,
			width: "70%"
		}); */
		var notice = new PNotify({
				title: 'Error',
				text: 'Terjadi error ketika mengakses server. Refreshing page...',
				type: 'error',
				/*desktop: {
					desktop: true
				}*/
			});
		if (isRefresh)
			setTimeout("location.href = '" + $currUrl + "';", 2000);
	}).always(always);
};

define(['jquery','idle-timer']
, function($) {
	
	$('li.nav-active').removeClass('nav-active');
	$('li.nav-parent').removeClass('nav-expanded');
	$('a[href="' + $currUrl + '"]').parent().addClass('nav-active');
	$('a[href="' + $currUrl + '"]').parent().parent().parent().addClass('nav-active nav-expanded');
	
	'use strict';

	var $document,
		idleTime;

	$document = $(document);

	/* $(function() {
		$.idleTimer( 20000 ); // ms

		$document.on( 'idle.idleTimer', function() {
			// if you don't want the modal
			// you can make a redirect here
			LockScreen.show();
		});
	}); */
	
	
	$('.sidebar-toggle').click(function(){
		if ($('html').hasClass('sidebar-left-collapsed')){
			if (typeof(Storage) !== "undefined") {
				localStorage.setItem("sidebarleft", 0);
			}
		}
		else{
			if (typeof(Storage) !== "undefined") {
				localStorage.setItem("sidebarleft", 1);
			}
		}
	});
	
	if (typeof(Storage) !== "undefined" && typeof(localStorage.sidebarleft) !== "undefined") {
		if (localStorage.sidebarleft == 1)
			$('html').addClass('sidebar-left-collapsed');
		else
			$('html').removeClass('sidebar-left-collapsed');
	}
	else
	{
		$('html').addClass('sidebar-left-collapsed');
	}
	
	
}); 

/* var myEvent = window.attachEvent || window.addEventListener;
var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; // make IE7, IE8 compatible

myEvent(chkevent, function(e) { // For >=IE7, Chrome, Firefox
	var confirmationMessage = ' ';  // a space
	(e || window.event).returnValue = confirmationMessage;
	return confirmationMessage;
}); */