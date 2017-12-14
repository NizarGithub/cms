define(['jquery','jquery.browser.mobile','bootstrap','nanoscroller','bootstrap.datepicker','bootstrap.confirmation','bootstrap.maxlength','magnific.popup','jquery.placeholder'
	,'jquery.validate','jquery.maskedinput','jquery.number','jquery.popupoverlay','jquery.alphanum','pnotify.custom','select2','markdown','to.markdown','bootstrap.markdown'
	,'jquery.dataTables','jquery.dataTables.tableTools','datatables'
	,'theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');
		var $elkecKualitas = $('#LoadingOverlayKecKualitas');
		
		var kecKualitasEdit = {};
		
		function setFilterKab(prov, id){
			var selectKab = id == "prov" ? '<option value="">- Pilih -</option>' : '<option value="">- Pilih -</option>';
			if (prov != "")
				$.each(kabByProv[prov], function(i,v){
					selectKab += '<option value="'+ v.KodeKab +'">'+ '[' + v.KodeProv + v.KodeKab + '] ' + v.NamaKab +'</option>';
				});
			if (id == "prov")
			{
				$("select#kab").html(selectKab);
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
			if ($('select#prov').val() != "" && $('select#kab').val() != "")
				$('#refresh', $('#frm-kecamatan-kualitas')).trigger('click');
			else
				$('tbody', $('#tabel-list')).html('');
			
		});
		
		$('#refresh', $('#frm-kecamatan-kualitas')).click(function(){
			$el.trigger('loading-overlay:show');
			var param = {};
			param['KodeProv'] = $('select#prov').val();
			param['KodeKab'] = $('select#kab').val();
			ajaxRequest($baseUrl + 'master/kecamatan-kualitas/list', { param : param }
			, function(data) {
				var tbody = '';
				if (data.length > 0)
				{
					$.each(data, function(i,v){
						tbody += "<tr><td class='text-center'>"+ v.Id +".</td><td class='text-center'>" + v.IdKec + "</td>"+
										"<td>"+ v.Deskripsi +"</td><td>"+ v.KetDok +"</td>"+
										"<td class='text-center' data-kecamatan-kualitas='"+ JSON.stringify(v) +"' data-id='"+ v.IdKec +"'><a class='on-default edit mr-xs' href='javascript:void(0)'><i class='fa fa-pencil'></i></a><a class='on-default text-danger del' href='javascript:void(0)' class='delete-row'><i class='fa fa-trash-o'></i></a></td></tr>";
					});
				}
				$('tbody', $('#tabel-list')).html(tbody);
				$('.del').confirmation({
					onConfirm: function(event, element) {
						var obj = element.parent();
						kecKualitasEdit = JSON.parse(obj.attr('data-kecamatan-kualitas'));
						$elkecKualitas.trigger('loading-overlay:show');
						ajaxRequest($baseUrl + 'master/kecamatan-kualitas/delkeckualitas', { param : kecKualitasEdit }
							, function(data) {
								if (data.IsError)
									new PNotify({
										title: 'Error!',
										text: data.Msg,
										type: 'error'
									});
								else
								{
									$('#refresh', $('#frm-kecamatan-kualitas')).trigger('click');
									new PNotify({
										title: 'Success!',
										text: data.Msg,
										type: 'success'
									});
									//obj.parent().remove();
								}
								
							}, function(){
								$elkecKualitas.trigger('loading-overlay:hide');
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
		
		var validobj = $("#edit-kecamatan-kualitas").validate({
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
				param['action'] = $("#edit-kecamatan-kualitas").attr('data-action');
				if (param['action'] == "edit")
					param['IdUser'] = kecKualitasEdit.IdUser;
				$('.simpan', $("#edit-kecamatan-kualitas")).each(function(){
					if (!/s2id/g.test($(this).attr('id')))
						param[$(this).attr('id')] = $(this).val().toUpperCase();
				});
				var err = '';
				if (param.KodeProv != "" && param.KodeKab != "" && param.Level == "1")
					err = 'Level pengguna untuk BPS Kabupaten tidak boleh berisi Administrator';
				else if (param.KodeProv != "" && param.KodeKab == "" && param.Level != "2")
					err = 'Level pengguna untuk BPS Provinsi hanya boleh berisi Supervisor';
				else if (param.KodeProv == "" && param.KodeKab == "" && param.Level != "1")
					err = 'Level pengguna untuk BPS RI hanya boleh berisi Administrator';
				
				if (err != "")
					alert (err);
				else
				{				
					$elkecKualitas.trigger('loading-overlay:show');
					ajaxRequest($baseUrl + 'master/kecamatan-kualitas/savekeckualitas', { param : param }
						, function(data) {
							if (data.IsError)
								new PNotify({
									title: 'Error!',
									text: data.Msg,
									type: 'error'
								});
							else
							{
								$('#refresh', $('#frm-kecamatan-kualitas')).trigger('click');
								new PNotify({
									title: 'Success!',
									text: data.Msg,
									type: 'success'
								});
								if (param['action'] == "add")
									SetDefaultKecKualitas();
								else
									$.magnificPopup.close();
							}
							
						}, function(){
							$elkecKualitas.trigger('loading-overlay:hide');
						}, false);
				}
            }
		});
		
		function SetDefaultKecKualitas()
		{
			$('input.simpan', $('#edit-kecamatan-kualitas')).val('');
			$('select.simpan', $('#edit-kecamatan-kualitas')).select2('val','',true);
			$('select#IsAktif', $('#edit-kecamatan-kualitas')).select2('val','1');
			if ($form.attr('data-action') == "add")
			{
				$('#KodeProv', $('#edit-kecamatan-kualitas')).select2('val', $('select#prov').val(), true);
				$('#KodeKab', $('#edit-kecamatan-kualitas')).select2('val', $('select#kab').val(), true);
			}
		}
		
		function ShowKecKualitas(act)
		{
			$dok = $('#tambah-kecamatan-kualitas');
			$form = $('#edit-kecamatan-kualitas');
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
							SetDefaultKecKualitas();
						$('.panel-title', $dok).html(act == "add" ? 'TAMBAH DOKUMEN - KUALITAS' : 'EDIT DOKUMEN - KUALITAS <span class="pull-right">#' + kecKualitasEdit.IdKec + ' - ' + kecKualitasEdit.Deskripsi + '</span>');
					},
					afterOpen: function() {
						//$('#KodeProv').select2('focus');
					},
					open: function() {
						//setTimeout(function(){$('#KodeProv').select2('focus');}, 100);
					}
				}
			});
		}
		
		$('#add-kecamatan-kualitas').click(function(){
			ShowKecKualitas('add');
		});
		
		$(document).on('click', '.edit', function(){
			kecKualitasEdit = JSON.parse($(this).parent().attr('data-kecamatan-kualitas'));
			$('.list-item', $('#daftar-dok')).removeClass('active-check');
			$('.fa-check', $('.list-item', $('#daftar-dok'))).remove();
			var arrIdDok = kecKualitasEdit.IdDok.split(';');
			$.each(arrIdDok, function(idx, item){
				$('.list-item[data-id="'+ item +'"]').addClass('active-check');
				$('.list-item[data-id="'+ item +'"]').append(' <i class="fa fa-check"></i>');
				
			});
			/* $('input.simpan', $('#edit-kecamatan-kualitas')).each(function(){
				$(this).val($.trim(kecKualitasEdit[$(this).attr('id')]));
			});
			$('select.simpan', $('#edit-kecamatan-kualitas')).each(function(){
				$(this).select2('val', $.trim(kecKualitasEdit[$(this).attr('id')]), true);
			}); */
			SetFilterDok();
			ShowKecKualitas('edit');
		});
		
		var SetFilterDok = function(){
			$('#jml-dok').text($('.active-check', $('#daftar-dok')).length);
			var selectDok = '<option value="">- Pilih -</option>';
			$('.active-check', $('#daftar-dok')).each(function(i,item){
				selectDok += '<option value="'+ $(item).attr('data-id') +'">'+ $(item).text() +'</option>';
			});
			$("select#KodeDok").html(selectDok);
			$('select#KodeDok').trigger('change');
		};
			
		
		$('#daftar-dok').on('click','.list-item',function(){
			var obj = $(this);
			if (obj.hasClass('active-check'))
			{
				obj.removeClass('active-check');
				$('.fa-check', obj).remove();
			}
			else
			{
				obj.addClass('active-check');
				obj.append(' <i class="fa fa-check"></i>');
			}
			SetFilterDok();
			//var id = obj.attr('data-id');
			//setKab(id);
		});
		
		$('#clear-dok').click(function(){
			$('.list-item', $('#daftar-dok')).removeClass('active-check');
			$('.fa-check', $('.list-item', $('#daftar-dok'))).remove();
			SetFilterDok();
		});
		
		$('#selectall-dok').click(function(){
			$('#clear-dok').trigger('click');
			$('.list-item', $('#daftar-dok')).addClass('active-check');
			$('.list-item', $('#daftar-dok')).append(' <i class="fa fa-check"></i>');
			SetFilterDok();
		});
		
		var $tableKualitas = $('#tabel-list-kualitas');
		
		var SetKualitas = function() {
			$elkecKualitas.trigger('loading-overlay:show');
			var param = {};
			param['IdDok'] = $('select#KodeDok').val();
			param['IdGroup'] = '';
			param['IdKom'] = '';
			ajaxRequest($baseUrl + 'master/kualitas/listkualitas', { param : param }
			, function(data) {
				if (typeof $tableKualitas.fnDestroy === 'function')
					$tableKualitas.fnDestroy();
				var tbody = '';
				if (data.length > 0)
				{
					$.each(data, function(i,v){
						tbody += "<tr>"+
									"<td>"+ v.IdKualitas +".</td><td>"+ v.KodeKualitas +"</td>"+
									"<td>"+ v.NamaKualitas +"</td><td>"+ v.Satuan +"</td><td>"+ v.NamaKom +"</td>"+
									"<td class='text-center' data-id='"+ v.IdKualitas +"'><a class='on-default select-k mr-xs btn btn-sm btn-default' href='javascript:void(0)'>Select</a></td>"+
								"</tr>";
					});
				}
				$('tbody', $('#tabel-list-kualitas')).html(tbody);
				$tableKualitas.dataTable({
					"oLanguage": {
						"sLengthMenu": "_MENU_ baris per halaman",
						"sInfo": "Menampilkan _START_ - _END_ dari _TOTAL_ kualitas",
						"sInfoFiltered": "(dari total _MAX_ kualitas)",
						"sZeroRecords": "Tidak ada kualitas yang sesuai",
						"sInfoEmpty": "Kualitas tidak ditemukan",
						"sSearch": ""
					}
				});
			}, function(){
				$elkecKualitas.trigger('loading-overlay:hide');
			}, false);
			return false;
		};
		
		$('select#KodeDok').change(function(){
			if ($(this).val() != "")
				SetKualitas();
			else
			{
				if (typeof $tableKualitas.fnDestroy === 'function')
					$tableKualitas.fnDestroy();
				$('tbody', $('#tabel-list-kualitas')).html('');
			}
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
		
		$('select#prov').trigger('change');
		
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
