define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap', 'nanoscroller', 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker', 'magnific.popup', 'jquery.placeholder'
            , 'jquery.validate', 'jquery.typeit', 'snap.svg', 'liquid.meter', 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                $('#tahun, #tahun2').select2('val', tahunNow, true);
                $('#bulan, #bulan2').select2('val', bulanNow, true);

                function setFilterKab(prov, id) {
                    var select = '<option value="">- ALL -</option>';
                    if (prov != "")
                        $.each(kabByProv[prov], function (i, v) {
                            select += '<option value="' + v.KodeKab + '">' + '[' + v.KodeProv + v.KodeKab + '] ' + v.NamaKab + '</option>';
                        });
                    $("select#" + id).html(select);
                }

                function setFilterKec(data, id) {
                    var select = '<option value="">- ALL -</option>';
                    if (data != "")
                        $.each(data, function (i, v) {
                            select += '<option value="' + v.KodeKec + '">' + '[' + v.KodeProv + v.KodeKab + v.KodeKec + '] ' + v.NamaKec + '</option>';
                        });
                    $("select#" + id).html(select);
                }

                function setFilterKom(data, id) {
                    var select = '<option value="">- ALL -</option>';
                    if (data != "")
                        $.each(data, function (i, v) {
                            select += '<option value="' + v.KodeKom + '">' + '[' + v.KodeKom + '] ' + v.NamaKom + '</option>';
                        });
                    $("select#" + id).html(select);
                }

                $('select#prov').change(function () {
                    setFilterKab($(this).val(), 'kab');
                });
                $('select#prov2').change(function () {
                    setFilterKab($(this).val(), 'kab2');
                });
                $('select#kab').change(function () {
                    var param = {};
                    param['KodeProv'] = $('select#prov').val();
                    param['KodeKab'] = $('select#kab').val();
                    $('#kec').select2('val', '', true);
                    ajaxRequest($baseUrl + 'laporan/action/setKec', {param: param}
                    , function (data) {
                        setFilterKec(data.kec, 'kec');
                    }, false);
                });
                $('select#kab2').change(function () {
                    var param = {};
                    param['KodeProv'] = $('select#prov2').val();
                    param['KodeKab'] = $('select#kab2').val();
                    $('#kec2').select2('val', '', true);
                    ajaxRequest($baseUrl + 'laporan/action/setKec', {param: param}
                    , function (data) {
                        setFilterKec(data.kec, 'kec2');
                    }, false);
                });
                $('select#dok').change(function () {
                    var param = {};
                    param['KodeDok'] = $('select#dok').val();
                    $('#kom').select2('val', '', true);
                    ajaxRequest($baseUrl + 'laporan/action/setKom', {param: param}
                    , function (data) {
                        setFilterKom(data, 'kom');
                    }, false);
                });
                $('select#dok2').change(function () {
                    var param = {};
                    param['KodeDok'] = $('select#dok2').val();
                    $('#kom2').select2('val', '', true);
                    ajaxRequest($baseUrl + 'laporan/action/setKom', {param: param}
                    , function (data) {
                        setFilterKom(data, 'kom2');
                    }, false);
                });
                $('select#prov').trigger('change');
                $('select#prov2').trigger('change');
                $('select#dok').trigger('change');
                $('select#dok2').trigger('change');

                $('#refresh-progress').click(function () {
                    $el.trigger('loading-overlay:show');
                    var param = {};
                    param['KodeProv'] = $('select#prov').val();
                    param['KodeKab'] = $('select#kab').val();
                    param['KodeKec'] = $('select#kec').val();
                    param['Tahun'] = $('select#tahun').val();
                    param['Bulan'] = $('select#bulan').val();
                    param['KodeDok'] = $('select#dok').val();
                    param['KodeKom'] = $('select#kom').val();
                    param['Dok'] = 'HD';
                    ajaxRequest($baseUrl + 'laporan/action/getLaporan', {param: param}
                    , function (data) {
                        $('#judul').text('Tabel Laporan Harga Perdesaan ' + (param['KodeProv'] == ''
                                ? 'Indonesia' : param['KodeKab'] == ''
                                ? 'Provinsi ' + $('select#prov option:selected').text() : 'Kab/Kota ' + $('select#kab option:selected').text()));
                        $('#tabel').html(data.tabel);
                    }, function () {
                        $el.trigger('loading-overlay:hide');
                    }, false);
                    return false;
                });
                $('#refresh-progress2').click(function () {
                    $el.trigger('loading-overlay:show');
                    var param = {};
                    param['KodeProv'] = $('select#prov2').val();
                    param['KodeKab'] = $('select#kab2').val();
                    param['KodeKec'] = $('select#kec2').val();
                    param['Tahun'] = $('select#tahun2').val();
                    param['Bulan'] = $('select#bulan2').val();
                    param['KodeDok'] = $('select#dok2').val();
                    param['KodeKom'] = $('select#kom2').val();
                    param['Dok'] = 'HKD';
                    ajaxRequest($baseUrl + 'laporan/action/getLaporan', {param: param}
                    , function (data) {
                        $('#judul2').text('Tabel Laporan Harga Konsumen Perdesaan ' + (param['KodeProv'] == ''
                                ? 'Indonesia' : param['KodeKab'] == ''
                                ? 'Provinsi ' + $('select#prov option:selected').text() : 'Kab/Kota ' + $('select#kab option:selected').text()));
                        $('#tabel2').html(data.tabel);
                    }, function () {
                        $el.trigger('loading-overlay:hide');
                    }, false);
                    return false;
                });
                $('body').removeClass("loading-overlay-showing");
            });
        }
);
