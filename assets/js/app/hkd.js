define(['jquery','jquery.browser.mobile','bootstrap','nanoscroller','bootstrap.datepicker','bootstrap.confirmation','magnific.popup','jquery.placeholder'
	,'jquery.validate','jquery.maskedinput','jquery.number','jquery.popupoverlay','pnotify.custom','select2','markdown','to.markdown','bootstrap.markdown','theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');
		
		$('.scrollable', $('#dokHKD')).css('height', $(document).height() - 210);
		
		var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
		//var notice;
		var master = {};
		var dataDok = {};
		var error = {};
		var dokDel = {};
		
		function setFilterKab(prov){
			var selectKab = '<option value=""></option>';
			if (prov != "")
				$.each(kabByProv[prov], function(i,v){
					selectKab += '<option value="'+ v.KodeKab +'">'+ '[' + v.KodeProv + v.KodeKab + '] ' + v.NamaKab +'</option>';
				});
			$("select#kab").html(selectKab);
			if (wilUser.kab != false && prov != "")
            {
            	setTimeout(function(){
            		$('select#kab').select2('val', wilUser.kab, true);
            	}, 100);
                
            }
            else
                $('select#kab').trigger('change');
		}
		
		function formatPetugasSelection(item) { return item.Kode; };
		function formatPetugasResult(item) { return '[' + item.Kode + '] ' + item.Nama; };
		
		function setPetugas($obj, source, $t)
		{
			$obj.select2({
					data:{ results: source, text: formatPetugasResult },
					id: function(obj) {return obj.IdPetugas;  },
					formatSelection: formatPetugasSelection,
					formatResult: formatPetugasResult,
					allowClear: true,
					placeholder: "..."
			}).on("change", function(e) {
				//console.log(e);
				$t.val(typeof e.added !== 'undefined' ? e.added['Nama'] : "");
			});
		};

		function setKualitasDiff(dataBlok)
		{
			var tbody = [];
			var komTemp = '';
			if (typeof dataBlok !== "undefined")
			{
				$.each(dataBlok, function(i, v){
					if (v.IsDeleted == 0)
					{
						if (v.Harga != v.HargaPrev)
						{
							var namaKom = v.NamaKom;
							if (komTemp == v.NamaKom)
								namaKom = '';
							else
								komTemp = v.NamaKom;
							
							tbody.push({sorter: v.Sorter, data: '<tr class="'+ (v.IsApproved == 0 ? 'not-approved' : '') +'">' +
							'<td>' + namaKom + '</td><td>' + v.NamaKualitas + '</td><td>' + v.Satuan + '</td><td>' + v.KodeKualitas + '</td>' +
							'<td class="text-right"><strong><span class="number">'+ (v.Harga == null ? '' : v.Harga) +'</span></strong></td>' +
								'<td class="text-right"><strong><span class="number">'+ (v.HargaPrev == null ? '' : v.HargaPrev) +'</span></strong></td>' +
							'</tr>'});
						}
					}
				});
			}
			tbody = tbody.sort(function(a, b){
				if (a.sorter < b.sorter)
					return -1;
				if (a.sorter > b.sorter)
					return 1;
				return 0;
			});
			$('tbody', $('#ringkasan')).append(tbody.map(function(elem){
				return elem.data;
			}).join(''));
		}
		
		function setBlok($table, dataBlok)
		{
			var tbody = [];
			var komTemp = '';
			if (typeof dataBlok !== "undefined")
				$.each(dataBlok, function(i, v){
					if (v.IsDeleted == 0)
					{
						var namaKom = v.NamaKom;
						if (komTemp == v.NamaKom)
							namaKom = '';
						else
							komTemp = v.NamaKom;
						if (v.IdKualitas == 0)
						{
							tbody.push({sorter: v.Sorter, data: '<tr>' +
							'<td colspan="8">' + (v.IdParent == null ? '<h5><strong>' + namaKom + '</strong></h5>' : '<strong>' + namaKom + '</strong>') + '</td>' +
							'</tr>'});
						}
						else
						{
							var h = parseFloat(v.Harga == null ? 0 : v.Harga);
							var hp = parseFloat(v.HargaPrev == null ? 0 : v.HargaPrev);
							var percent = ((h-hp)/hp * 100).toFixed(2);
							tbody.push({sorter: v.Sorter, data: '<tr class="'+ (v.IsApproved == 0 ? 'not-approved' : '') +'">' +
							'<td>' + namaKom + '</td><td>' + v.NamaKualitas + '</td><td>' + v.Satuan + '</td><td>' + v.KodeKualitas + '</td>' +
							'<td><div class="row"><div class="col-md-9 pull-right"><input id="Harga-'+ v.IdKualitas +'" name="Harga-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.Harga == null ? '' : v.Harga) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>' +
							'<td><div class="row"><div class="col-md-9 pull-right"><input id="HargaPrev-'+ v.IdKualitas +'" name="HargaPrev-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.HargaPrev == null ? '' : v.HargaPrev) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>' +
							'<td><div class="pull-right perubahan" id="Change-'+ v.IdKualitas +'">'+ (percent == 'NaN' ? '-' : percent) +'</div></td>'+
							'<td class="text-center" data-kualitas="'+ v.IdKualitas +'"><a class="on-default text-danger del-kualitas" href="javascript:void(0)" class="delete-row"><i class="fa fa-trash-o"></i></a></td>'+
							'</tr>'});
						}
					}
				});
			tbody = tbody.sort(function(a, b){
				if (a.sorter < b.sorter)
					return -1;
				if (a.sorter > b.sorter)
					return 1;
				return 0;
			});
			$('tbody', $table).html(tbody.map(function(elem){
				return elem.data;
			}).join(''));
			$('.del-kualitas').confirmation({
				placement: "left",
				onConfirm: function(event, element) {
					var obj = element.parent();
					var kualitas = parseInt(obj.attr('data-kualitas'));
					var page = $('.tab-pane.active', $('#formHKD')).attr('id');
					if (page == "page3")
					{
						if (dataDok.blok4[kualitas])
							dataDok.blok4[kualitas].IsDeleted = 1;
						moveKualitas(dataDok.blok4[kualitas], dataDok.qblok4, kualitas, null, null);
						setBlok($('table#blok4'), dataDok.blok4);
						setFilterKualitas(dataDok.qblok4, $("#t-kualitas"));
					}
					
					//obj.parent().remove();
					
					return false;
				},
				onCancel: function() {
					
				}
			});
		};
		
		$('select#prov').change(function(){
			setFilterKab($(this).val());
		});
		
		$('select#kab').change(function(){
			$('#refresh').trigger('click');
		});
		
		if (wilUser.prov != false)
        {
            $('select#prov').select2('val', wilUser.prov, true);
        }
        else
			$('select#prov').trigger('change');
		
		var validobj = $("#frm-hkd").validate({
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
				$el.trigger('loading-overlay:show');
				var param = {};
				param['KodeProv'] = $('select#prov').val();
				param['KodeKab'] = $('select#kab').val();
				param['Tahun'] = $('select#tahun').val();
				param['Bulan'] = $('select#bulan').val();
				ajaxRequest($baseUrl + 'entri/harga-konsumen-perdesaan/list', { param : param }, function(data) {
					var html = '';
					var idx = 1;
					$.each(data, function(i,v){
						var classRow = v.StatusDok0 == '-' && v.StatusDok1 == '-' && v.StatusDok2 == '-' ? 'text-muted' : 'text-dark';
						var actionEdit = '', actionDelete = '', action = '';
						if (classRow == 'text-dark')
						{
							actionEdit = '<div class="btn-group">'+
										'<button type="button" class="mr-xs btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Edit <span class="caret"></span></button>'+
										'<ul class="dropdown-menu" role="menu" style="min-width: 0px;" data-act="edit" data-kec="'+ v.IdKec +'">';
							actionDelete = '<div class="btn-group">'+
										'<button type="button" class="mr-xs btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown">Delete <span class="caret"></span></button>'+
										'<ul class="dropdown-menu" role="menu" style="min-width: 0px;" data-act="delete" data-kec="'+ v.IdKec +'">';		
							if (v.StatusDok0 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[0].IdDok +'">'+ dok[0].Tipe +'</a></li>'; 
							if (v.StatusDok1 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[1].IdDok +'">'+ dok[1].Tipe +'</a></li>'; 
							if (v.StatusDok2 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[2].IdDok +'">'+ dok[2].Tipe +'</a></li>'; 
							actionEdit += action + '</ul>'+
									'</div>';
							actionDelete += action + '</ul>'+
									'</div>';
						}							
						html += '<tr class="'+ classRow +'">'+
									'<td>' + idx + '</td><td>' + v.Deskripsi + '</td>'+ 
									'<td class="center '+ (v.StatusDok0 == 'E' ? 'danger' : v.StatusDok0 == 'C' ? 'success' : '') +'">' + v.StatusDok0 + '</td>'+
									'<td class="center '+ (v.StatusDok1 == 'E' ? 'danger' : v.StatusDok1 == 'C' ? 'success' : '') +'">' + v.StatusDok1 + '</td>'+
									'<td class="center '+ (v.StatusDok2 == 'E' ? 'danger' : v.StatusDok2 == 'C' ? 'success' : '') +'">' + v.StatusDok2 + '</td>'+
									'<td class="center">'+ actionEdit + actionDelete +'</td>'+
								'</tr>'; 
						idx++;
					});
					$('tbody', $('#tabel-list')).html(html).attr('data-tahun', param['Tahun']).attr('data-bulan', param['Bulan']);
				}, function(){
					$el.trigger('loading-overlay:hide');
				}, true, stack_bar_bottom);
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

		var setStatusDok = function() {
			$('#StatusDok').text("").removeClass("text-danger text-success");
			$('#StatusDok').text(dataDok.data.StatusDok == null ? '' : 'Status Dok: ' + dataDok.data.StatusDok);
			$('#StatusDok').addClass(dataDok.data.StatusDok == "E" ? 'text-danger' : 'text-success');
		}
		
		$('body').on('click','a.action-dok', function()
		{
			var $this = $(this);
			var $dok = $('#dokHKD');
			var $form = $('#formHKD');
			var param = {};
			param['IdDok'] = $this.attr('data-dok');
			param['IdKec'] = $this.parent().parent().attr('data-kec');
			param['Tahun'] = $('tbody', $('#tabel-list')).attr('data-tahun');
			param['Bulan'] = $('tbody', $('#tabel-list')).attr('data-bulan');
			var action = $this.parent().parent().attr('data-act');
			//alert (JSON.stringify(param));
			if (action == "edit")
			{
				$.magnificPopup.open({
					items: {
						src: $dok, // can be a HTML string, jQuery object, or CSS selector
						type: 'inline'
					},
					preloader: false,
					focus: '#NamaPasar',
					modal: true,
					callbacks: {
						beforeOpen: function() {
							//$('body').trigger('loading-overlay:show');
							//$('.panel-title', $dok).text('SURVEI HARGA PERDESAAN');
							$('.active', $form).removeClass('active');
							$('li:first', $form).addClass('active');
							$('.tab-pane:first', $form).addClass('active');
							$('#add-kualitas').attr('disabled','disabled');
							$('.has-error').removeClass('has-error');
							$('#StatusDok').text("").removeClass("text-danger text-success");
							$('div.error-msg').remove();
						},
						open: function() {
							$('body').trigger('loading-overlay:show');
							$('.scrollable', $dok).attr('data-plugin-scrollable');
							$('.scrollable', $dok).themePluginScrollable();
							$('.editor-text', $dok).attr('data-plugin-markdown-editor');
							$('.editor-text', $dok).themePluginMarkdownEditor();
							ajaxRequest($baseUrl + 'entri/harga-konsumen-perdesaan/' + action, { param : param }, function(data) 
							{
								master.pencacah = data.Pencacah;
								master.pengawas = data.Pengawas;
								dataDok.dok = data.Dok;
								dataDok.data = data.Data;
								dataDok.blok4 = data.Blok4;
								dataDok.qblok4 = data.QBlok4;
								setPetugas($("#KodePencacah"), master.pencacah, $("#NamaPencacah"));
								setPetugas($("#KodePemeriksa"), master.pengawas, $("#NamaPemeriksa"));
								$('.title-dok', $dok).html('SURVEI HARGA KONSUMEN PERDESAAN (' + dataDok.dok.Deskripsi + ') ' + '<span class="pull-right">'+ dataDok.dok.Tipe +'</span>');
								$.each(dataDok.data, function(i, v){
									$('#' + i).text(v);
									$('#' + i).val(v);
								});
								$("#KodePencacah").select2('val', dataDok.data.IdPencacah, true);
								$("#KodePemeriksa").select2('val', dataDok.data.IdPemeriksa, true);
								setBlok($('table#blok4'), dataDok.blok4);
								$('.rupiah').number( true, 0, ',', '.' );
								setStatusDok();
								$("#NamaPasar").focus();

							}, function(){
								$('body').trigger('loading-overlay:hide');
							}, false, stack_bar_bottom);
							//setTimeout(function(){$('body').trigger('loading-overlay:hide');}, 2000);
						}
					}
				});
			}
			else if (action == 'delete')
			{
				dokDel = param;
				var $confirm = $('#confirmDel');
				$.magnificPopup.open({
					items: {
						src: $confirm, // can be a HTML string, jQuery object, or CSS selector
						type: 'inline'
					},
					preloader: false,
					modal: true,
					callbacks: {
						beforeOpen: function() {
							var $tr = $this.closest('tr');
							var NamaKec = $tr.find("td:eq(1)").text();
							var Dok = $this.text();
							$('.modal-text', $confirm).html('<p>Apakah Anda yakin akan menghapus data ini?<br/>Kecamatan: '+ NamaKec +'<br/>Dokumen: '+ Dok +'</p>');
						},
						open: function() {
							
						}
					}
				});
			}
			return false;
		});

		$('#tahun').select2('val', tahunNow, true);
		$('#bulan').select2('val', bulanNow, true);
		$('#prov').select2('focus');
		
		$('select#bulan').change(function(){
			$('#refresh').trigger('click');
		});
		
		$('#closeconfirm').popup({
			transition: 'all 0.3s'
		});
		
		$('#closeok').click(function(){
			$.magnificPopup.close();
			$('#frmkualitas').popup('hide');
			$('#closeconfirm').popup('hide');
		});
		
		$(document).on('click', '.modal-dismiss', function (e) {
			e.preventDefault();
			
			$.magnificPopup.close();
			$('#frmkualitas').popup('hide');
		});

		$(document).on('click', '.modal-confirm-del', function (e) {
			e.preventDefault();		
			$('body').trigger('loading-overlay:show');
			ajaxRequest($baseUrl + 'entri/harga-konsumen-perdesaan/delete', { param : dokDel }, function(data) {
				
				$('#refresh').trigger('click');
				
				new PNotify({
					title: 'Success!',
					text: data.msg,
					type: 'success',
					delay: 2000
				});

				$.magnificPopup.close();

			}, function(){
				$('body').trigger('loading-overlay:hide');
			}, false, stack_bar_bottom);
			
		});

		$(document).on('click', '.modal-dismiss-del', function (e) {
			e.preventDefault();		
			dokDel = {};
			$.magnificPopup.close();
		});

		error.mandatoryFields = [
			{ Id: "NamaPasar", Kode: "NamaPasar", Label: "Nama Pasar", Page: 1, Type: "text" }
			, { Id: "HariPasar", Kode: "HariPasar", Label: "Hari Pasar", Page: 1, Type: "text" }
			, { Id: "IdPencacah", Kode: "KodePencacah", Label: "NIP Pencacah", Page: 1, Type: "select2" }
			, { Id: "IdPemeriksa", Kode: "KodePemeriksa", Label: "NIP Pemeriksa", Page: 1, Type: "select2" }
			, { Id: "TglCacah", Kode: "TglCacah", Label: "Tanggal Pencacahan", Page: 1, Type: "date" }
			, { Id: "TglPeriksa", Kode: "TglPeriksa", Label: "Tanggal Pemeriksaan", Page: 1, Type: "date" }
		];

		var changePage = function(page) {
			$('.tab-pane', $('#formHKD')).removeClass('active');
			$('.nav-tabs li', $('#formHKD')).removeClass('active');
			$('#page' + page, $('#formHKD')).addClass('active');
			$('a[href="#page'+ page +'"]', $('#formHKD')).parent().addClass('active');
		}

		var validateForm = function(listKualitas) {
			/* start run validasi */
			var isError = false;

			var fieldFocus = null;
			$('div.error-msg').remove();

			/* check mandatory */

			$.each(error.mandatoryFields, function(i, v){
				if (isNullOrEmpty(dataDok.data[v.Id]))
				{
					var objParent = $('#' + v.Kode).parent();
					if (v.Type == "date")
						objParent = objParent.parent();
					$('#' + v.Kode).parent().addClass('has-error');
					objParent.append('<div class="error-msg text-danger" style="margin-top:5px;">'+ v.Label +' tidak boleh kosong.</div>');
					if (fieldFocus == null)
					{
						fieldFocus = v;
						fieldFocus.InputId = v.Kode;
					}
				}
				else
				{
					$('#' + v.Kode).parent().removeClass('has-error');
				}
			});

			/* check rule kualitas */

			$.each(listKualitas, function(idx, blok){
				$.each(blok, function(i, v){
					if (v.IsDeleted == 0)
					{
						var objParent = $('#Harga-' + v.IdKualitas).parent();
						objParent.removeClass('has-error');
						var isErr = false;
						if (isNullOrEmpty(v.Harga))
						{
							objParent.addClass('has-error').append('<div class="error-msg text-danger" style="margin-top:5px;">Isian tidak boleh kosong.</div>');
							isErr = true;
						}
						else
						{
							var change = parseFloat($('#Change-' + v.IdKualitas).text());
							if (!isErr)
							{
								if (change != 'NaN' && (change < v.Minimal || change > v.Maksimal))
								{
									objParent.addClass('has-error').append('<div class="error-msg text-danger" style="margin-top:5px;">Nilai perubahan berada di luar range ('+ v.Minimal + ' s.d. '+ v.Maksimal +')</div>');
									isErr = true;
								}
							}
							if (!isErr)
							{
								if (change != 'NaN' && change < 0 && v.DisallowedDown == 1)
								{
									objParent.addClass('has-error').append('<div class="error-msg text-danger" style="margin-top:5px;">Nilai untuk komoditas ini tidak boleh turun.</div>');
									isErr = true;
								}
							}
						}
						
						if (isErr)
						{
							if (fieldFocus == null)
							{
								fieldFocus = v;
								fieldFocus.Type = 'text';
								fieldFocus.Page = idx + 3;
								fieldFocus.InputId = 'Harga-' + v.IdKualitas;
							}
						}
					}
				});
			});

			if (fieldFocus != null)
			{
				changePage(fieldFocus.Page);
				if (fieldFocus.Type == 'select2')
					$('#' + fieldFocus.InputId).select2('focus');
				else
					$('#' + fieldFocus.InputId).focus();

				isError = true;
			}



			return isError;
			/* end run validasi */
		}

		$(document).on('click', '.modal-confirm', function (e) {
			e.preventDefault();
			$('body').trigger('loading-overlay:show');
			dataDok.data.NamaPasar = $('#NamaPasar').val();
			dataDok.data.HariPasar = $('#HariPasar').val();
			dataDok.data.Catatan = $('#Catatan').val();
			dataDok.data.IdPencacah = $('#KodePencacah').val();
			dataDok.data.IdPemeriksa = $('#KodePemeriksa').val();
			dataDok.data.TglCacah = convertDate($('#TglCacah').val());
			dataDok.data.TglPeriksa = convertDate($('#TglPeriksa').val());
			dataDok.data.StatusDok = "E";
			var blok4 = [];
			$.each(dataDok.blok4, function(k,v){
				if (v.IdKualitas != "0")
				{
					blok4.push(v);
				}
			});
			
			dataDok.data.StatusDok = validateForm([blok4]) ? "E" : "C";

			ajaxRequest($baseUrl + 'entri/harga-konsumen-perdesaan/save', { data: dataDok.data, blok4: JSON.stringify(blok4) }
			, function(data) {

				setStatusDok();
				
				if (dataDok.data.StatusDok == "C")
				{
					$.magnificPopup.close();
					$('#frmkualitas').popup('hide');
				}

				$('#refresh').trigger('click');
				
				new PNotify({
					title: 'Success!',
					text: data.msg,
					type: 'success',
					delay: dataDok.data.StatusDok == "C" ? 3000 : 1000
				});
				
			}, function(){
				$('body').trigger('loading-overlay:hide');
			}, false, stack_bar_bottom);
		});
		
		$('#nav-page2').click(function(){
			$('tbody', $('#ringkasan')).html('');
			setKualitasDiff(dataDok.blok4);
			$('span.number').number( true, 0, ',', '.' );
		});
		
		$(document).on('click', '#add-kualitas', function (e) {
			e.preventDefault();
			
		});
		
		function setFilterKualitas(data, $select){
			var selectKualitas = '<option value=""></option>';
			var tempGroup = 'XX';
			var idx = 0;
			$.each(data, function(i,v)
			{
				if (tempGroup != v.IdGroup)
				{
					if (idx > 0)
						selectKualitas += '</optgroup>';
					selectKualitas += '<optgroup label="'+ v.Deskripsi +'">';
					tempGroup = v.IdGroup;
				}
				selectKualitas += '<option value="'+ i +'">'+ '[' + v.KodeKualitas + '] ' + v.NamaKualitas + ', ' + v.NamaKom +'</option>';
				idx++;
			});
			selectKualitas += '</optgroup>';
			$select.html(selectKualitas);
			$select.select2('val', '', true);
			//$select.trigger('change');
		}
		
		$('#frmkualitas').popup({
			backgroundactive: true,
			vertical: 'top',
			transition: 'all 0.3s',
			beforeopen: function(){
				$('#msg-error').html('').hide();
				$('#msg-success').html('').hide();
				$('#Harga-Add, #HargaPrev-Add').val('');
				$('#title', $(this)).text('Tambah Kualitas ' + $('li.active a', $('#formHKD')).text());
				$('.table', $(this)).hide();
				switch($('.tab-pane.active', $('#formHKD')).attr('id'))
				{
					case "page3":
						$('#table-blok').show();
						setFilterKualitas(dataDok.qblok4, $("#t-kualitas"));
						break;
					default:
						break;
				}
				
				$(this).attr('data-page', $('.tab-pane.active', $('#formHKD')).attr('id'));
			},
			opentransitionend: function(){
				$('#t-kualitas').select2('focus');

				$('#frmkualitas').on('keydown', 'input, select, textarea', function(e) {
				    var self = $(this)
				      , form = self.parents('#frmkualitas')
				      , focusable
				      , next
				      ;
				    if (e.keyCode == 13) {
				    	
				        focusable = form.find('input,select,textarea,button').filter(':visible');
				        next = focusable.eq(focusable.index(this)+1);
				        if (next.length) {
				            next.focus();
				        } else {
				            //form.submit();
				        }

				        return false;
				    }
				});
			}
		});
		
		$('.select-kualitas').change(function(){
			var page = $('#frmkualitas').attr('data-page');
			var value = $(this).val();
			if (value != "")
				switch(page)
				{
					case "page3":
						$('#t-satuan').text(dataDok.qblok4[value].Satuan);
						break;
					default:
						break;
				}
			else
			{
				$('#t-satuan').text('');
			}
			$('.rupiah').number( true, 0, ',', '.' );
		});
		
		function moveKualitas(objSource, objDest, kualitas, harga, hargaprev)
		{
			//console.log(objSource);
			if (objDest[kualitas])
				delete objDest[kualitas];

			objDest[kualitas] = {
				"NamaKom": objSource.NamaKom,
				"NamaKualitas": objSource.NamaKualitas,
				"Satuan": objSource.Satuan,
				"KodeKualitas": objSource.KodeKualitas,
				"Harga": harga,
				"HargaPrev": hargaprev,
				"IdKualitas": objSource.IdKualitas,
				"IdKom": objSource.IdKom,
				"KodeKom": objSource.KodeKom,
				"IdGroup": objSource.IdGroup,
				"Deskripsi": objSource.Deskripsi,
				"IdParent": objSource.IdParent,
				"IdSection": objSource.IdSection,
				"IdDok": objSource.IdDok,
				"IsUsed": objSource.IsUsed,
				"IsApproved": objSource.IsApproved,
				"Sorter": objSource.Sorter,
				"IsDeleted": 0,
				"Minimal": objSource.Minimal,
				"Maksimal": objSource.Maksimal,
				"DisallowedDown": objSource.DisallowedDown
			};
		}
		
		$('#tambah-kualitas').click(function(){
			$('#msg-error').html('').hide();
			$('#msg-success').html('').hide();
			var err = [];
			var field = '';
			var page = $('#frmkualitas').attr('data-page');
			
			if ($('#t-kualitas').val() == "")
			{
				err.push('<li>Kode/Nama Kualitas belum dipilih.</li>');
				field = '#t-kualitas';
			}
			if ($('#Harga-Add').val() == "" || $('#Harga-Add').val() == "0")
			{
				err.push('<li>Harga Bulan Pencacahan belum ada isian.</li>');
				if (field == '')
					field = '#Harga-Add';
			}
			if ($('#HargaPrev-Add').val() == "" || $('#HargaPrev-Add').val() == "0")
			{
				err.push('<li>Harga Bulan Sebelumnya belum ada isian.</li>');
				if (field == '')
					field = '#HargaPrev-Add';
			}
			if (err.length > 0)
			{
				$('#msg-error').html('<ul>' + err.join('') + '</ul>').show();
				if (field == '#t-kualitas')
					$(field).select2('focus');
				else
					$(field).focus();
			}
			else
			{
				var kualitas = $('#t-kualitas').val();
				var deskripsi = $('#t-kualitas option:selected').text();
				if (page == "page3")
				{
					moveKualitas(dataDok.qblok4[kualitas], dataDok.blok4, kualitas, $('#Harga-Add').val(), $('#HargaPrev-Add').val());
					setBlok($('table#blok4'), dataDok.blok4);
					delete dataDok.qblok4[kualitas];
					setFilterKualitas(dataDok.qblok4, $("#t-kualitas"));
				}
				$('#t-kualitas').select2('focus');
				$('#Harga-Add, #HargaPrev-Add').val('');
				$('.rupiah').number( true, 0, ',', '.' );
				$('#msg-success').html('Data Kualitas <strong>' + deskripsi + '</strong> berhasil ditambahkan').show();
			}
		});
		
		$(document).on('focusout', '.rupiah', function(){
			var obj = $(this);
			var data = obj.attr('id').split('-');
			switch(obj.attr('data-section'))
			{
				case '1':
					dataDok.blok4[data[1]][data[0]] = obj.val();
					break;
				default:
					break;
			}
			//console.log(dataDok.blokUpah);
		});
		
		$('a', $('.nav-tabs')).click(function(){
			var obj = $(this);
			if (obj.hasClass('active-add'))
				$('#add-kualitas').removeAttr('disabled');
			else
				$('#add-kualitas').attr('disabled','disabled');
		});
		
		$('.rupiah').number( true, 0, ',', '.' );
		$(document).on('change', '.rupiah', function(){
			var k = $(this).attr('data-kualitas');
			var h = parseFloat($('#Harga-' + k).val());
			var hp = parseFloat($('#HargaPrev-' + k).val());
			var percent = ((h-hp)/hp * 100).toFixed(2);
			$('#Change-' + k).text(percent == 'NaN' ? '-' : percent);
		});

		$('body').on('keydown', 'input, select, textarea', function(e) {
		    var self = $(this)
		      , form = self.parents('form:eq(0)')
		      , focusable
		      , next
		      ;
		    if (e.keyCode == 13) {
		    	if (self.attr('id') == 'TglPeriksa')
		    	{
		    		changePage(3);
		    		$('a[href="#page3"]', $('.nav-tabs')).trigger('click');
		    		//$('.datepicker').remove();
		    	}
		    	if (self.attr('id') == 'Catatan')
		    	{
		    		$('#btnSimpan').focus();
		    	}
		    	else
		    	{
			        focusable = form.find('input,select,textarea').filter(':visible');
			        next = focusable.eq(focusable.index(this)+1);
			        if (next.length) {
			            next.focus();
			        } else {
			            //form.submit();
			        }
			    }
		        
		        return false;
		    }
		});

		$('body').removeClass("loading-overlay-showing");
	});
});

var myEvent = window.attachEvent || window.addEventListener;
var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; // make IE7, IE8 compatible

myEvent(chkevent, function(e) { // For >=IE7, Chrome, Firefox
	var confirmationMessage = ' ';  // a space
	(e || window.event).returnValue = confirmationMessage;
	return confirmationMessage;
}); 
