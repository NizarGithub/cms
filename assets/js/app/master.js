define(['jquery','jquery.browser.mobile','bootstrap','nanoscroller','bootstrap.datepicker','bootstrap.confirmation'
	,'bootstrap.maxlength','magnific.popup','jquery.placeholder','jquery.validate','jquery.maskedinput','jquery.number'
	,'jquery.popupoverlay','jquery.alphanum','pnotify.custom','select2','markdown','to.markdown','bootstrap.markdown'
	,'jquery.dataTables','jquery.dataTables.tableTools','datatables'
	,'theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');
		
		/* ================= Start Master Wilayah ================= */
		
		function setKab(prov){
			var $area = $('#kab-area');
			var html = '<h5 class="alternative-font">Kabupaten</h5><div class="scrollable visible-slider colored-slider" style="max-height: 290px;"><div class="scrollable-content">';
			if (prov != "")
				$.each(kabByProv[prov], function(i,v){
					html += '<div class="highlight list-item" data-id="'+ v.KodeKab +'">'+ v.NamaKab +'</div>';
				});
			html += '</div></div>';
			$area.html(html);
			$('.scrollable', $area).attr('data-plugin-scrollable');
			$('.scrollable', $area).themePluginScrollable();
		}
		
		$('#prov-area').on('click','.list-item',function(){
			$('.list-item', $('#prov-area')).removeClass('active');
			var obj = $(this);
			var id = obj.attr('data-id');
			setKab(id);
			obj.addClass('active');
			$('#kec-area').html('<h5 class="alternative-font">Kecamatan</h5>');
		});
		
		$('#kab-area').on('click','.list-item',function(){
			$el.trigger('loading-overlay:show');	
			$('.list-item', $('#kab-area')).removeClass('active');
			var obj = $(this);
			var id = obj.attr('data-id');
			obj.addClass('active');
			
			var param = {};
			param['KodeProv'] = $('.list-item.active', $('#prov-area')).attr('data-id');
			param['KodeKab'] = $('.list-item.active', $('#kab-area')).attr('data-id');
			ajaxRequest($baseUrl + 'master/wilayah/kec', { param : param }, function(data) {
				
				var $area = $('#kec-area');
				var html = '<h5 class="alternative-font">Kecamatan</h5><div class="scrollable visible-slider colored-slider" style="max-height: 290px;"><div class="scrollable-content">';
				if (data.kec.length > 0)
					$.each(data.kec, function(i,v){
						html += '<div class="highlight list-item" data-id="'+ v.KodeKec +'">'+ v.NamaKec +'</div>';
					});
				html += '</div></div>';
				$area.html(html);
				$('.scrollable', $area).attr('data-plugin-scrollable');
				$('.scrollable', $area).themePluginScrollable();
				
			}, function(){
				$el.trigger('loading-overlay:hide');
			}, false);
		});
		
		/* ================= End Master Wilayah ================= */
		
		/* ================= Start Master Petugas ================= */
		
		var $elpetugas = $('#LoadingOverlayPetugas');
		var petugasEdit = {};
		
		function setFilterKab(prov, id){
			var selectKab = id == "prov" ? (wilUser.kab != false ? '' : '<option value="">- ALL -</option>') : '<option value="">- Pilih -</option>';
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
			$('#refresh', $('#frm-petugas')).trigger('click');
		});
		
		$('#refresh', $('#frm-petugas')).click(function(){
			$el.trigger('loading-overlay:show');
			var param = {};
			param['KodeProv'] = $('select#prov').val();
			param['KodeKab'] = $('select#kab').val();
			ajaxRequest($baseUrl + 'master/petugas/list', { param : param }
			, function(data) {
				var tbody = '';
				if (data.length > 0)
				{
					$.each(data, function(i,v){
						tbody += "<tr><td>"+ v.Id +".</td><td>["+ v.KodeProv + v.KodeKab +"] "+ v.NamaKab + ", " + v.NamaProv +"</td>"+
										"<td>"+ v.Kode +"</td><td>"+ v.Nama +"</td><td>"+ v.Ket +"</td>"+
										"<td class='text-center'>"+ (v.IsAktif == 1 ? "<span class='text-success'>Active</span>" : "<span class='text-danger'>In Active</span>") +"</td>"+
										(userLevel == 6 || userLevel == 9 ? "" : "<td class='text-center' data-petugas='"+ JSON.stringify(v) +"' data-id='"+ v.IdPetugas +"'><a class='on-default edit mr-xs' href='javascript:void(0)'><i class='fa fa-pencil'></i></a><a class='on-default text-danger del' href='javascript:void(0)' class='delete-row'><i class='fa fa-trash-o'></i></a></td>") +
										"</tr>";
					});
				}
				$('tbody', $('#tabel-list')).html(tbody);
				$('.del').confirmation({
					onConfirm: function(event, element) {
						var obj = element.parent();
						petugasEdit = JSON.parse(obj.attr('data-petugas'));
						$elpetugas.trigger('loading-overlay:show');
						ajaxRequest($baseUrl + 'master/petugas/delpetugas', { param : petugasEdit }
							, function(data) {
								if (data.IsError)
									new PNotify({
										title: 'Error!',
										text: data.Msg,
										type: 'error'
									});
								else
								{
									$('#refresh', $('#frm-petugas')).trigger('click');
									new PNotify({
										title: 'Success!',
										text: data.Msg,
										type: 'success'
									});
									//obj.parent().remove();
								}
								
							}, function(){
								$elpetugas.trigger('loading-overlay:hide');
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
		
		var validobj = $("#edit-petugas").validate({
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
				$elpetugas.trigger('loading-overlay:show');
				var param = {};
				param['action'] = $("#edit-petugas").attr('data-action');
				if (param['action'] == "edit")
					param['IdPetugas'] = petugasEdit.IdPetugas;
				$('.simpan', $("#edit-petugas")).each(function(){
					if (!/s2id/g.test($(this).attr('id')))
						param[$(this).attr('id')] = $(this).val().toUpperCase();
				});
				ajaxRequest($baseUrl + 'master/petugas/savepetugas', { param : param }
					, function(data) {
						if (data.IsError)
							new PNotify({
								title: 'Error!',
								text: data.Msg,
								type: 'error'
							});
						else
						{
							$('#refresh', $('#frm-petugas')).trigger('click');
							new PNotify({
								title: 'Success!',
								text: data.Msg,
								type: 'success'
							});
							if (param['action'] == "add")
								SetDefaultPetugas();
							else
								$.magnificPopup.close();
						}
						
					}, function(){
						$elpetugas.trigger('loading-overlay:hide');
					}, false);
            }
		});
		
		function SetDefaultPetugas()
		{
			$('input.simpan', $('#edit-petugas')).val('');
			$('select.simpan', $('#edit-petugas')).select2('val','',true);
			$('select#IsAktif', $('#edit-petugas')).select2('val','1');
			if ($form.attr('data-action') == "add")
			{
				$('#KodeProv', $('#edit-petugas')).select2('val', $('select#prov').val(), true);
				$('#KodeKab', $('#edit-petugas')).select2('val', $('select#kab').val(), true);
			}
		}
		
		function ShowPetugas(act)
		{
			$dok = $('#tambah-petugas');
			$form = $('#edit-petugas');
			$form.attr('data-action', act);
			$.magnificPopup.open({
				items: {
					src: $dok, // can be a HTML string, jQuery object, or CSS selector
					type: 'inline'
				},
				preloader: false,
				focus: '#KodeProv',
				modal: true,
				callbacks: {
					beforeOpen: function() {
						if (act == "add")
							SetDefaultPetugas();
						$('.panel-title', $dok).text(act == "add" ? 'TAMBAH PETUGAS' : 'EDIT PETUGAS');
					},
					open: function() {
						setTimeout(function(){$('#KodeProv').select2('focus');}, 100);
					}
				}
			});
		}
		
		$('#add-petugas').click(function(){
			ShowPetugas('add');
		});
		
		$(document).on('click', '.edit', function(){
			petugasEdit = JSON.parse($(this).parent().attr('data-petugas'));
			$('input.simpan', $('#edit-petugas')).each(function(){
				$(this).val(petugasEdit[$(this).attr('id')]);
			});
			$('select.simpan', $('#edit-petugas')).each(function(){
				$(this).select2('val', petugasEdit[$(this).attr('id')], true);
			});
			ShowPetugas('edit');
		});
		
		
		$(document).on("change", ".select2-offscreen", function () {
			if (!$.isEmptyObject(validobj) && !$.isEmptyObject(validobj.submitted)) {
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
		
		$("#Kode", $("#edit-petugas")).numeric('integer');
		$("#Nama", $("#edit-petugas")).alpha();
		
		if (wilUser.prov != false)
        {
            $('select#prov').select2('val', wilUser.prov, true);
        }
        else
            $('select#prov').trigger('change');
		
		/* ================= End Master Petugas ================= */
		
		/* ================= Start Master Komoditas ================= */
		
		if ($('#daftar-komoditas').length > 0){
			var $table = $('#daftar-komoditas');
			$table.dataTable({
				"oLanguage": {
					"sLengthMenu": "_MENU_ baris per halaman",
					"sInfo": "Menampilkan _START_ - _END_ dari _TOTAL_ komoditas",
					"sInfoFiltered": "(dari total _MAX_ komoditas)",
					"sZeroRecords": "Tidak ada komoditas yang sesuai",
					"sInfoEmpty": "Komoditas tidak ditemukan",
					"sSearch": ""
				}
			});
		}
		
		/* ================= End Master Komoditas ================= */
		
		/* ================= Start Master Kualitas ================= */
		
		var $elkualitas = $('#LoadingOverlayKualitas');
		var kualitasEdit = {};
		
		function setFilterGroup(dok, id){
			var selectGroup = id == "dok" ? '<option value="">- Pilih -</option>' : '<option value="">- Pilih -</option>';
			if (dok != "")
				$.each(groupByDok['_' + dok], function(i,v){
					selectGroup += '<option value="'+ v.IdGroup +'">'+ v.Deskripsi + (v.DeskParent != null ? ' [Parent: ' + v.DeskParent + ']' : '') +'</option>';
				});
			if (id == "dok")
			{
				$("select#group").html(selectGroup);
				$('select#group').trigger('change');
			}
			else
			{
				$("select#KodeGroup").html(selectGroup);
				$('select#KodeGroup').trigger('change');
			}
		}
		
		function setFilterKom(group, id){
			var selectKom = id == "group" ? '<option value="">- ALL -</option>' : '<option value="">- Pilih -</option>';
			if (group != "")
				$.each(komByGroup[group], function(i,v){
					selectKom += '<option value="'+ v.IdKom +'">'+ v.NamaKom +'</option>';
				});
			if (id == "group")
			{
				$("select#kom").html(selectKom);
				$('select#kom').trigger('change');
			}
			else
			{
				$("select#IdKom").html(selectKom);
				$('select#IdKom').trigger('change');
			}
		}
		
		$('select#dok').change(function(){
			setFilterGroup($(this).val(), $(this).attr('id'));
		});
		$('select#KodeDok').change(function(){
			setFilterGroup($(this).val(), $(this).attr('id'));
		});
		
		$('select#group').change(function(){
			setFilterKom($(this).val(), $(this).attr('id'));
		});
		$('select#KodeGroup').change(function(){
			setFilterKom($(this).val(), $(this).attr('id'));
		});
		
		$('select#kom').change(function(){
			if ($('select#dok').val() != "" && $('select#group').val() != "")
				$('#refresh', $('#frm-kualitas')).trigger('click');
			else
				$('tbody', $('#tabel-list')).html('');
		});
		
                $('select#IdKom').change(function(){
			var param=$(this).val();
                        var act = $("#edit-kualitas").attr('data-action');
                        if(act == 'add' && param!=''){
                            ajaxRequest($baseUrl + 'master/kualitas/getkodekom', { param : param }
					, function(data) {
                                            $('#IdKomoditas').val(data.KodeKomoditas);
                                            $('#NmrKualitas').val(data.NewKode);
                                            $('#NamaKualitas').focus();
					}, function(){
					}, false);
                        }
		});
                
		$('#refresh', $('#frm-kualitas')).click(function(){
			$el.trigger('loading-overlay:show');
			var param = {};
			param['IdDok'] = $('select#dok').val();
			param['IdGroup'] = $('select#group').val();
			param['IdKom'] = $('select#kom').val();
			ajaxRequest($baseUrl + 'master/kualitas/listkualitas', { param : param }
			, function(data) {
				var tbody = '';
				if (data.length > 0)
				{
					$.each(data, function(i,v){
						tbody += "<tr>"+
                                                        "<td>"+ v.IdKualitas +".</td><td>"+ v.KodeKualitas +"</td>"+
                                                        "<td>"+ v.NamaKualitas +"</td><td>"+ v.Satuan +"</td><td>"+ v.NamaKom +"</td>"+
                                                        "<td class='text-center'>"+ (v.IsAktif == 1 ? "<span class='text-success'>Digunakan</span>" : "<span class='text-danger'>Tidak Digunakan</span>") +"</td>"+
                                                        "<td class='text-center'>"+ (v.IsApproved == 1 ? "<span class='text-success'>Disetujui</span>" : "<span class='text-danger'>Belum Disetujui</span>") +"</td>"+
                                                        "<td>"+ v.CreatedBy +"</td><td>"+ v.ApprovedBy +"</td>";
                                                    if (userLevel != 6 && userLevel != 9)
                                                    {
	                                                    tbody += "<td class='text-center' data-kualitas='"+ JSON.stringify(v) +"' data-id='"+ v.IdKualitas +"'>";
		                                                if(v.CreatedBy!='ADMINISTRATOR' || (v.CreatedBy=='ADMINISTRATOR' && (userLevel == 1 || userLevel == 2 || userLevel == 3)))
			                                                tbody += "<a class='on-default edit-k mr-xs' href='javascript:void(0)'><i class='fa fa-pencil'></i></a>"+
			                                                        "<a class='on-default text-danger del mr-xs' href='javascript:void(0)' class='delete-row'><i class='fa fa-trash-o'></i></a>";
		                                                if(v.CreatedBy!='ADMINISTRATOR' && (userLevel == 1 || userLevel == 2 || userLevel == 3))
		                                                    tbody +="<a class='on-default approve' href='javascript:void(0)'><i class='fa fa-thumbs-up'></i></a>";
		                                                tbody +="</td>";
		                                            }
                                                tbody += "</tr>";
					});
				}
				$('tbody', $('#tabel-list')).html(tbody);
				$('.del', $('.page-kualitas')).confirmation({
                                        placement: "left",
					onConfirm: function(event, element) {
						var obj = element.parent();
						kualitasEdit = JSON.parse(obj.attr('data-kualitas'));
						$elkualitas.trigger('loading-overlay:show');
						ajaxRequest($baseUrl + 'master/kualitas/delkualitas', { param : kualitasEdit }
							, function(data) {
								if (data.IsError)
									new PNotify({
										title: 'Error!',
										text: data.Msg,
										type: 'error'
									});
								else
								{
									$('#refresh', $('#frm-kualitas')).trigger('click');
									new PNotify({
										title: 'Success!',
										text: data.Msg,
										type: 'success'
									});
									//obj.parent().remove();
								}
								
							}, function(){
								$elkualitas.trigger('loading-overlay:hide');
							}, false);
						return false;
					},
					onCancel: function() {
						
					}
				});
                                $('.approve', $('.page-kualitas')).confirmation({
                                        btnOkLabel: "Approve",
                                        placement: "left",
					onConfirm: function(event, element) {
						var obj = element.parent();
						kualitasEdit = JSON.parse(obj.attr('data-kualitas'));
						$elkualitas.trigger('loading-overlay:show');
						ajaxRequest($baseUrl + 'master/kualitas/appkualitas', { param : kualitasEdit }
							, function(data) {
								if (data.IsError)
									new PNotify({
										title: 'Error!',
										text: data.Msg,
										type: 'error'
									});
								else
								{
									$('#refresh', $('#frm-kualitas')).trigger('click');
									new PNotify({
										title: 'Success!',
										text: data.Msg,
										type: 'success'
									});
									//obj.parent().remove();
								}
								
							}, function(){
								$elkualitas.trigger('loading-overlay:hide');
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
		
		var validobjKualitas = $("#edit-kualitas").validate({
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
				$elkualitas.trigger('loading-overlay:show');
				var param = {};
				param['action'] = $("#edit-kualitas").attr('data-action');
				if (param['action'] == "edit")
					param['IdKualitas'] = kualitasEdit.IdKualitas;
				$('.simpan', $("#edit-kualitas")).each(function(){
					if (!/s2id/g.test($(this).attr('id')))
						param[$(this).attr('id')] = $(this).val().toUpperCase();
				});
				ajaxRequest($baseUrl + 'master/kualitas/savekualitas', { param : param }
					, function(data) {
						if (data.IsError)
							new PNotify({
								title: 'Error!',
								text: data.Msg,
								type: 'error'
							});
						else
						{
							$('#refresh', $('#frm-kualitas')).trigger('click');
							new PNotify({
								title: 'Success!',
								text: data.Msg,
								type: 'success'
							});
							if (param['action'] == "add")
								SetDefaultKualitas();
							else
								$.magnificPopup.close();
						}
						
					}, function(){
						$elkualitas.trigger('loading-overlay:hide');
					}, false);
            }
		});
		
		function SetDefaultKualitas()
		{
			$('input.simpan', $('#edit-kualitas')).val('');
			$('select.simpan', $('#edit-kualitas')).select2('val','',true);
			$('select#KodeDok', $('#edit-kualitas')).select2('val','',true);
			$('select#KodeGroup', $('#edit-kualitas')).select2('val','',true);
			$('select#IsAktif', $('#edit-kualitas')).select2('val','1');
			if ($form.attr('data-action') == "add")
			{
				$('#KodeDok', $('#edit-kualitas')).select2('val', $('select#dok').val(), true);
				$('#KodeGroup', $('#edit-kualitas')).select2('val', $('select#group').val(), true);
				$('#IdKom', $('#edit-kualitas')).select2('val', $('select#kom').val(), true);
                                $('#IdKomoditas').val($('select#kom').val());
			}
		}
		
		function ShowKualitas(act)
		{
			$dok = $('#tambah-kualitas');
			$form = $('#edit-kualitas');
			$form.attr('data-action', act);
			$.magnificPopup.open({
				items: {
					src: $dok, // can be a HTML string, jQuery object, or CSS selector
					type: 'inline'
				},
				preloader: false,
				focus: '#KodeDok',
				modal: true,
				callbacks: {
					beforeOpen: function() {
						if (act == "add")
							SetDefaultKualitas();
						$('.panel-title', $dok).text(act == "add" ? 'TAMBAH KUALITAS' : 'EDIT KUALITAS');
					},
					open: function() {
						setTimeout(function(){$('#KodeDok').select2('focus');}, 100);
					}
				}
			});
		}
		
		$('#add-kualitas').click(function(){
			ShowKualitas('add');
		});
		
		$(document).on('click', '.edit-k', function(){
			kualitasEdit = JSON.parse($(this).parent().attr('data-kualitas'));
			$('input.simpan', $('#edit-kualitas')).each(function(){
				$(this).val(kualitasEdit[$(this).attr('id')]);
			});
			$('#KodeDok', $('#edit-kualitas')).select2('val', $('select#dok').val(), true);
			$('#KodeGroup', $('#edit-kualitas')).select2('val', $('select#group').val(), true);
                        $('#IdKomoditas').val($('select#kom').val());
			$('select.simpan', $('#edit-kualitas')).each(function(){
				$(this).select2('val', kualitasEdit[$(this).attr('id')], true);
			});
			ShowKualitas('edit');
		});
		
		
		$(document).on("change", ".select2-offscreen", function () {
			if (!$.isEmptyObject(validobjKualitas) && !$.isEmptyObject(validobjKualitas.submitted)) {
				validobjKualitas.form();
			}
		});
		
		$('select#dok').trigger('change');
		
		/* ================= End Master Kualitas ================= */
		
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
