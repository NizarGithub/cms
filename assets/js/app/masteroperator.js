define(['jquery','jquery.browser.mobile','bootstrap','nanoscroller','bootstrap.datepicker','bootstrap.confirmation','bootstrap.maxlength','magnific.popup','jquery.placeholder'
	,'jquery.validate','jquery.maskedinput','jquery.number','jquery.popupoverlay','jquery.alphanum','pnotify.custom','select2','markdown','to.markdown','bootstrap.markdown','theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');
		var $eloperator = $('#LoadingOverlayOperator');
		var $progressSync = $('#sync-loader');
		/* Start Master Operator */
                setProvKabAwal();
                // Test Git
		
		var operatorEdit = {};
		
		function setFilterKab(prov, id){
			var selectKab = id == "prov" ? (wilUser.kab != false ? '' : '<option value="">- Semua Kabupaten -</option>') : '<option value="">- Pilih Kabupaten -</option>';
			if (prov != "")
				$.each(kabByProv[prov], function(i,v){
					selectKab += '<option value="'+ v.KodeKab +'">'+ '[' + v.KodeProv + v.KodeKab + '] ' + v.NamaKab +'</option>';
				});
			if (id == "prov")
			{
				$("select#kab").html(selectKab);
				if (wilUser.kab != false && prov != "")
                {
                    $('select#kab').select2('val', wilUser.kab, true);
                }
                else
                    $('select#kab').trigger('change');
			}
			else
			{
				$("select#KodeKab").html(selectKab);
				$('select#KodeKab').trigger('change');
			}
		}
		
		$('select#prov').change(function(){
			setFilterKab($(this).val(), $(this).attr('id'));
		});
		$('select#KodeProv').change(function(){
			setFilterKab($(this).val(), $(this).attr('id'));
		});
		
		$('select#kab').change(function(){
			$('#refresh', $('#frm-operator')).trigger('click');
		});
		
		$('#refresh', $('#frm-operator')).click(function(){
			$el.trigger('loading-overlay:show');
			var param = {};
			param['KodeProv'] = $('select#prov').val();
			param['KodeKab'] = $('select#kab').val();
			ajaxRequest($baseUrl + 'master/operator/list', { param : param }
			, function(data) {
				var tbody = '';
				if (data.length > 0)
				{
					$.each(data, function(i,v){
						tbody += "<tr><td>"+ v.Id +".</td><td>" + v.Wilayah + "</td>"+
                                                        "<td>"+ v.Username +"</td><td>"+ v.Nama +"</td><td>"+ v.Ket +"</td>"+
                                                        "<td class='text-center'>"+ (v.IsAktif == 1 ? "<span class='text-success'>Aktif</span>" : "<span class='text-danger'>Tidak Aktif</span>") +"</td>";
						if (userLevel != 6 && userLevel != 9)
							tbody +="<td class='text-center' data-operator='"+ JSON.stringify(v) +"' data-id='"+ v.IdUser +"'><a class='on-default edit mr-xs' href='javascript:void(0)'><i class='fa fa-pencil'></i></a><a class='on-default text-danger del' href='javascript:void(0)' class='delete-row'><i class='fa fa-trash-o'></i></a></td>";
                        tbody +="</tr>";
					});
				}
				$('tbody', $('#tabel-list')).html(tbody);
				$('.del').confirmation({
					onConfirm: function(event, element) {
						var obj = element.parent();
						operatorEdit = JSON.parse(obj.attr('data-operator'));
						$eloperator.trigger('loading-overlay:show');
						ajaxRequest($baseUrl + 'master/operator/deloperator', { param : operatorEdit }
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
					param['IdUser'] = operatorEdit.IdUser;
				$('.simpan', $("#edit-operator")).each(function(){
					if (!/s2id/g.test($(this).attr('id')))
						param[$(this).attr('id')] = $(this).val();//.toUpperCase();
				});
				var err = '';
//				if (param.KodeProv != "" && param.KodeKab != "" && param.Level == "1")
//					err = 'Level pengguna untuk BPS Kabupaten tidak boleh berisi Administrator';
//				else if (param.KodeProv != "" && param.KodeKab == "" && param.Level != "2")
//					err = 'Level pengguna untuk BPS Provinsi hanya boleh berisi Supervisor';
//				else if (param.KodeProv == "" && param.KodeKab == "" && param.Level != "1")
//					err = 'Level pengguna untuk BPS RI hanya boleh berisi Administrator';
				if((param.Level==4 || param.Level==5 || param.Level==6) && param.KodeProv=="")
                                    err = 'Kode Provinsi tidak boleh kosong';
                                if((param.Level==7 || param.Level==8 || param.Level==9) && param.KodeProv=="")
                                    err = 'Kode Provinsi tidak boleh kosong';
                                if((param.Level==7 || param.Level==8 || param.Level==9) && param.KodeKab=="")
                                    err = 'Kode Kabupaten tidak boleh kosong';
                                if(param.Password=="" && param.IsSync=="0")
                                    err = 'Password harus terisi untuk user mitra';
                                
				if (err != "")
					alert (err);
				else
				{				
					$eloperator.trigger('loading-overlay:show');
					ajaxRequest($baseUrl + 'master/operator/saveoperator', { param : param }
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
		
                //tambah puput
                $('select#IsSync').change(function(){
			var jenisAkun = $('select#IsSync').val();
                        SetSyncLabel(jenisAkun);
		});
                $('select#Level').change(function(){
			var level = $('select#Level').val();
                        cekLevel(level);
		});
                function SetSyncLabel(jenisAkun)
                {
                        if(jenisAkun==1){
                            $('#Password').attr('disabled', 'disabled');
                            $('#Nipbaru').attr('disabled', 'disabled');
                            $('#Niplama').attr('disabled', 'disabled');
                            $('#Username').attr('readonly', true);
                            $('#Nama').attr('readonly', true);
                            $('#Satker').attr('readonly', true);
                            $('#Email').attr('readonly', true);
                            $('#Password').attr('readonly', true);
                        }
                        else if(jenisAkun==0){
                            $('#Password').attr('disabled', false);
                            $('#Nipbaru').attr('disabled', 'disabled');
                            $('#Niplama').attr('disabled', 'disabled');
                            $('#Username').attr('readonly', false);
                            $('#Nama').attr('readonly', false);
                            $('#Satker').attr('readonly', false);
                            $('#Email').attr('readonly', false);
                            $('#Password').attr('readonly', false);
                        }
                        else{
                            $('#Password').attr('disabled', false);
                            $('#Nipbaru').attr('disabled', 'disabled');
                            $('#Niplama').attr('disabled', 'disabled');
                        }
		}
                
                function SetLevel()
                {
                    var selectLevel = '<option value="">- Pilih Level -</option>';
                    if (userProv != null && userProv != "")
                    {
                            if (userKab != null && userKab != ""){
                                selectLevel += '<option value="7">ADMIN KABUPATEN</option>';
                                selectLevel += '<option value="8">PEMANTAU KABUPATEN</option>';
                                selectLevel += '<option value="9">OPERATOR KABUPATEN</option>';
                            }
                            else{
                                selectLevel += '<option value="4">ADMIN PROVINSI</option>';
                                selectLevel += '<option value="5">PEMANTAU PROVINSI</option>';
                                selectLevel += '<option value="6">OPERATOR PROVINSI</option>';
                                selectLevel += '<option value="7">ADMIN KABUPATEN</option>';
                            }    
                    }
                    else
                    {
                            selectLevel += '<option value="1">ADMIN PUSAT</option>';
                            selectLevel += '<option value="2">PEMANTAU PUSAT</option>';
                            selectLevel += '<option value="3">OPERATOR PUSAT</option>';
                            selectLevel += '<option value="4">ADMIN PROVINSI</option>';
                            selectLevel += '<option value="5">PEMANTAU PROVINSI</option>';
                            selectLevel += '<option value="6">OPERATOR PROVINSI</option>';
                            selectLevel += '<option value="7">ADMIN KABUPATEN</option>';
                            selectLevel += '<option value="8">PEMANTAU KABUPATEN</option>';
                            selectLevel += '<option value="9">OPERATOR KABUPATEN</option>';
                    }
                    $("select#Level").html(selectLevel);
                    $('select#Level').trigger('change');
                }
                
                function cekLevel(value) {
                    if (value == 1 || value == 2 || value == 3) {
                        $('#KodeProv').attr('disabled', 'disabled');
                        $('#KodeKab').attr('disabled', 'disabled');
                    } else if (value == 4 || value == 5 || value == 6) {
                        $('#KodeProv').attr('disabled', false);
                        $('#KodeKab').attr('disabled', 'disabled');
                    } else {
                        $('#KodeProv').attr('disabled', false);
                        $('#KodeKab').attr('disabled', false);
                    }
                }

                $('#btn-sync').click(function(){
                    var params = $('#input-nip').val();
                    sync(params);
		});
                
                function sync(params) {
                    $progressSync.trigger('loading-overlay:show');
                    ajaxRequest($baseUrl + 'master/operator/sync', { param : params }
                            , function(data) {
                                    if (data.IsError)
                                            new PNotify({
                                                    title: 'Error!',
                                                    text: data.Msg,
                                                    type: 'error'
                                            });
                                    else
                                    {
                                            new PNotify({
                                                    title: 'Success!',
                                                    text: data.Msg,
                                                    type: 'success'
                                            });
                                            $('#Username').val(data.username);
                                            $('#Nama').val(data.nama);
                                            $('#Nipbaru').val(data.nipbaru);
                                            $('#Niplama').val(data.niplama);
                                            $('#Satker').val(data.wilayah);
                                            $('#Email').val(data.email);
                                            $("#IsSync").select2("val", "1");
                                            SetSyncLabel(1);
                                    }

                            }, function(){
                                    $progressSync.trigger('loading-overlay:hide');
                            }, false);
                }
                
                
		function SetDefaultOperator()
		{
			$('input.simpan', $('#edit-operator')).val('');
			$('select.simpan', $('#edit-operator')).select2('val','',true);
			$('select#IsAktif', $('#edit-operator')).select2('val','1');
			if ($form.attr('data-action') == "add")
			{
				$('#KodeProv', $('#edit-operator')).select2('val', $('select#prov').val(), true);
				$('#KodeKab', $('#edit-operator')).select2('val', $('select#kab').val(), true);
                                
			}
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
				focus: '#IsSync',
				modal: true,
				callbacks: {
					beforeOpen: function() {
						if (act == "add")
							SetDefaultOperator();
						$('.panel-title', $dok).text(act == "add" ? 'TAMBAH OPERATOR' : 'EDIT OPERATOR');
					},
					afterOpen: function() {
						$('#IsSync').select2('focus');
//						$('#KodeProv').select2('focus');
					},
					open: function() {
						setTimeout(function(){$('#KodeProv').select2('focus');}, 100);
					}
				}
			});
		}
		
		$('#add-operator').click(function(){
			ShowOperator('add');
                        SetLevel();
		});
		
		$(document).on('click', '.edit', function(){
                    
			operatorEdit = JSON.parse($(this).parent().attr('data-operator'));
                        SetLevel();
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
		
		$("#Kode", $("#edit-operator")).numeric('integer');
		$("#Nama", $("#edit-operator")).alpha();
		
                function setProvKabAwal(){
                    if (userProv != null && userProv != "")
                    {
                            if (userKab != null && userKab != ""){
                                $('select#prov').select2('val', userProv, true);
                                $('select#prov').trigger('change');
                                setTimeout(function(){
                                    $('select#kab').select2('val', userKab, true);
                                    $('select#kab').trigger('change');
                                }, 100);
                                
                            }
                            else{
                                $('select#prov').select2('val', userProv);
                            }    
                    }
                    else
                    {
                            
                    }
                }
		$('select#prov').trigger('change');
		
		/* End Master Operator */
		
		$('#closeconfirm').popup({
			transition: 'all 0.3s'
		});
		
		$('#closeok').click(function(){
			$.magnificPopup.close();
			$('#closeconfirm').popup('hide');
		});
		
		$('body').removeClass("loading-overlay-showing");
	});
});
