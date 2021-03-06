define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap', 'nanoscroller', 'bootstrap.datepicker'
    //, 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker'
    , 'magnific.popup', 'jquery.placeholder', 'jquery.validate'
    ,'jquery.popupoverlay'
    //, 'jquery.typeit', 'snap.svg', 'liquid.meter'
    , 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
    ,'jquery.dataTables','jquery.dataTables.tableTools','datatables', 'ckeditor', 'ckeditor.adapter'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                //$el.trigger('loading-overlay:show');
                //$el.trigger('loading-overlay:hide');

                var iframe = null;

                // IE8/7
                var frameInterval = window.setInterval(function () {
                    iframe = $('#iframe_designer').contents();
                    if ($('head', iframe).length) {
                        window.clearInterval(frameInterval);
                    }
                }, 100);

                // on iframe loaded
                $('#iframe_designer').on('load', function (e) {
                    iframe = $('#iframe_designer').contents();
                    iframe.find("#content-return").html($("#content-desc").val());
                    iframe.find("#cssjs-return").html($("#cssjs").html());
                    setTimeout(function(){
                        iframe.find(".gjs-pn-btn.get-page").click();
                    }, 100);
                });

                var $table = $('.datatable');
                $table.dataTable({
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ baris per halaman",
                        "sInfo": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        "sInfoFiltered": "(dari total _MAX_ data)",
                        "sZeroRecords": "Tidak ada ada yang sesuai",
                        "sInfoEmpty": "Data tidak ditemukan",
                        "sSearch": ""
                    }
                });

                if ($('.ckeditor-textarea').length > 0)
                    $( '.ckeditor-textarea' ).ckeditor({
                        /*"extraPlugins": "imagebrowser",
                        "imageBrowser_listUrl": $baseUrl + "content/list.json",
                        "imageBrowser_contentUrl": $contentUrl,*/
                        filebrowserBrowseUrl : $baseUrl + 'backend/filemanager?cu=' + $contentUrl,
                    });

                var validobj = $("#frm-post").validate({
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
                        if ($("#content-desc").val() == "")
                            alert ("Please enter Content value");
                        else {
                            $el.trigger('loading-overlay:show');
                            var data = {
                                title : $("#title").val(), 
                                link : $("#link").val(), 
                                content : $("#content-desc").val(),
                                lang_id : $("#lang_id").val(),
                                short_desc : $("#cssjs").html(),
                                is_sharing : $("#is_sharing").val()
                            }
                            
                            //alert (JSON.stringify(data));
                            
                            var url = $(form).attr("data-action");
                            var redirect = $(form).attr("data-redirect");
                            if (!/http:/.test(url)) url = $baseUrl + url;
                            if (!/http:/.test(redirect) && redirect != '') redirect = $baseUrl + redirect;
                            ajaxRequest(url, { data : data }
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
                                        
                                    }
                                    
                                }, function(){
                                    if (redirect == ''){
                                        $("button[type='reset']").trigger('click');
                                    }
                                    else
                                    {
                                        setTimeout("location.href = '" + redirect + "';", 2000);
                                    }
                                    $el.trigger('loading-overlay:hide');
                                }, false);
                        }
                    }
                });

                $("#reset-staticpages").click(function(){
                        validobj.resetForm();
                        $(".form-control, .form-group").removeClass("has-error");
                        $('label.error').remove();

                        if ($("#content-desc-old").length > 0)
                            $("#content-desc").val($("#content-desc-old").html());
                        else
                            $("#content-desc").val("");
                        
                        var id = $("#frm-post").attr("data-id");
                        $("#" + id).focus();
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

                $('#view-designer').on('click', function()
                {
                    $dok = $('#modalDesigner');
                    $.magnificPopup.open({
                        items: {
                            src: $dok, // can be a HTML string, jQuery object, or CSS selector
                            type: 'inline'
                        },
                        preloader: false,
                        modal: true
                    });
                    return false;
                });

               /* $('.modal-dismiss').on('click', function(){
                    $.magnificPopup.close();
                });*/

                

                $('#btn-save').on('click', function(){
                    iframe.find(".gjs-pn-btn.save-page").click();
                    var data = iframe.find("#content-return").html();
                    $("#content-desc").val(data);
                    $("#cssjs").html(iframe.find("#cssjs-return").html());
                    $.magnificPopup.close();
                });

                $('#closeconfirm').popup({
                    transition: 'all 0.3s'
                });
                
                $('#closeok').click(function(){
                    $.magnificPopup.close();
                    $('#closeconfirm').popup('hide');
                });

                $('#iframe_designer').css('height', $(document).height() - 240);
                
                $('body').removeClass("loading-overlay-showing");
            });
        }
);
