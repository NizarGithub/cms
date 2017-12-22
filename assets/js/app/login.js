define(['jquery','jquery.browser.mobile','bootstrap'
	//,'nanoscroller','bootstrap.datepicker','magnific.popup','jquery.placeholder'
	,'jquery.validate','pnotify.custom','theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');
		var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
		var notice;
		$("#frm-login").validate({
			highlight: function( label ) {
				$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function( label ) {
				$(label).closest('.form-group').removeClass('has-error');
				label.remove();
			},
			errorPlacement: function( error, element ) {
				var placement = element.closest('.input-group');
				if (!placement.get(0)) {
					placement = element;
				}
				if (error.text() !== '') {
					placement.after(error);
				}
			},
			submitHandler: function(form) {
				if (typeof notice !== "undefined")
						notice.remove();
				$el.trigger('loading-overlay:show');
				var redirect = ($("#frm-login").attr("data-redirect") != 'undefined' && $("#frm-login").attr("data-redirect") != "") ? $("#frm-login").attr("data-redirect") : "";
				if (!/http:/.test(redirect) && redirect != '') redirect = $baseUrl + redirect;
				$.post($("#frm-login").attr('data-action'), {username : $('#username').val(), password : $('#password').val(), seccode : $('#seccode').val()}, function(data){
					if (data.isSukses){
						/* notice = new PNotify({
							title: 'Sukses',
							text: data.msg,
							type: 'success',
							addclass: 'stack-bar-bottom',
							stack: stack_bar_bottom,
							width: "70%"
						}); */
						PNotify.desktop.permission();
						notice = new PNotify({
							title: 'Sukses',
							text: data.msg,
							type: 'success',
							/*desktop: {
								desktop: true
							}*/
						});
						if (redirect != ''){
							setTimeout("location.href = '" + redirect + "';", 2000);
						}
					}
					else{
						/* notice = new PNotify({
							title: 'Error',
							text: data.msg,
							type: 'error',
							addclass: 'stack-bar-bottom',
							stack: stack_bar_bottom,
							width: "70%"
						}); */
						PNotify.desktop.permission();
						notice = new PNotify({
							title: 'Error',
							text: data.msg,
							type: 'error',
							/*desktop: {
								desktop: true
							}*/
						});
						if ($("#seccode").length > 0) $("#seccode").val(data.seccode);
					}
				}, 'json').fail(function(){
					/* notice = new PNotify({
						title: 'Error',
						text: 'Terjadi error ketika mengakses server.',
						type: 'error',
						addclass: 'stack-bar-bottom',
						stack: stack_bar_bottom,
						width: "70%"
					}); */
					PNotify.desktop.permission();
					notice = new PNotify({
							title: 'Error',
							text: 'Terjadi error ketika mengakses server.',
							type: 'error',
							/*desktop: {
								desktop: true
							}*/
						});
				}).always(function(){
					$el.trigger('loading-overlay:hide');
				});
            }
		});
		
		$('body').removeClass("loading-overlay-showing");
	});
});
