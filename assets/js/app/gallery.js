define(['jquery', 'jquery.migrate', 'jquery.browser.mobile', 'bootstrap', 'nanoscroller', 'raphael', 'highcharts', 'highcharts.exporting', 'bootstrap.datepicker', 'magnific.popup', 'jquery.placeholder'
            , 'jquery.validate', 'jquery.typeit', 'snap.svg', 'liquid.meter', 'pnotify.custom', 'theme', 'theme.custom', 'theme.init'
            ,'jquery.dataTables','jquery.dataTables.tableTools','datatables', 'ckeditor', 'ckeditor.adapter', 'colorbox'
            , 'plupload', 'plupload.gears', 'plupload.silverlight', 'plupload.flash', 'plupload.browserplus', 'plupload.html4'
            , 'plupload.html5', 'jquery.plupload.queue'
]
        , function ($) {
            $(function () {
                var $el = $('#LoadingOverlayApi');
                //$el.trigger('loading-overlay:show');
                //$el.trigger('loading-overlay:hide');

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
                        if ($ul.hasClass("media")){
                            $.post($baseUrl + "backend/gallery/deletepicture", { value: $("img", $this).attr('alt') },
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

                $("#uploader").pluploadQueue({
                    // General settings
                    runtimes: 'html5,gears,browserplus,silverlight,flash,html4',
                    url: $baseUrl + 'backend/gallery/upload',
                    max_file_size: '10mb',
                    chunk_size: '1mb',
                    multiple_queues : true,
                    //unique_names: true,

                    // Resize images on clientside if we can
                    /* resize: {width:812, height: 360, quality: 90}, */

                    // Specify what files to browse for
                    filters: [
                        {title: "Image files", extensions: "jpg,jpeg,gif,png"}
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
                                                        "<a style=\"background:url(" + $baseUrl + "content/images/thumbs/"+ response.filename +"\" title=\"" + response.filename + "\" href=\"" + $baseUrl + "content/images/"+ response.filename +"\"><img class=\"grayscale_\" src=\""+ $baseUrl + "content/images/thumbs/" + response.filename + "\" alt=\"" + response.filename + "\"></a>" +
                                                    "</li>");
                            $('.thumbnail a').colorbox({rel:'thumbnail a', transition:"elastic", maxWidth:"95%", maxHeight:"95%"});
                        }
                    }
                });
                    
                $('#clear-queue').click(function(e) {
                    e.preventDefault();
                    $("#uploader").pluploadQueue().splice();
                    return false;
                });
                
                $('body').removeClass("loading-overlay-showing");
            });
        }
);
