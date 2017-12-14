define(['jquery','jquery.browser.mobile','bootstrap','nanoscroller','bootstrap.datepicker','bootstrap.confirmation','magnific.popup','jquery.placeholder'
	,'jquery.validate','jquery.maskedinput','jquery.number','jquery.popupoverlay','pnotify.custom','select2','markdown','to.markdown','bootstrap.markdown','theme','theme.custom','theme.init'
]
, function($) {
   $(function(){
		var $el = $('#LoadingOverlayApi');

		$('.scrollable', $('#dokHD')).css('height', $(document).height() - 210);
		
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
		
		function setKualitasDiff(dataBlok, isUpah)
		{
			if (typeof isUpah === "undefined") isUpah = false;
			var tbody = [];
			var komTemp = '';
			if (typeof dataBlok !== "undefined")
			{
				if (isUpah)
					$.each(dataBlok, function(i, v){
						if (v.IsDeleted == 0)
						{
							if (v.Kode == "4")
							{
								var namaKom = v.NamaKomView;
								if (komTemp == v.NamaKomView)
									namaKom = '';
								else
									komTemp = v.NamaKomView;
								if (v.Harga != v.HargaPrev)
								{
									tbody.push({sorter: v.Sorter, data: '<tr class="'+ (v.IsApproved == 0 ? 'not-approved' : '') +'">' +
									'<td>' + namaKom + '</td><td>' + v.NamaKualitas + '</td><td>' + v.Satuan + '</td><td>' + v.KodeKualitasView + '</td>' +
									'<td class="text-right"><strong><span class="number">'+ (v.Harga == null ? '' : v.Harga) +'</span></strong></td>' +
									'<td class="text-right"><strong><span class="number">'+ (v.HargaPrev == null ? '' : v.HargaPrev) +'</span></strong></td>' +
									'</tr>'});
								}
							}
						}
					});
				else
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
					var page = $('.tab-pane.active', $('#formHD')).attr('id');
					if (page == "page3")
					{
						if (dataDok.blok4[kualitas])
							dataDok.blok4[kualitas].IsDeleted = 1;
						moveKualitas(dataDok.blok4[kualitas], dataDok.qblok4, kualitas, null, null);
						setBlok($('table#blok4'), dataDok.blok4);
						setFilterKualitas(dataDok.qblok4, $("#t-kualitas"));
					}
					else
					{
						if (dataDok.blok5[kualitas])
							dataDok.blok5[kualitas].IsDeleted = 1;
						moveKualitas(dataDok.blok5[kualitas], dataDok.qblok5, kualitas, null, null);
						setBlok($('table#blok5'), dataDok.blok5);
						setFilterKualitas(dataDok.qblok5, $("#t-kualitas"));
					}
					
					//obj.parent().remove();
					
					return false;
				},
				onCancel: function() {
					
				}
			});
		};
		
		function setUpah()
		{
			var tbodyBlokUpah = [];
			var komTemp = '';
			var kodeKomTemp = 'XX000';
			var trCol = {};
			var trSorter = {};
			if (typeof dataDok.blokUpah !== "undefined")
			{
				$.each(dataDok.blokUpah, function(i, v){
					if (v.IsDeleted == 0)
					{
						var namaKom = v.NamaKomView;
						if (komTemp == v.NamaKomView)
							namaKom = '';
						else
							komTemp = v.NamaKomView;
						switch(v.Kode)
						{
							case "1":
								trCol[v.KodeKom] = [];
								trSorter[v.KodeKom] = v.Sorter;
								if (v.IdKualitas == 0)
								{
									trCol[v.KodeKom].push('<tr><td colspan="11">' + (v.IdParent == null ? '<h5><strong>' + namaKom + '</strong></h5>' : '<strong>' + namaKom + '</strong>') + '</td></tr>');
								}
								else
								{
									trCol[v.KodeKom].push('<tr class="'+ (v.IsApproved == 0 ? 'not-approved' : '') +'"><td>' + namaKom + '</td><td>' + v.NamaKualitas + '</td>');
									trCol[v.KodeKom].push('<td></td>');
									trCol[v.KodeKom].push('<td>' + v.KodeKualitasView + '</td>');
									trCol[v.KodeKom].push('<td><div class="row"><div class="col-md-12"><input id="Harga-'+ v.IdKualitas +'" name="Harga-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.Harga == null ? '' : v.Harga) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>');
									trCol[v.KodeKom].push('<td></td>');
									trCol[v.KodeKom].push('<td></td>');
									trCol[v.KodeKom].push('<td></td>');
									trCol[v.KodeKom].push('<td></td>');
									trCol[v.KodeKom].push('<td></td>');
									trCol[v.KodeKom].push('</tr>');
								}
								kodeKomTemp = v.KodeKom;
								break;
							case "2":
								trCol[v.KodeKom][4] = '<td><div class="row"><div class="col-md-12"><input id="Harga-'+ v.IdKualitas +'" name="Harga-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.Harga == null ? '' : v.Harga) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>';
								break;
							case "3":
								trCol[v.KodeKom][5] = '<td><div class="row"><div class="col-md-12"><input id="Harga-'+ v.IdKualitas +'" name="Harga-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.Harga == null ? '' : v.Harga) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>';
								break;
							case "4":
								var h = parseFloat(v.Harga == null ? 0 : v.Harga);
								var hp = parseFloat(v.HargaPrev == null ? 0 : v.HargaPrev);
								var percent = ((h-hp)/hp * 100).toFixed(2);
								if (/borongan/i.test(v.NamaKualitas))
									trCol[v.KodeKom][1] = '<td><div class="row"><div class="col-md-6"><input id="NilaiSatuan-'+ v.IdKualitas +'" name="NilaiSatuan-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.NilaiSatuan == null ? '' : v.NilaiSatuan) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div>JAM</div><div class="row mt-sm"><div class="col-md-6"><input id="NilaiSatuan2-'+ v.IdKualitas +'" name="NilaiSatuan2-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.NilaiSatuan2 == null ? '' : v.NilaiSatuan2) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div>ORANG</div></td>';
								else
									trCol[v.KodeKom][1] = '<td><div class="row"><div class="col-md-6"><input id="NilaiSatuan-'+ v.IdKualitas +'" name="NilaiSatuan-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.NilaiSatuan == null ? '' : v.NilaiSatuan) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div>' + v.Satuan + '</div></td>';
								trCol[v.KodeKom][6] = '<td><div class="row"><div class="col-md-12"><input id="Harga-'+ v.IdKualitas +'" name="Harga-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.Harga == null ? '' : v.Harga) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>';
								trCol[v.KodeKom][7] = '<td><div class="row"><div class="col-md-12"><input id="HargaPrev-'+ v.IdKualitas +'" name="HargaPrev-'+ v.IdKualitas +'" class="form-control right rupiah" type="text" value="'+ (v.HargaPrev == null ? '' : v.HargaPrev) +'" data-section="'+ v.IdSection +'" data-kualitas="'+ v.IdKualitas +'"></div></div></td>';
								trCol[v.KodeKom][8] = '<td><div class="pull-right perubahan" id="Change-'+ v.IdKualitas +'">'+ (percent == 'NaN' ? '-' : percent) +'</div></td>';
								trCol[v.KodeKom][9] = '<td class="text-center"><a class="on-default text-danger del-kualitas-upah" href="javascript:void(0)" class="delete-row"><i class="fa fa-trash-o"></i></a></td>';
								break;
						}
					}
				});
				
				$.each(trCol, function(i, v){
					tbodyBlokUpah.push({sorter: trSorter[i], data: v.join('')});
				});
			}
			tbodyBlokUpah = tbodyBlokUpah.sort(function(a, b){
				if (a.sorter < b.sorter)
					return -1;
				if (a.sorter > b.sorter)
					return 1;
				return 0;
			});
			//console.log(trCol);
			//$('tbody', $('table#blokUpah')).html(tbodyBlokUpah);
			$('tbody', $('table#blokUpah')).html(tbodyBlokUpah.map(function(elem){
				return elem.data;
			}).join(''));
			$('.del-kualitas-upah').confirmation({
				placement: "left",
				onConfirm: function(event, element) {
					var obj = element.closest( "tr" );
					
					$('input.rupiah', obj).each(function(i, item){
						var kualitas = parseInt($(item).attr('data-kualitas'));
						dataDok.blokUpah[kualitas].IsDeleted = 1;
						moveKualitasUpah(dataDok.blokUpah[kualitas], dataDok.qblokUpah, dataDok.blokUpah[kualitas].KodeKualitas + '-' + kualitas, { NilaiSatuan: null, NilaiSatuan2: null, Harga: null, HargaPrev: null });
					});
					
					setUpah();
					setFilterKualitasUpah(dataDok.qblokUpah, $("#t-kualitas-upah"));
					
					//obj.parent().remove();
					
					return false;
				},
				onCancel: function() {
					
				}
			});
		}
		
		function setResponden()
		{
			var tbody = '';
			var tResponden = {};
			$.each(dataDok.blok4, function(i,v)
			{
				if (v.IdResponden != null)
				{
					if (typeof tResponden[v.IdResponden] === "undefined")
						tResponden[v.IdResponden] = {deskripsi: [], kode: {b4: [], b5: [], bu: []}};
					tResponden[v.IdResponden].deskripsi.push(v.NamaKom + ' (' + v.KodeKualitas + ')');
					tResponden[v.IdResponden].kode.b4.push(v.IdKualitas);
				}
			});
			$.each(dataDok.blok5, function(i,v)
			{
				if (v.IdResponden != null)
				{
					if (typeof tResponden[v.IdResponden] === "undefined")
						tResponden[v.IdResponden] = {deskripsi: [], kode: {b4: [], b5: [], bu: []}};
					tResponden[v.IdResponden].deskripsi.push(v.NamaKom + ' (' + v.KodeKualitas + ')');
					tResponden[v.IdResponden].kode.b5.push(v.IdKualitas);
				}
			});
			$.each(dataDok.blokUpah, function(i,v)
			{
				if (v.IdResponden != null)
				{
					if (typeof tResponden[v.IdResponden] === "undefined")
						tResponden[v.IdResponden] = {deskripsi: [], kode: {b4: [], b5: [], bu: []}};
					tResponden[v.IdResponden].kode.bu.push(v.IdKualitas);
					if (v.Kode == "4")
					{
						tResponden[v.IdResponden].deskripsi.push(v.NamaKomView + ' (' + v.KodeKualitasView + ')');
					}
				}
			});
			$.each(tResponden, function(i, v){
				var r = $.grep(master.responden, function(e){ return e.IdResponden == i; });
				tbody += '<tr><td class="" style="text-align: center" data-responden="'+ i +'" data-b4="'+ v.kode.b4.join('|') +'" data-b5="'+ v.kode.b5.join('|') +'" data-bu="'+ v.kode.bu.join('|') +'"><a class="on-default edit-responden mr-xs" href="javascript:void(0)"><i class="fa fa-pencil"></i></a><a class="on-default del-responden text-danger" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td><td>'+ (r.length == 1 ? r[0].NamaResponden : '-') +'</td><td>'+ (r.length == 1 ? r[0].NamaDesa : '-') 
						+'</td><td>' + v.deskripsi.sort().join('; ') + '</td></tr>';
			});
			$('tbody', $('table#blokResponden')).html(tbody);
			$('.del-responden').confirmation({
				onConfirm: function(event, element) {
					var obj = element.parent();
					var responden = obj.attr('data-responden');
					var b4 = obj.attr('data-b4').split('|');
					var b5 = obj.attr('data-b5').split('|');
					var bu = obj.attr('data-bu').split('|');
					if (obj.attr('data-b4') != "")
						$.each(b4, function(i,v){
							dataDok.blok4[v].IdResponden = null;
						});
					if (obj.attr('data-b5') != "")
						$.each(b5, function(i,v){
							dataDok.blok5[v].IdResponden = null;
						});
					if (obj.attr('data-bu') != "")
						$.each(bu, function(i,v){
							dataDok.blokUpah[v].IdResponden = null;
						});
					obj.parent().remove();
					
					return false;
				},
				onCancel: function() {
					
				}
			});
		}
		
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
		
		var validobj = $("#frm-hd").validate({
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
				ajaxRequest($baseUrl + 'entri/harga-perdesaan/list', { param : param }
					, function(data) {
						var html = '';
						var idx = 1;
						$.each(data, function(i,v){
							var classRow = v.StatusDok3 == '-' && v.StatusDok4 == '-' && v.StatusDok5 == '-' && v.StatusDok6 == '-' && 
								v.StatusDok7 == '-' && v.StatusDok8 == '-' && v.StatusDok9 == '-' ? 'text-muted' : 'text-dark';
							var actionEdit = '', actionDelete = '', action = '';
							if (classRow == 'text-dark')
							{
								actionEdit = '<div class="btn-group">'+
											'<button type="button" class="mr-xs btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Edit <span class="caret"></span></button>'+
											'<ul class="dropdown-menu" role="menu" style="min-width: 0px;" data-act="edit" data-kec="'+ v.IdKec +'">';
								actionDelete = '<div class="btn-group">'+
											'<button type="button" class="mr-xs btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown">Delete <span class="caret"></span></button>'+
											'<ul class="dropdown-menu" role="menu" style="min-width: 0px;" data-act="delete" data-kec="'+ v.IdKec +'">';		
								if (v.StatusDok3 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[0].IdDok +'">'+ dok[0].Tipe +'</a></li>'; 
								if (v.StatusDok4 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[1].IdDok +'">'+ dok[1].Tipe +'</a></li>'; 
								if (v.StatusDok5 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[2].IdDok +'">'+ dok[2].Tipe +'</a></li>'; 
								if (v.StatusDok6 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[3].IdDok +'">'+ dok[3].Tipe +'</a></li>'; 
								if (v.StatusDok7 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[4].IdDok +'">'+ dok[4].Tipe +'</a></li>'; 
								if (v.StatusDok8 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[5].IdDok +'">'+ dok[5].Tipe +'</a></li>'; 
								if (v.StatusDok9 != '-') action += '<li><a class="action-dok" href="javascript:void(0)" data-dok="'+ dok[6].IdDok +'">'+ dok[6].Tipe +'</a></li>'; 
								actionEdit += action + '</ul>'+
										'</div>';
								actionDelete += action + '</ul>'+
										'</div>';
							}							
							html += '<tr class="'+ classRow +'">'+
										'<td>' + idx + '</td><td>' + v.Deskripsi + '</td>'+ 
										'<td class="center '+ (v.StatusDok3 == 'E' ? 'danger' : v.StatusDok3 == 'C' ? 'success' : '') +'">' + v.StatusDok3 + '</td>'+
										'<td class="center '+ (v.StatusDok4 == 'E' ? 'danger' : v.StatusDok4 == 'C' ? 'success' : '') +'">' + v.StatusDok4 + '</td>'+
										'<td class="center '+ (v.StatusDok5 == 'E' ? 'danger' : v.StatusDok5 == 'C' ? 'success' : '') +'">' + v.StatusDok5 + '</td>'+
										'<td class="center '+ (v.StatusDok6 == 'E' ? 'danger' : v.StatusDok6 == 'C' ? 'success' : '') +'">' + v.StatusDok6 + '</td>'+
										'<td class="center '+ (v.StatusDok7 == 'E' ? 'danger' : v.StatusDok7 == 'C' ? 'success' : '') +'">' + v.StatusDok7 + '</td>'+
										'<td class="center '+ (v.StatusDok8 == 'E' ? 'danger' : v.StatusDok8 == 'C' ? 'success' : '') +'">' + v.StatusDok8 + '</td>'+
										'<td class="center '+ (v.StatusDok9 == 'E' ? 'danger' : v.StatusDok9 == 'C' ? 'success' : '') +'">' + v.StatusDok9 + '</td>'+
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
			var $dok = $('#dokHD');
			var $form = $('#formHD');
			var param = {};
			dokDel = {};
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
					focus: '#KodeKec',
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
							ajaxRequest($baseUrl + 'entri/harga-perdesaan/' + action, { param : param }, function(data) {
									master.pencacah = data.Pencacah;
									master.pengawas = data.Pengawas;
									master.responden = data.Responden;
									dataDok.dok = data.Dok;
									dataDok.data = data.Data;
									dataDok.blok4 = data.Blok4;
									dataDok.blok5 = data.Blok5;
									dataDok.blokUpah = data.BlokUpah;
									dataDok.qblok4 = data.QBlok4;
									dataDok.qblok5 = data.QBlok5;
									dataDok.qblokUpah = data.QBlokUpah;
									setPetugas($("#KodePencacah"), master.pencacah, $("#NamaPencacah"));
									setPetugas($("#KodePemeriksa"), master.pengawas, $("#NamaPemeriksa"));
									$('.title-dok', $dok).html('SURVEI HARGA PRODUSEN PERDESAAN (' + dataDok.dok.Deskripsi + ') ' + '<span class="pull-right">'+ dataDok.dok.Tipe +'</span>');
									$.each(dataDok.data, function(i, v){
										$('#' + i).text(v);
										$('#' + i).val(v);
									});
									$("#KodePencacah").select2('val', dataDok.data.IdPencacah, true);
									$("#KodePemeriksa").select2('val', dataDok.data.IdPemeriksa, true);
									setBlok($('table#blok4'), dataDok.blok4);
									setBlok($('table#blok5'), dataDok.blok5);
									setUpah();
									//setResponden();
									$('.rupiah').number( true, 0, ',', '.' );
									setStatusDok();
									setTimeout(function() {
										$("#KodePencacah").select2('focus');
									}, 100);

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
			$('#frmresponden').popup('hide');
			$('#closeconfirm').popup('hide');
		});
		
		$(document).on('click', '.modal-dismiss', function (e) {
			e.preventDefault();
			
			$.magnificPopup.close();
			$('#frmkualitas').popup('hide');
			$('#frmresponden').popup('hide');
		});

		$(document).on('click', '.modal-confirm-del', function (e) {
			e.preventDefault();		
			$('body').trigger('loading-overlay:show');
			ajaxRequest($baseUrl + 'entri/harga-perdesaan/delete', { param : dokDel }, function(data) {
				
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
			{ Id: "IdPencacah", Kode: "KodePencacah", Label: "NIP Pencacah", Page: 1, Type: "select2" }
			, { Id: "IdPemeriksa", Kode: "KodePemeriksa", Label: "NIP Pemeriksa", Page: 1, Type: "select2" }
			, { Id: "TglCacah", Kode: "TglCacah", Label: "Tanggal Pencacahan", Page: 1, Type: "date" }
			, { Id: "TglPeriksa", Kode: "TglPeriksa", Label: "Tanggal Pemeriksaan", Page: 1, Type: "date" }
			, { Id: "NamaResponden", Kode: "NamaResponden", Label: "Nama Responden", Page: 6, Type: "text" }
			, { Id: "NamaDesa", Kode: "NamaDesa", Label: "Nama Desa", Page: 6, Type: "text" }
			, { Id: "JenisKomoditas", Kode: "JenisKomoditas", Label: "Jenis Barang/Komoditas yang Dihasilkan", Page: 6, Type: "text" }
		];

		var changePage = function(page) {
			$('.tab-pane', $('#formHD')).removeClass('active');
			$('.nav-tabs li', $('#formHD')).removeClass('active');
			$('#page' + page, $('#formHD')).addClass('active');
			$('a[href="#page'+ page +'"]', $('#formHD')).parent().addClass('active');
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
					if (v.IsDeleted == 0 && (typeof v.Kode === "undefined" || (typeof v.Kode !== "undefined" && v.Kode == "4")))
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
							if (v.Kode == "4")
							{
								var group = $.grep(blok, function(e){ return e.KodeKom == v.KodeKom; });
								if (group[0] && group[1] && group[2])
								{
									if (parseFloat(group[0].Harga) + parseFloat(group[1].Harga) + parseFloat(group[2].Harga) != parseFloat(v.Harga))
									{
										objParent.addClass('has-error').append('<div class="error-msg text-danger" style="margin-top:5px;">Isian tidak sama dengan penjumlahan kolom 5 + 6 + 7 -> '+ (parseFloat(group[0].Harga) + parseFloat(group[1].Harga) + parseFloat(group[2].Harga)) +'</div>');
										isErr = true;
									}
								}
							}
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
			dataDok.data.NamaResponden = $('#NamaResponden').val();
			dataDok.data.NamaDesa = $('#NamaDesa').val();
			dataDok.data.JenisKomoditas = $('#JenisKomoditas').val();
			dataDok.data.Catatan = $('#Catatan').val();
			dataDok.data.IdPencacah = $('#KodePencacah').val();
			dataDok.data.IdPemeriksa = $('#KodePemeriksa').val();
			dataDok.data.TglCacah = convertDate($('#TglCacah').val());
			dataDok.data.TglPeriksa = convertDate($('#TglPeriksa').val());
			dataDok.data.StatusDok = "E";
			var blok4 = [];
			var blok5 = [];
			var blokUpah = [];
			$.each(dataDok.blok4, function(k,v){
				if (v.IdKualitas != "0")
				{
					blok4.push(v);
				}
			});
			$.each(dataDok.blok5, function(k,v){
				if (v.IdKualitas != "0")
				{
					blok5.push(v);
				}
			});
			$.each(dataDok.blokUpah, function(k,v){
				if (v.IdKualitas != "0")
				{
					blokUpah.push(v);
				}
			});

			dataDok.data.StatusDok = validateForm([blok4, blok5, blokUpah]) ? "E" : "C";

			ajaxRequest($baseUrl + 'entri/harga-perdesaan/save', { data: dataDok.data, blok4: JSON.stringify(blok4)
				, blok5: JSON.stringify(blok5), blokUpah: JSON.stringify(blokUpah) }
			, function(data) {

				setStatusDok();
				
				if (dataDok.data.StatusDok == "C")
				{
					$.magnificPopup.close();
					$('#frmkualitas').popup('hide');
					$('#frmresponden').popup('hide');
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
			setKualitasDiff(dataDok.blok5);
			setKualitasDiff(dataDok.blokUpah, true);
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
		
		function setFilterKualitasUpah(data, $select){
			var selectKualitas = '<option value=""></option>';
			var id = [];
			$.each(data, function(i,v)
			{
				id.push(v.KodeKualitas + '-' + v.IdKualitas);
				if (v.Kode == "4")
				{
					selectKualitas += '<option value="'+ id.join('|') +'">'+ '[' + v.KodeKom + '] ' + v.NamaKualitas + ', ' + v.NamaKomView +'</option>';
					id = [];
				}
			});
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
				$('#Harga-Add, #HargaPrev-Add, #Harga101-Add, #Harga102-Add, #Harga103-Add, #Harga104-Add, #HargaPrev104-Add').val('');
				$('#title', $(this)).text('Tambah Kualitas ' + $('li.active a', $('#formHD')).text());
				$('.table', $(this)).hide();
				switch($('.tab-pane.active', $('#formHD')).attr('id'))
				{
					case "page3":
						$('#table-blok').show();
						setFilterKualitas(dataDok.qblok4, $("#t-kualitas"));
						break;
					case "page4":
						$('#table-blok').show();
						setFilterKualitas(dataDok.qblok5, $("#t-kualitas"));
						break;
					case "page5":
						$('#table-upah').show();
						setFilterKualitasUpah(dataDok.qblokUpah, $("#t-kualitas-upah"));
						break;
					default:
						break;
				}
				
				$(this).attr('data-page', $('.tab-pane.active', $('#formHD')).attr('id'));
			},
			opentransitionend: function(){
				if ($('.tab-pane.active', $('#formHD')).attr('id') == "page5")
					$('#t-kualitas-upah').select2('focus');
				else
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
					case "page4":
						$('#t-satuan').text(dataDok.qblok5[value].Satuan);
						break;
					case "page5":
						value = value.split('|');
						if (/borongan/i.test(dataDok.qblokUpah[value[0]].NamaKualitas))
							$('#t-satuan-upah').html('<div class="row"><div class="col-md-6"><input id="NilaiSatuan-Add" name="NilaiSatuan-Add" class="form-control right rupiah" type="text" value=""></div>JAM</div><div class="row mt-sm"><div class="col-md-6"><input id="NilaiSatuan2-Add" name="NilaiSatuan2-Add" class="form-control right rupiah" type="text" value=""></div>ORANG</div>');
						else
							$('#t-satuan-upah').html('<div class="row"><div class="col-md-6"><input id="NilaiSatuan-Add" name="NilaiSatuan-Add" class="form-control right rupiah" type="text" value=""></div>' + dataDok.qblokUpah[value[0]].Satuan + '</div>');
						break;
					default:
						break;
				}
			else
			{
				$('#t-satuan').text('');
				$('#t-satuan-upah').html('');
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
				"IdResponden": null,
				"Minimal": objSource.Minimal,
				"Maksimal": objSource.Maksimal,
				"DisallowedDown": objSource.DisallowedDown
			};
		}
		
		function moveKualitasUpah(objSource, objDest, kualitas, nilai)
		{
			//console.log(objSource);
			if (objDest[kualitas])
				delete objDest[kualitas];

			objDest[kualitas] = {
				"NamaKom":objSource.NamaKom,
				"NamaKomView":objSource.NamaKomView,
				"NamaKualitas":objSource.NamaKualitas,
				"NilaiSatuan":nilai.NilaiSatuan,
				"NilaiSatuan2":nilai.NilaiSatuan2,
				"Satuan":objSource.Satuan,
				"KodeKualitas":objSource.KodeKualitas,
				"KodeKualitasView":objSource.KodeKualitasView,
				"Harga":nilai.Harga,
				"HargaPrev":nilai.HargaPrev,
				"IdKualitas":objSource.IdKualitas,
				"IdKom":objSource.IdKom,
				"KodeKom":objSource.KodeKom,
				"IdGroup":objSource.IdGroup,
				"Deskripsi":objSource.Deskripsi,
				"IdParent":objSource.IdParent,
				"IdSection":objSource.IdSection,
				"IdDok":objSource.IdDok,
				"Kode":objSource.Kode,
				"IsUsed":objSource.IsUsed,
				"IsApproved":objSource.IsApproved,
				"Sorter":objSource.Sorter,
				"IsDeleted": 0,
				"IdResponden": null,
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
			if (page == "page5")
			{
				if ($('#t-kualitas-upah').val() == "")
				{
					err.push('<li>Kode/Nama Kualitas belum dipilih.</li>');
					field = '#t-kualitas-upah';
				}
				if ($('#NilaiSatuan-Add').val() == "" || $('#NilaiSatuan-Add').val() == "0")
				{
					err.push('<li>Satuan belum ada isian.</li>');
					if (field == '')
						field = '#NilaiSatuan-Add';
				}
				if ($('#NilaiSatuan2-Add').length > 0 && ($('#NilaiSatuan2-Add').val() == "" || $('#NilaiSatuan2-Add').val() == "0"))
				{
					err.push('<li>Satuan Orang untuk Borongan belum ada isian.</li>');
					if (field == '')
						field = '#NilaiSatuan2-Add';
				}
				/* if ($('#Harga101-Add').val() == "" || $('#Harga101-Add').val() == "0")
					err.push('<li>Harga Bulan Pencacahan Berupa Uang (101) belum ada isian.</li>');
				if ($('#Harga102-Add').val() == "" || $('#Harga102-Add').val() == "0")
					err.push('<li>Harga Bulan Pencacahan Makan + Minum + Rokok (102) belum ada isian.</li>');
				if ($('#Harga103-Add').val() == "" || $('#Harga103-Add').val() == "0")
					err.push('<li>Harga Bulan Pencacahan Lainnya (103) belum ada isian.</li>'); */
				var jml = parseInt($('#Harga101-Add').val() == "" ? 0 : $('#Harga101-Add').val(), 10) + 
					parseInt($('#Harga102-Add').val() == "" ? 0 : $('#Harga102-Add').val(), 10) +
					parseInt($('#Harga103-Add').val() == "" ? 0 : $('#Harga103-Add').val(), 10);
				if (jml != parseInt($('#Harga104-Add').val() == "" ? 0 : $('#Harga104-Add').val(), 10))
				{
					err.push('<li>Penjumlahan Harga Bulan Pencacahan (101), (102), (103) tidak sama dengan (104) dimana '+ jml +' <> '+ (parseInt($('#Harga104-Add').val() == "" ? 0 : $('#Harga104-Add').val(), 10)) +'.</li>');
					if (field == '')
						field = '#Harga104-Add';
				}
				if ($('#Harga104-Add').val() == "" || $('#Harga104-Add').val() == "0")
				{
					err.push('<li>Harga Bulan Pencacahan Jumlah (104) belum ada isian.</li>');
					if (field == '')
						field = '#Harga104-Add';
				}
				if ($('#HargaPrev104-Add').val() == "" || $('#HargaPrev104-Add').val() == "0")
				{
					err.push('<li>Upah Bulan Sebelumnya belum ada isian.</li>');
					if (field == '')
						field = '#HargaPrev104-Add';
				}
				if (err.length > 0)
				{
					$('#msg-error').html('<ul>' + err.join('') + '</ul>').show();
					if (field == '#t-kualitas-upah')
						$(field).select2('focus');
					else
						$(field).focus();
				}
				else
				{
					var kualitas = $('#t-kualitas-upah').val();
					kualitas = kualitas.split('|');
					var deskripsi = $('#t-kualitas-upah option:selected').text();

					moveKualitasUpah(dataDok.qblokUpah[kualitas[0]], dataDok.blokUpah, kualitas[0].split('-')[1], { NilaiSatuan: null, NilaiSatuan2: null, Harga: $('#Harga101-Add').val(), HargaPrev: null });
					moveKualitasUpah(dataDok.qblokUpah[kualitas[1]], dataDok.blokUpah, kualitas[1].split('-')[1], { NilaiSatuan: null, NilaiSatuan2: null, Harga: $('#Harga102-Add').val(), HargaPrev: null });
					moveKualitasUpah(dataDok.qblokUpah[kualitas[2]], dataDok.blokUpah, kualitas[2].split('-')[1], { NilaiSatuan: null, NilaiSatuan2: null, Harga: $('#Harga103-Add').val(), HargaPrev: null });
					moveKualitasUpah(dataDok.qblokUpah[kualitas[3]], dataDok.blokUpah, kualitas[3].split('-')[1], { NilaiSatuan: $('#NilaiSatuan-Add').val(), NilaiSatuan2: ($('#NilaiSatuan2-Add').length > 0 ? $('#NilaiSatuan2-Add').val() : null), Harga: $('#Harga104-Add').val(), HargaPrev: $('#HargaPrev104-Add').val() });
					setUpah();
					delete dataDok.qblokUpah[kualitas[0]];
					delete dataDok.qblokUpah[kualitas[1]];
					delete dataDok.qblokUpah[kualitas[2]];
					delete dataDok.qblokUpah[kualitas[3]];
					setFilterKualitasUpah(dataDok.qblokUpah, $("#t-kualitas-upah"));

					$('#t-kualitas-upah').select2('focus');
					$('#Harga101-Add, #Harga102-Add, #Harga103-Add, #Harga104-Add, #HargaPrev104-Add').val('');
					$('.rupiah').number( true, 0, ',', '.' );
					$('#msg-success').html('Data Kualitas <strong>' + deskripsi + '</strong> berhasil ditambahkan').show();
				}
			}
			else
			{
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
					else
					{
						moveKualitas(dataDok.qblok5[kualitas], dataDok.blok5, kualitas, $('#Harga-Add').val(), $('#HargaPrev-Add').val());
						setBlok($('table#blok5'), dataDok.blok5);
						delete dataDok.qblok5[kualitas];
						setFilterKualitas(dataDok.qblok5, $("#t-kualitas"));
					}
					$('#t-kualitas').select2('focus');
					$('#Harga-Add, #HargaPrev-Add').val('');
					$('.rupiah').number( true, 0, ',', '.' );
					$('#msg-success').html('Data Kualitas <strong>' + deskripsi + '</strong> berhasil ditambahkan').show();
				}
			}
		});
		
		function formatRespondenResult(item) { return item.NamaResponden; };
		
		function setFilterResponden(){
			$("#t-responden").select2({
					data:{ results: master.responden, text: formatRespondenResult },
					id: function(obj) {return obj.IdResponden;  },
					formatSelection: formatRespondenResult,
					formatResult: formatRespondenResult,
					allowClear: true,
					placeholder: "..."
			}).on("change", function(e) {
				//console.log(e);
				$('#NamaDesa').val(typeof e.added !== 'undefined' ? e.added['NamaDesa'] : "");
			});
		}
		
		function setFilterRespondenKualitas()
		{
			var selectKualitas = '';
			var tempGroup = 'XX';
			var idx = 0;
			$.each(dataDok.blok4, function(i,v)
			{
				if (v.IdKualitas != 0 && v.IdResponden == null)
				{
					if (tempGroup != v.IdGroup)
					{
						if (idx > 0)
							selectKualitas += '</optgroup>';
						selectKualitas += '<optgroup label="'+ v.Deskripsi +'">';
						tempGroup = v.IdGroup;
					}
					selectKualitas += '<option value="'+ i +'">'+ v.NamaKom + ' (' + v.KodeKualitas + ')</option>';
					idx++;
				}
			});
			$.each(dataDok.blok5, function(i,v)
			{
				if (v.IdKualitas != 0 && v.IdResponden == null)
				{
					if (tempGroup != v.IdGroup)
					{
						if (idx > 0)
							selectKualitas += '</optgroup>';
						selectKualitas += '<optgroup label="'+ v.Deskripsi +'">';
						tempGroup = v.IdGroup;
					}
					selectKualitas += '<option value="'+ i +'">'+ v.NamaKom + ' (' + v.KodeKualitas + ')</option>';
					idx++;
				}
			});
			var id = [];
			$.each(dataDok.blokUpah, function(i,v)
			{
				if (v.IdKualitas != 0 && v.IdResponden == null)
				{
					if (tempGroup != v.IdGroup)
					{
						if (idx > 0)
							selectKualitas += '</optgroup>';
						selectKualitas += '<optgroup label="'+ v.Deskripsi +'">';
						tempGroup = v.IdGroup;
					}
					id.push(v.IdKualitas);
					if (v.Kode == "4")
					{
						selectKualitas += '<option value="'+ id.join('-') +'">'+ v.NamaKomView + ' (' + v.KodeKualitasView + ')</option>';
						id = [];
					}
				}
			});
			selectKualitas += '</optgroup>';
			$("#t-responden-kualitas").html(selectKualitas);
			$("#t-responden-kualitas").select2('val', '', true);
		}
		
		$('#frmresponden').popup({
			backgroundactive: true,
			vertical: 'top',
			transition: 'all 0.3s',
			beforeopen: function(){
				$('#msg-error-responden').html('').hide();
				$('#msg-success-responden').html('').hide();
				setFilterRespondenKualitas();
				setFilterResponden();
				$("#t-responden").select2('val', '', true);
				$('.frmresponden_close').removeAttr('disabled');
			},
			opentransitionend: function(){
				$('#t-responden').select2('focus');
			}
		});
		
		$('#tambah-responden').click(function(){
			$('#msg-error-responden').html('').hide();
			$('#msg-success-responden').html('').hide();
			var err = [];
			var responden = $('#t-responden');
			var respondenKualitas = $('#t-responden-kualitas');
			if (responden.val() == "")
				err.push('<li>Nama Responden belum dipilih.</li>');
			if (respondenKualitas.val() == null)
				err.push('<li>Jenis Barang/Komoditas Yang Dihasilkan belum ada isian.</li>');
			if (err.length > 0)
			{
				$('#msg-error-responden').html('<ul>' + err.join('') + '</ul>').show();
			}
			else
			{
				//console.log($('#t-responden-kualitas option:selected').text());
				var r = $.grep(master.responden, function(e){ return e.IdResponden == responden.val(); });
				var arrKual = respondenKualitas.val();
				var msgKual = [];
				$.each(arrKual, function(i,v){
					if (typeof dataDok.blok4[v] !== "undefined")
					{
						dataDok.blok4[v].IdResponden = r[0].IdResponden;
						msgKual.push(dataDok.blok4[v].NamaKom + ' (' + dataDok.blok4[v].KodeKualitas + ')');
					}
					else if (typeof dataDok.blok5[v] !== "undefined")
					{
						dataDok.blok5[v].IdResponden = r[0].IdResponden;
						msgKual.push(dataDok.blok5[v].NamaKom + ' (' + dataDok.blok5[v].KodeKualitas + ')');
					}
					else
					{
						var av = v.split('-');
						$.each(av, function(i2,v2){
							dataDok.blokUpah[v2].IdResponden = r[0].IdResponden;
						});
						msgKual.push(dataDok.blokUpah[av[0]].NamaKomView + ' (' + dataDok.blokUpah[av[0]].KodeKualitasView + ')');
					}
				});
				
				
				setResponden();
				setFilterRespondenKualitas();
				responden.select2('val', '', true);
				responden.select2('focus');
				
				$('#msg-success-responden').html('Data Responden <strong>' + r[0].NamaResponden + 
					'</strong> dengan jenis barang/komoditas <strong>'+ msgKual.join(', ') +'</strong> berhasil ditambahkan.').show();
				$('.frmresponden_close').removeAttr('disabled');
			}
			
		});
		
		$(document).on('click', '.edit-responden', function (e) 
		{
			var obj = $(this).parent();
			var responden = obj.attr('data-responden');
			var b4 = obj.attr('data-b4').split('|');
			var b5 = obj.attr('data-b5').split('|');
			var bu = obj.attr('data-bu').split('|');
			var val = [];
			if (obj.attr('data-b4') != "")
				$.each(b4, function(i,v){
					dataDok.blok4[v].IdResponden = null;
					val.push(v);
				});
			if (obj.attr('data-b5') != "")
				$.each(b5, function(i,v){
					dataDok.blok5[v].IdResponden = null;
					val.push(v);
				});
			if (obj.attr('data-bu') != "")
			{
				var tval = [];
				$.each(bu, function(i,v){
					dataDok.blokUpah[v].IdResponden = null;
					tval.push(v);
					if (dataDok.blokUpah[v].Kode == "4")
					{
						val.push(tval.join('-'));
						tval = [];
					}
				});
			}
			$('#frmresponden').popup('show');
			$("#t-responden").select2('val', responden, true);
			$("#t-responden-kualitas").select2('val', val, true);
			$('.frmresponden_close').attr('disabled','disabled');
			return false;
		});

		$(document).on('focusout', '.rupiah', function(){
			var obj = $(this);
			var data = obj.attr('id').split('-');
			switch(obj.attr('data-section'))
			{
				case '2':
					dataDok.blok4[data[1]][data[0]] = obj.val();
					break;
				case '3':
					dataDok.blok5[data[1]][data[0]] = obj.val();
					break;
				case '4':
					dataDok.blokUpah[data[1]][data[0]] = obj.val();
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