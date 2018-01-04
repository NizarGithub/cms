define(['jquery', 'jquery.migrate', 'jquery.ui', 'jquery.browser.mobile', 'bootstrap', 'nanoscroller', 'bootstrap.datepicker'
    //, 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker'
    , 'magnific.popup', 'jquery.placeholder', 'jquery.validate'
    //, 'jquery.typeit', 'snap.svg', 'liquid.meter'
    , 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
    ,'jquery.dataTables','jquery.dataTables.tableTools','datatables', 'ckeditor', 'ckeditor.adapter'
    , 'colorbox'
    , 'plupload', 'plupload.gears', 'plupload.silverlight', 'plupload.flash', 'plupload.browserplus', 'plupload.html4'
    , 'plupload.html5', 'jquery.plupload.queue'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                //$el.trigger('loading-overlay:show');
                //$el.trigger('loading-overlay:hide');

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
                        "extraPlugins": "imagebrowser",
                        "imageBrowser_listUrl": $baseUrl + "content/list.json",
                        "imageBrowser_contentUrl": $contentUrl
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
                        if ($("#caption").val() == "")
                            alert ("Please enter caption value");
                        else if ($("li", $("#picture")).length == 0)
                            alert ("Please upload first Picture");
                        else {
                            $el.trigger('loading-overlay:show');
                            var data = {
                                caption : $("#caption").val(),
                                picture : $("img", $("#picture li.thumbnail").first()).attr('alt'),
                                lang_id : $("#lang_id").val()
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

                                    $('#picture li.thumbnail').not(':first').each(function(index) {
                                        $.post($baseUrl + "backend/slideshow/deletepicture", { value: $("img", $(this)).attr('alt') },"json");
                                    });

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

                $("#reset-slideshow").click(function(){
                        validobj.resetForm();
                        $(".form-control, .form-group").removeClass("has-error");
                        if ($("#caption-old").length > 0)
                            $("#caption").val($("#caption-old").html());
                        else
                            $("#caption").val("");
                        $('#clear_queue_picture').trigger("click");
                        
                        $('li.thumbnail').not('.old').each(function(index) {
                            $.post($baseUrl + "backend/slideshow/deletepicture", { value: $("img", $(this)).attr('alt') },"json");
                        });
                        
                        $('li.thumbnail').not('.old').remove();
                        
                        var id = $("#frm-post").attr("data-id");
                        $("#" + id).focus();
                    });

                $(".delete").click(function(){
                    var params = JSON.parse($(this).attr("params"));
                    var about = $(this).attr("about");
                    var msg = "Are you sure want to delete this data?";
                    if (about == 'slideshow'){
                        msg += '\nCaption : ' + params.caption;
                    }
                    var r = confirm(msg);
                    if (r == false)
                        return false;
                });
                
                $('.slideshow-sortable').sortable({
                    revert:true,
                    items: "li:not(.ui-state-disabled)",
                    placeholder: "ui-state-highlight",
                    //connectWith: ".row-fluid",
                    //cancel:'.btn,.box-content,.nav-header',
                    update:function(event,ui){
                        $.post($baseUrl + "backend/slideshow/sortslideshow", { ids: $(this).sortable('toArray') }, "json");
                        //line below gives the ids of elements, you can make ajax call here to save it to the database
                        //console.log($(this).sortable('toArray'));
                    }
                });

                $("#upload_picture").pluploadQueue({
                    // General settings
                    runtimes: 'html5,gears,browserplus,silverlight,flash,html4',
                    url: $baseUrl + 'backend/slideshow/upload',
                    max_file_size: '10mb',
                    chunk_size: '1mb',
                    multiple_queues : false,
                    
                    resize: {width:$("#upload_picture").attr("data-width"), quality: 90},

                    // Specify what files to browse for
                    filters: [
                        {title: "Image files", extensions: "jpg"}
                        //,{title: "Zip files", extensions: "zip"}
                    ],

                    // Flash/Silverlight paths
                    flash_swf_url: $baseUrl + 'assets/libs/plupload/plupload.flash.swf',
                    silverlight_xap_url: $baseUrl + 'assets/libs/plupload/plupload.silverlight.xap',

                    init: {
                        FileUploaded: function(up, file, info) {
                            // Called when a file has finished uploading
                            response = JSON.parse(info.response);
                            //$("<span>"+ response.filename +"</span>").appendTo($(".plupload_file_name", "#" + file.id));
                            var counter = $("li.thumbnail").length + 1;
                            $(".gallery").append("<li id=\"" + response.filename + "\" class=\"thumbnail\">" +
                                                        "<a style=\"background:url(" + $contentUrl + "slides/thumbs/"+ response.filename +"\" title=\"" + response.filename + "\" href=\"" + $contentUrl + "slides/"+ response.filename +"\"><img class=\"grayscale_\" src=\""+ $contentUrl + "slides/thumbs/" + response.filename + "\" alt=\"" + response.filename + "\"></a>" +
                                                    "</li>");
                            $('.thumbnail a').colorbox({rel:'thumbnail a', transition:"elastic", maxWidth:"95%", maxHeight:"95%"});
                        }
                    }
                });
                
                $('#clear_queue_picture').click(function(e) {
                    e.preventDefault();
                    $("#upload_picture").pluploadQueue().splice();
                    return false;
                });
                
                $(".plupload_container").css("padding", "0");

                //gallery controlls container animation
                $('ul.gallery').delegate('li', 'mouseenter', function(){
                    //$('img',this).fadeToggle(1000);
                    $(this).find('.gallery-controls').remove();
                    $(this).append('<div class="gallery-controls">'+
                                        '<p><a href="#" class="gallery-delete btn btn-img"><i class="fa fa-times"></i></a></p>'+
                                    '</div>');
                    //$(this).find('.gallery-controls').stop().animate({'margin-top':'-1'},400,'easeInQuint');
                }).delegate('li', 'mouseleave', function(){
                    //$('img',this).fadeToggle(1000);
                    $(this).find('.gallery-controls').stop().remove();
                });

                //gallery delete
                $('.thumbnails').delegate('.gallery-delete','click',function(e){
                    e.preventDefault();
                    
                    var $ul = $(this).parentsUntil($(".controls"), "ul.gallery");
                    
                    //get image id
                    $this = $(this).parents('.thumbnail');
                    
                    var msg = "Are you sure want to delete this picture?";
                    var r = confirm(msg);
                    if (r == true)
                    {
                        if ($ul.hasClass("slideshow")){
                            $.post($baseUrl + "backend/slideshow/deletepicture", { value: $("img", $this).attr('alt') },
                                function(data) {
                                    if (data.isSukses){
                                        $this.remove();
                                        new PNotify({
                                            title: 'Success!',
                                            text: data.msg,
                                            type: 'success'
                                        });
                                    }
                                    else{
                                        new PNotify({
                                            title: 'Error!',
                                            text: data.msg,
                                            type: 'error'
                                        });
                                    }
                            }, "json");
                        }
                    }
                });

                $('.thumbnail a').colorbox({rel:'thumbnail a', transition:"elastic", maxWidth:"95%", maxHeight:"95%"});

                $('body').removeClass("loading-overlay-showing");
            });
        }
);
