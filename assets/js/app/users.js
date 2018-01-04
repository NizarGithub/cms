define(['jquery','jquery.browser.mobile','bootstrap','nanoscroller','bootstrap.confirmation','magnific.popup','jquery.placeholder'
	, 'bootstrap.datepicker'
	,'jquery.validate','jquery.maskedinput','jquery.number','jquery.popupoverlay','jquery.alphanum','pnotify.custom','select2','theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');
		var $eloperator = $('#LoadingOverlayOperator');
		
		var operatorEdit = {};
		
		$('#refresh', $('#frm-operator')).click(function(){
			$el.trigger('loading-overlay:show');
			var param = {};

			ajaxRequest($baseUrl + 'users/list', { param : param }
			, function(data) {
				var tbody = '';
				if (data.length > 0)
				{
					$.each(data, function(i,v){
						tbody += "<tr><td>"+ v.id +".</td>"+
                                                        "<td>"+ v.username +"</td><td>"+ v.realname +"</td><td>"+ v.level +"</td>"+
                                                        "<td class='text-center'>"+ (v.isaktif == 1 ? "<span class='text-success'>Aktif</span>" : "<span class='text-danger'>Tidak Aktif</span>") +"</td>";
						tbody +="<td class='text-center' data-operator='"+ JSON.stringify(v) +"' data-id='"+ v.id +"'><a class='on-default edit mr-xs' href='javascript:void(0)'><i class='fa fa-pencil'></i></a>"+ (v.id == 1 ? "" : "<a class='on-default text-danger del' href='javascript:void(0)' class='delete-row'><i class='fa fa-trash-o'></i></a>") + "</td>";
                        tbody +="</tr>";
					});
				}
				$('tbody', $('#tabel-list')).html(tbody);
				$('.del').confirmation({
					onConfirm: function(event, element) {
						var obj = element.parent();
						operatorEdit = JSON.parse(obj.attr('data-operator'));
						$eloperator.trigger('loading-overlay:show');
						ajaxRequest($baseUrl + 'users/deloperator', { param : operatorEdit }
							, function(data) {
								if (data.IsError)
									new PNotify({
										title: 'Error!',
										text: data.Msg,
										type: 'error'
									});
								else
								{
									$('#refresh', $('#frm-operator')).trigger('click');
									new PNotify({
										title: 'Success!',
										text: data.Msg,
										type: 'success'
									});
									//obj.parent().remove();
								}
								
							}, function(){
								$eloperator.trigger('loading-overlay:hide');
							}, false);
						return false;
					},
					onCancel: function() {
						
					}
				});
				
			}, function(){
				$el.trigger('loading-overlay:hide');
			}, false);
			return false;
		});
		
		var validobj = $("#edit-operator").validate({
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
			highlight: function (element) {
				var elem = $(element);
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				if (elem.hasClass("select2-offscreen")) {
					$("#s2id_" + elem.attr("id") + " ul").addClass('has-error');
				} else {
					elem.addClass('has-error');
				}
			},
			unhighlight: function (element) {
				var elem = $(element);
				if (elem.hasClass("select2-offscreen")) {
					$("#s2id_" + elem.attr("id") + " ul").removeClass('has-error');
				} else {
					elem.removeClass('has-error');
				}
			},
			submitHandler: function(form) {
				
				var param = {};
				param['action'] = $("#edit-operator").attr('data-action');
				if (param['action'] == "edit")
					param['id'] = operatorEdit.id;
				$('.simpan', $("#edit-operator")).each(function(){
					if (!/s2id/g.test($(this).attr('id')))
						param[$(this).attr('id')] = $(this).val();//.toUpperCase();
				});
				var err = '';
				if (err != "")
					alert (err);
				else
				{				
					$eloperator.trigger('loading-overlay:show');
					ajaxRequest($baseUrl + 'users/saveoperator', { param : param }
						, function(data) {
							if (data.IsError)
								new PNotify({
									title: 'Error!',
									text: data.Msg,
									type: 'error'
								});
							else
							{
								$('#refresh', $('#frm-operator')).trigger('click');
								new PNotify({
									title: 'Success!',
									text: data.Msg,
									type: 'success'
								});
								if (param['action'] == "add")
									SetDefaultOperator();
								else
									$.magnificPopup.close();
							}
							
						}, function(){
							$eloperator.trigger('loading-overlay:hide');
						}, false);
				}
            }
		});
		
               
		function SetDefaultOperator()
		{
			$('input.simpan', $('#edit-operator')).val('');
			$('select.simpan', $('#edit-operator')).select2('val','',true);
			$('select#isaktif', $('#edit-operator')).select2('val','1');
		}
		
		function ShowOperator(act)
		{
			$dok = $('#tambah-operator');
			$form = $('#edit-operator');
			$form.attr('data-action', act);
			$.magnificPopup.open({
				items: {
					src: $dok, // can be a HTML string, jQuery object, or CSS selector
					type: 'inline'
				},
				preloader: false,
				focus: '#realname',
				modal: true,
				callbacks: {
					beforeOpen: function() {
						$('select#isaktif', $('#edit-operator')).prop('disabled','');
						$('select#level', $('#edit-operator')).prop('disabled','');
						if (act == "add")
							SetDefaultOperator();
						else if (operatorEdit.id == 1)
						{
							$('select#isaktif', $('#edit-operator')).prop('disabled','disabled');
							$('select#level', $('#edit-operator')).prop('disabled','disabled');
						}
						$('.panel-title', $dok).text(act == "add" ? 'TAMBAH USER' : 'EDIT USER');
					},
					afterOpen: function() {
						$('#realname').select2('focus');
					},
					open: function() {
						setTimeout(function(){$('#realname').select2('focus');}, 100);
					}
				}
			});
		}
		
		$('#add-operator').click(function(){
			ShowOperator('add');
		});
		
		$(document).on('click', '.edit', function(){
                    
			operatorEdit = JSON.parse($(this).parent().attr('data-operator'));
			$('input.simpan', $('#edit-operator')).each(function(){
				$(this).val($.trim(operatorEdit[$(this).attr('id')]));
			});
			$('select.simpan', $('#edit-operator')).each(function(){
				$(this).select2('val', $.trim(operatorEdit[$(this).attr('id')]), true);
			});
			ShowOperator('edit');
                        
		});
		
		
		$(document).on("change", ".select2-offscreen", function () {
			if (!$.isEmptyObject(validobj.submitted)) {
				validobj.form();
			}
		});

		$(document).on("select2-opening", function (arg) {
			var elem = $(arg.target);
			if ($("#s2id_" + elem.attr("id") + " ul").hasClass("has-error")) {
				$(".select2-drop ul").addClass("has-error");
			} else {
				$(".select2-drop ul").removeClass("has-error");
			}
		});
		
		$("#realname", $("#edit-operator")).alpha();
		

		/* End Master Operator */
		
		$('#closeconfirm').popup({
			transition: 'all 0.3s'
		});
		
		$('#closeok').click(function(){
			$.magnificPopup.close();
			$('#closeconfirm').popup('hide');
		});

		$('#refresh').click();
		
		$('body').removeClass("loading-overlay-showing");
	});
});
