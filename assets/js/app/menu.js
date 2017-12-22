define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap', 'nanoscroller'
    //, 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker'
    ,'magnific.popup', 'jquery.placeholder'
    ,'jquery.popupoverlay', 'jquery.validate'
    //, 'jquery.typeit', 'snap.svg', 'liquid.meter'
    , 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
    //,'jquery.dataTables','jquery.dataTables.tableTools','datatables', 'ckeditor', 'ckeditor.adapter'
    , 'jquery.nestable'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                var $elMenu = $('#LoadingOverlayMenu');
                //$el.trigger('loading-overlay:show');
                //$el.trigger('loading-overlay:hide');

                var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
                var validobj = $("#frm-menu").validate({
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
                        if ($("#is_hyperlink").val() == "1" && $('#link').val() == "")
                            alert ("Isian link harus diisi karena pilihan Is Hyperlink berisi Ya");
                        else {
                            $elMenu.trigger('loading-overlay:show');
                            var param = {
                                deskripsi : $("#deskripsi").val(), 
                                is_hyperlink : $("#is_hyperlink").val(), 
                                link : $("#link").val(),
                                id_pagestatic : $("#id_pagestatic").val(),
                                parent_id : $('#parent_id').val(),
                                action : $("#frm-menu").attr('data-action')
                            }
                            
                            //alert (JSON.stringify(data));
                            
                            ajaxRequest($baseUrl + 'backend/menu/save', { param : param }
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
                                        SetDefaultMenu();
                                        $.magnificPopup.close();
                                        $('#nestable').html(data.menuAll).nestable({
                                            group: 1
                                        }).on('change', updateOutput);
                                    }
                                    
                                }, function(){
                                    $elMenu.trigger('loading-overlay:hide');
                                }, false);
                        }
                    }
                });

                $(".delete").click(function(){
                    var params = JSON.parse($(this).attr("params"));
                    var about = $(this).attr("about");
                    var msg = "Are you sure want to delete this data?";
                    if (about == 'staticpages'){
                        msg += '\nTitle : ' + params.title;
                    }
                    var r = confirm(msg);
                    if (r == false)
                        return false;
                });

                var updateOutput = function (e) {
                    var list = e.length ? e : $(e.target),
                        output = list.data('output');

                    //console.log(JSON.stringify(list.nestable('serialize')));

                    $elMenu.trigger('loading-overlay:show');

                    ajaxRequest($baseUrl + 'backend/menu/updateOrder', { param : list.nestable('serialize') }
                        , function(data) {
                            /*if (data.IsError)
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
                                SetDefaultMenu();
                                $.magnificPopup.close();
                                $('#nestable').html(data.menuAll).nestable({
                                    group: 1
                                }).on('change', updateOutput);
                            }*/
                            
                        }, function(){
                            $elMenu.trigger('loading-overlay:hide');
                        }, false);

                    /*if (window.JSON) {
                        output.val(window.JSON.stringify(list.nestable('serialize')));
                    } else {
                        output.val('JSON browser support required for this demo.');
                    }*/
                };

                $('#nestable').nestable({
                    group: 1
                }).on('change', updateOutput);

                function SetDefaultMenu()
                {
                    $('input.simpan', $('#frm-menu')).val('');
                    $('textarea.simpan', $('#frm-menu')).val('');
                    $('select.simpan', $('#frm-menu')).select2('val','',true);
                    $('select#is_hyperlink', $('#frm-menu')).select2('val','1');
                }

                function setFilterStatic(data){
                    var selectStatic = '<option value="">- Pilih -</option>';
                    $.each(data, function(i,v){
                        selectStatic += '<option value="'+ v.id +'">'+ v.title +'</option>';
                    });
                    $("select#id_pagestatic").html(selectStatic);
                }
                
                function ShowMenu(act, parent)
                {
                    $elMenu.trigger('loading-overlay:show');
                    $dok = $('#add-menu');
                    $form = $('#frm-menu');
                    $form.attr('data-action', act);
                    $.magnificPopup.open({
                        items: {
                            src: $dok, // can be a HTML string, jQuery object, or CSS selector
                            type: 'inline'
                        },
                        preloader: false,
                        focus: '#deskripsi',
                        modal: true,
                        callbacks: {
                            beforeOpen: function() {
                                if (act == "add")
                                    SetDefaultMenu();
                                $('.panel-title', $dok).text(act == "add" ? 'ADD MENU' : 'EDIT MENU');

                                $('#parent_id').val(parent.id);
                                $('#parent_menu').val(parent.deskripsi);

                                $("#is_hyperlink").trigger('change');
                            },
                            open: function() {

                                $id = 0;
                                if (act == "edit")
                                    $id = parent.id;

                                ajaxRequest($baseUrl + 'backend/menu/staticpages', {id : $id}, function(data) {
                                    
                                    setFilterStatic(data.pagestatic);

                                    if (act == "edit")
                                    {
                                        $('#container-parent_menu').hide();
                                        $('#deskripsi').val(data.datamenu.deskripsi);
                                        $('#is_hyperlink').select2('val', data.datamenu.is_hyperlink, true);


                                        if (data.datamenu.link != null)
                                            $('#link').val(data.datamenu.link);
                                        if (data.datamenu.id_pagestatic != null)
                                            $('#id_pagestatic').select2('val', data.datamenu.id_pagestatic, true);
                                    }
                                    else
                                    {
                                        $('#container-parent_menu').show();
                                    }

                                    

                                }, function(){
                                    $elMenu.trigger('loading-overlay:hide');
                                }, false, stack_bar_bottom);
                            }
                        }
                    });
                }

                $(document).on('click', '.add-menu', function(){
                    var parent = {
                        id : $(this).parent().parent().attr('data-id'),
                        deskripsi : $(this).parent().parent().attr('data-deskripsi')
                    };
                    ShowMenu('add', parent);
                });

                $(document).on('click', '.edit-menu', function(){
                    var parent = {
                        id : $(this).parent().parent().attr('data-id'),
                        deskripsi : $(this).parent().parent().attr('data-deskripsi')
                    };
                    ShowMenu('edit', parent);
                });

                 $(document).on('click', '.delete-menu', function(){
                    var parent = {
                        id : $(this).parent().parent().attr('data-id'),
                        deskripsi : $(this).parent().parent().attr('data-deskripsi')
                    };
                    var msg = "Are you sure want to delete this data?";
                    msg += '\nDeskripsi : ' + parent.deskripsi;
                    var r = confirm(msg);
                    if (r == false)
                        return false;
                });

                $('#closeconfirm').popup({
                    transition: 'all 0.3s'
                });
                
                $('#closeok').click(function(){
                    $.magnificPopup.close();
                    $('#closeconfirm').popup('hide');
                });

                $("#is_hyperlink").change(function(){
                    var val = $(this).val();
                    $('select#id_pagestatic').select2('val','',true);
                    $('#link').val('');
                    if (val == 1)
                    {
                        $('#container-link').show();
                        $('#container-id_pagestatic').hide();
                    }
                    else
                    {
                        $('#container-link').hide();
                        $('#container-id_pagestatic').show();
                    }
                });



                $('body').removeClass("loading-overlay-showing");

            });
        }
);
