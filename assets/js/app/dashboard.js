define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap', 'nanoscroller', 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker', 'magnific.popup', 'jquery.placeholder'
            , 'jquery.validate', 'jquery.typeit', 'snap.svg', 'liquid.meter', 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                $('#tahun, #tahun2').select2('val', tahunNow, true);
                $('#bulan, #bulan2').select2('val', bulanNow, true);

                //$('#prov').select2('focus');
                function setFilterKab(prov, idkab) {
                    var selectKab = (wilUser.kab != false) ? '' : '<option value="">- ALL -</option>';
                    if (prov != "")
                        $.each(kabByProv[prov], function (i, v) {
                            selectKab += '<option value="' + v.KodeKab + '">' + '[' + v.KodeProv + v.KodeKab + '] ' + v.NamaKab + '</option>';
                        });
                    $("select#" + idkab).html(selectKab);
                    if (wilUser.kab != false && prov != "")
                    {
                        $('select#' + idkab).select2('val', wilUser.kab, true);
                    }
                    else
                        $('select#' + idkab).trigger('change');
                    
                }

                $('select#prov').change(function () {
                    setFilterKab($(this).val(), 'kab');
                });
                $('select#kab').change(function () {
                    $('#refresh-progress').trigger('click');
                });
                $('select#bulan').change(function () {
                    $('#refresh-progress').trigger('click');
                });
                $('select#tahun').change(function () {
                    $('#refresh-progress').trigger('click');
                });
                $('#refresh-progress').click(function () {
                    $el.trigger('loading-overlay:show');
                    var param = {};
                    param['KodeProv'] = $('select#prov').val();
                    param['KodeKab'] = $('select#kab').val();
                    param['Tahun'] = $('select#tahun').val();
                    param['Bulan'] = $('select#bulan').val();
                    param['Dok'] = 'HD';
                    ajaxRequest($baseUrl + 'dashboard/action/progress-entri', {param: param}
                    , function (data) {
                        //var height = data.wil.length * 50;
                        $('#progress-chart').highcharts({
                            chart: {
                                type: 'column',
                                backgroundColor: "transparent",
                                height: 500, //(height < 500 ? 500 : height)
                            },
                            title: {
                                text: 'Progress Entri Dokumen Harga Perdesaan ' + (param['KodeProv'] == ''
                                        ? 'Indonesia' : param['KodeKab'] == ''
                                        ? 'Provinsi ' + $('select#prov option:selected').text() : 'Kab/Kota ' + $('select#kab option:selected').text())
                            },
                            xAxis: {
                                categories: data.wil,
                                title: {
                                    text: 'Wilayah'
                                },
                                labels: {
                                    rotation: -45
                                }
                            },
                            yAxis: {
                                min: 0,
                                max: 100,
                                title: {
                                    text: 'Persentase'
                                },
                                stackLabels: {
                                    enabled: false,
                                    style: {
                                        fontWeight: 'bold'
                                    }
                                }
                            },
                            legend: {
                                reversed: false
                            },
                            /* tooltip: {
                             formatter: function () {
                             return '<b>' + this.x + '</b><br/>' +
                             this.series.name + ': ' + this.y + '<br/>' +
                             'Total: ' + this.point.stackTotal;
                             }
                             }, */
                            tooltip: {
                                pointFormat: '<span style="color:{series.color}">{series.name}</span>: {point.y}%<br/>',
                                shared: true
                            },
                            plotOptions: {
                                column: {
                                    stacking: 'normal'
                                },
                                series: {
                                    cursor: 'pointer',
                                    point: {
                                        events: {
                                            click: function () {
                                                var kode = this.category;
                                                kode = kode.split(']');
                                                kode = kode[0].replace('[', '');
                                                if (kode.length == 2)
                                                    $("select#prov").select2('val', kode, true);
                                                else if (kode.length == 4)
                                                    $("select#kab").select2('val', kode.substring(2), true);
                                                //alert('Category: ' + kode + ', value: ' + this.y);
                                            }
                                        }
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [
                                {name: 'BELUM DIENTRI', data: data.belum, color: '#808080'},
                                {name: 'EROR', data: data.error, color: '#b90000'},
                                {name: 'CLEAN', data: data.clean, color: '#0aa89e'},
                            ],
                        });
                        $('#judul').text('Tabel Progress Entri Dokumen Harga Perdesaan ' + (param['KodeProv'] == ''
                                ? 'Indonesia' : param['KodeKab'] == ''
                                ? 'Provinsi ' + $('select#prov option:selected').text() : 'Kab/Kota ' + $('select#kab option:selected').text()));
                        $('#tabel').html(data.tabel);
                    }, function () {
                        $el.trigger('loading-overlay:hide');
                    }, false);
                    return false;
                });
                
                $('select#prov2').change(function () {
                    setFilterKab($(this).val(), 'kab2');
                });
                $('select#kab2').change(function () {
                    $('#refresh-progress2').trigger('click');
                });
                $('select#bulan2').change(function () {
                    $('#refresh-progress2').trigger('click');
                });
                $('select#tahun2').change(function () {
                    $('#refresh-progress2').trigger('click');
                });
                $('#refresh-progress2').click(function () {
                    $el.trigger('loading-overlay:show');
                    var param = {};
                    param['KodeProv'] = $('select#prov2').val();
                    param['KodeKab'] = $('select#kab2').val();
                    param['Tahun'] = $('select#tahun2').val();
                    param['Bulan'] = $('select#bulan2').val();
                    param['Dok'] = 'HKD';
                    ajaxRequest($baseUrl + 'dashboard/action/progress-entri', {param: param}
                    , function (data) {
                        //var height = data.wil.length * 50;
                        $('#progress-chart2').highcharts({
                            chart: {
                                type: 'column',
                                backgroundColor: "transparent",
                                height: 500, //(height < 500 ? 500 : height)
                            },
                            title: {
                                text: 'Progress Entri Dokumen Harga Konsumen Perdesaan ' + (param['KodeProv'] == ''
                                        ? 'Indonesia' : param['KodeKab'] == ''
                                        ? 'Provinsi ' + $('select#prov2 option:selected').text() : 'Kab/Kota ' + $('select#kab2 option:selected').text())
                            },
                            xAxis: {
                                categories: data.wil,
                                title: {
                                    text: 'Wilayah'
                                }
                            },
                            yAxis: {
                                min: 0,
                                max: 100,
                                title: {
                                    text: 'Persentase'
                                },
                                stackLabels: {
                                    enabled: false,
                                    style: {
                                        fontWeight: 'bold'
                                    }
                                }
                            },
                            legend: {
                                reversed: false
                            },
                            /* tooltip: {
                             formatter: function () {
                             return '<b>' + this.x + '</b><br/>' +
                             this.series.name + ': ' + this.y + '<br/>' +
                             'Total: ' + this.point.stackTotal;
                             }
                             }, */
                            tooltip: {
                                pointFormat: '<span style="color:{series.color}">{series.name}</span>: {point.y}%<br/>',
                                shared: true
                            },
                            plotOptions: {
                                column: {
                                    stacking: 'normal'
                                },
                                series: {
                                    cursor: 'pointer',
                                    point: {
                                        events: {
                                            click: function () {
                                                var kode = this.category;
                                                kode = kode.split(']');
                                                kode = kode[0].replace('[', '');
                                                if (kode.length == 2)
                                                    $("select#prov2").select2('val', kode, true);
                                                else if (kode.length == 4)
                                                    $("select#kab2").select2('val', kode.substring(2), true);
                                                //alert('Category: ' + kode + ', value: ' + this.y);
                                            }
                                        }
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [
                                {name: 'BELUM DIENTRI', data: data.belum, color: '#808080'},
                                {name: 'EROR', data: data.error, color: '#b90000'},
                                {name: 'CLEAN', data: data.clean, color: '#0aa89e'},
                            ],
                        });
                        $('#judul2').text('Tabel Progress Entri Dokumen Harga Konsumen Perdesaan ' + (param['KodeProv'] == ''
                                ? 'Indonesia' : param['KodeKab'] == ''
                                ? 'Provinsi ' + $('select#prov2 option:selected').text() : 'Kab/Kota ' + $('select#kab2 option:selected').text()));
                        $('#tabel2').html(data.tabel);
                    }, function () {
                        $el.trigger('loading-overlay:hide');
                    }, false);
                    return false;
                });
                //$('select#prov2').trigger('change');

                $('#penerimaan-data').liquidMeter({
                    shape: 'circle',
                    color: '#0088cc',
                    background: '#F9F9F9',
                    fontSize: '24px',
                    fontWeight: '600',
                    stroke: '#F2F2F2',
                    textColor: '#333',
                    liquidOpacity: 0.9,
                    liquidPalette: ['#333'],
                    speed: 3000,
                    animate: !$.browser.mobile
                });
                $('#hd-meter').on('click', function (ev) {
                    var param = {};
                    param['Dok'] = 'HD';
                    ajaxRequest($baseUrl + 'dashboard/action/liquid-meter', {param: param}
                    , function (data) {
                        $('#hd-meter').removeClass('active');
                        $('#hkd-meter').addClass('active');
                        // Update Meter Value
                        if (typeof data.master === 'undefined')
                            $('#penerimaan-data').liquidMeter('set', 0.1);
                        else
                            $('#penerimaan-data').liquidMeter('set', data.meter);
                    });
                });
                $('#hkd-meter').on('click', function (ev) {
                    var param = {};
                    param['Dok'] = 'HKD';
                    ajaxRequest($baseUrl + 'dashboard/action/liquid-meter', {param: param}
                    , function (data) {
                        $('#hkd-meter').removeClass('active');
                        $('#hd-meter').addClass('active');
                        // Update Meter Value
                        if (typeof data.master === 'undefined')
                            $('#penerimaan-data').liquidMeter('set', 0.1);
                        else
                            $('#penerimaan-data').liquidMeter('set', data.meter);
                    });
                });

                $('#hd-meter').click();

//                $('#penerimaan-data-dok a').on('click', function (ev) {
//                  
//                    var val = $(this).data("val"),
//                            selector = $(this).parent(),
//                            items = selector.find('a');
//                    items.removeClass('active');
//                    $(this).addClass('active');
//                    // Update Meter Value
//                    $('#penerimaan-data').liquidMeter('set', val);
//                });
                var news = ['Informasi terkini tentang pengolahan data Survei Harga Perdesaan.'
                            , 'Informasi terkini tentang pengolahan data Survei Harga Perdesaan.'
                            , 'Informasi terkini tentang pengolahan data Survei Harga Perdesaan.'];
                var typeIt = $('#newsletter').typeIt({
                    speed: 50,
                    autoStart: true,
                    loop: true
                })

                $.each(news, function (i, item) {
                    typeIt.tiType(item)
                            .tiPause(2000)
                            .tiDelete();
                });
                $('body').removeClass("loading-overlay-showing");
                $('.nav-progress').on('click', function () {
                    var id = ($(this).data('id'));
                    if (id == "hd")
                        $('#refresh-progress').trigger('click');
                    else
                    {
                        if (wilUser.prov != false)
                        {
                            $('select#prov2').select2('val', wilUser.prov, true);
                        }
                        else
                            $('select#prov2').trigger('change');
                        //$('#refresh-progress2').trigger('click');
                    }
                });

                if (wilUser.prov != false)
                {
                    $('select#prov').select2('val', wilUser.prov, true);
                }
                else
                    $('select#prov').trigger('change');
            });
        }
);
