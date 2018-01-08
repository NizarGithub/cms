
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->config->item('app_title_prefix') . ' | ' . $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url("assets/libs/grapesjs/dist/designer/toastr.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/libs/grapesjs/dist/css/grapes.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/libs/grapesjs/dist/designer/tooltip.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-preset-webpage.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/libs/grapesjs/dist/designer/perfect-scrollbar.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-plugin-filestack.css"); ?>" />

    <style type="text/css">
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .hidden-btn {
            display: none;
        }

        iframe {
            user-select: none;
            -webkit-user-select: none;
        }

        #toast-container {
            font-size: 13px;
            font-weight: lighter;
        }

        #toast-container > div,
        #toast-container > div:hover {
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            font-family: Helvetica, sans-serif;
        }

        #toast-container > div {
            opacity: 0.95;
        }

        #gjs-pn-devices-c {
            width: 85%;
            z-index: 1;
        }

        #gjs-sm-float,
        #gjs-pn-views .fa-cog,
        #gjs-pn-commands .gjs-pn-buttons {
            display: none;
        }

        .gjs-pn-panel#gjs-pn-commands {
            width: 200px;
            box-shadow: none;
        }

        [data-tooltip]::after {
            background: rgba(51, 51, 51, 0.9);
        }

        .gjs-am-preview-cont {
            height: 100px;
            width: 100%;
        }

        .gjs-logo {
            height: 25px;
        }

        .gjs-logo-cont {
            position: absolute;
            left: 25px;
            top: 8px;
        }

        .gjs-logo-version {
            position: absolute;
            background-color: #756467;
            font-size: 10px;
            padding: 1px 7px;
            border-radius: 15px;
            bottom: 2px;
            right: -43px;
        }
    </style>

</head>
<body>

<div id="gjs">
    <!--<style type="css/text">*{box-sizing: border-box;}body{margin:0;}.row{display:table;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;width:100%;}</style>
    <script type="text/javascript"></script>-->
</div>

<div id="content-return" style="display:none">
</div>

<div id="cssjs-return" style="display:none">
</div>

<script src="<?php echo base_url("assets/libs/grapesjs/dist/designer/jquery-3.2.1.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/filestack.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/designer/perfect-scrollbar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/designer/toastr.min.js"); ?>"></script>

<script src="<?php echo base_url("assets/libs/grapesjs/dist/grapes.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-plugin-filestack.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-blocks-basic.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-preset-webpage.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-plugin-forms.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-navbar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/libs/grapesjs/dist/plugins/grapesjs-component-countdown.min.js"); ?>"></script>

<script type="text/javascript">
    var first_load = true;
    var editor = grapesjs.init({
        height: '100%',
        container: '#gjs',
        fromElement: true,
        showOffsets: 1,
        canvas: {
            styles: [
                "<?php echo base_url('assets/frontend/css/animate.css'); ?>",
                "<?php echo base_url('assets/frontend/css/hover.css'); ?>",
                "<?php echo base_url('assets/frontend/css/style.css'); ?>",
            ],
            scripts: [
                "<?php echo base_url('assets/frontend/js/jquery.js'); ?>",
                "<?php echo base_url('assets/frontend/js/jquery-migrate.min.js'); ?>",
            ],
        },
        commands: {
            defaults: [{
                id: 'save-page',
                run: function (editor, senderBtn) {
                    if (first_load) {
                        first_load = false;
                    } else {
                        var html = editor.getHtml();

                        var css = '<style>' + editor.getCss() + '</style>';

                        var js = '<script>' + editor.getJs() + '<\/script>';

                        var content = html;

                        $('#content-return').html(content);
                        $('#cssjs-return').html(css + js);

                        //return content;

                        /*$.ajax({
                            url: "<?php echo base_url('designer/save'); ?>",
                            type: 'PUT',
                            data: {
                                'title': 'About Us',
                                'slug': 'about-us',
                                'content': content
                            },
                            success: function (data) {
                                toastr.success(data['message']);
                            },
                            error: function (data) {
                                console.warn(data['message']);
                            }
                        });*/
                    }
                    senderBtn.set('active', false);
                },

                stop: function (editor, senderBtn) {
                },
            },
            {
                id: 'get-page',
                run: function (editor, senderBtn) {
                    
                    editor.setComponents($("#content-return").html() + $('#cssjs-return').html());

                    senderBtn.set('active', false);
                },

                stop: function (editor, senderBtn) {
                },
            }]
        },
        plugins: [
//            'gjs-plugin-filestack',
            'gjs-blocks-basic',
            'gjs-preset-webpage',
            'gjs-navbar',
            'gjs-component-countdown',
            'gjs-plugin-forms'
        ],
        pluginsOpts: {
//            'gjs-plugin-filestack': {
//                key: 'AYmqZc2e8RLGLE7TGkX3Hz',
//            }
        },

        storageManager: {
            type: 'none',
            storeComponents: 1,
            storeStyles: 1,
        },

        // Configure style
        styleManager: {
            sectors: [{
                name: 'General',
                buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                properties: [{
                    name: 'Alignment',
                    property: 'float',
                    type: 'radio',
                    defaults: 'none',
                    list: [
                        {value: 'none', className: 'fa fa-times'},
                        {value: 'left', className: 'fa fa-align-left'},
                        {value: 'right', className: 'fa fa-align-right'}
                    ],
                },
                    {property: 'position', type: 'select'}
                ],
            }, {
                name: 'Dimension',
                open: false,
                buildProps: ['width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                properties: [{
                    property: 'margin',
                    properties: [
                        {name: 'Top', property: 'margin-top'},
                        {name: 'Right', property: 'margin-right'},
                        {name: 'Bottom', property: 'margin-bottom'},
                        {name: 'Left', property: 'margin-left'}
                    ],
                }, {
                    property: 'padding',
                    properties: [
                        {name: 'Top', property: 'padding-top'},
                        {name: 'Right', property: 'padding-right'},
                        {name: 'Bottom', property: 'padding-bottom'},
                        {name: 'Left', property: 'padding-left'}
                    ],
                }],
            }, {
                name: 'Typography',
                open: false,
                buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                properties: [
                    {name: 'Font', property: 'font-family'},
                    {name: 'Weight', property: 'font-weight'},
                    {name: 'Font color', property: 'color'},
                    {
                        property: 'text-align',
                        type: 'radio',
                        defaults: 'left',
                        list: [
                            {value: 'left', name: 'Left', className: 'fa fa-align-left'},
                            {value: 'center', name: 'Center', className: 'fa fa-align-center'},
                            {value: 'right', name: 'Right', className: 'fa fa-align-right'},
                            {value: 'justify', name: 'Justify', className: 'fa fa-align-justify'}
                        ],
                    }, {
                        property: 'text-decoration',
                        type: 'radio',
                        defaults: 'none',
                        list: [
                            {value: 'none', name: 'None', className: 'fa fa-times'},
                            {value: 'underline', name: 'underline', className: 'fa fa-underline'},
                            {value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough'}
                        ],
                    }, {
                        property: 'text-shadow',
                        properties: [
                            {name: 'X position', property: 'text-shadow-h'},
                            {name: 'Y position', property: 'text-shadow-v'},
                            {name: 'Blur', property: 'text-shadow-blur'},
                            {name: 'Color', property: 'text-shadow-color'}
                        ],
                    }],
            }, {
                name: 'Decorations',
                open: false,
                buildProps: ['opacity', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
                properties: [{
                    type: 'slider',
                    property: 'opacity',
                    defaults: 1,
                    step: 0.01,
                    max: 1,
                    min: 0,
                }, {
                    property: 'border-radius',
                    properties: [
                        {name: 'Top', property: 'border-top-left-radius'},
                        {name: 'Right', property: 'border-top-right-radius'},
                        {name: 'Bottom', property: 'border-bottom-left-radius'},
                        {name: 'Left', property: 'border-bottom-right-radius'}
                    ],
                }, {
                    property: 'box-shadow',
                    properties: [
                        {name: 'X position', property: 'box-shadow-h'},
                        {name: 'Y position', property: 'box-shadow-v'},
                        {name: 'Blur', property: 'box-shadow-blur'},
                        {name: 'Spread', property: 'box-shadow-spread'},
                        {name: 'Color', property: 'box-shadow-color'},
                        {name: 'Shadow type', property: 'box-shadow-type'}
                    ],
                }, {
                    property: 'background',
                    properties: [
                        {name: 'Image', property: 'background-image'},
                        {name: 'Repeat', property: 'background-repeat'},
                        {name: 'Position', property: 'background-position'},
                        {name: 'Attachment', property: 'background-attachment'},
                        {name: 'Size', property: 'background-size'}
                    ],
                },],
            }, {
                name: 'Extra',
                open: false,
                buildProps: ['transition', 'perspective', 'transform'],
                properties: [{
                    property: 'transition',
                    properties: [
                        {name: 'Property', property: 'transition-property'},
                        {name: 'Duration', property: 'transition-duration'},
                        {name: 'Easing', property: 'transition-timing-function'}
                    ],
                }, {
                    property: 'transform',
                    properties: [
                        {name: 'Rotate X', property: 'transform-rotate-x'},
                        {name: 'Rotate Y', property: 'transform-rotate-y'},
                        {name: 'Rotate Z', property: 'transform-rotate-z'},
                        {name: 'Scale X', property: 'transform-scale-x'},
                        {name: 'Scale Y', property: 'transform-scale-y'},
                        {name: 'Scale Z', property: 'transform-scale-z'}
                    ],
                }]
            },
            ],
        },
    });
    // Simple warn notifier
    var origWarn = console.warn;
    toastr.options = {
        closeButton: true,
        preventDuplicates: true,
        showDuration: 250,
        hideDuration: 150
    };
    console.warn = function (msg) {
        if (msg.indexOf('[undefined]') == -1) {
            toastr.warning(msg);
        }
        origWarn(msg);
    };


    // Beautify tooltips
    var titles = document.querySelectorAll('*[title]');
    for (var i = 0; i < titles.length; i++) {
        var el = titles[i];
        var title = el.getAttribute('title');
        title = title ? title.trim() : '';
        if (!title)
            break;
        el.setAttribute('data-tooltip', title);
        el.setAttribute('title', '');
    }

    // Store and load events
    editor.on('storage:load', function (e) {
        console.log('Loaded ', e);
    });
    editor.on('storage:store', function (e) {
        console.log('Stored ', e);
    });

    editor.on('load', function () {
    });

    var panelManager = editor.Panels;

    panelManager.addPanel({
        id: 'corals-panel',
        visible: true,
        buttons: [
            {
                id: 'save-page',
                className: 'save-page hidden-btn fa fa-floppy-o',
                command: 'save-page',
                attributes: {"data-tooltip": 'Save Page', "data-tooltip-pos": "bottom"},
                active: true,
            },
            {
                id: 'get-page',
                className: 'get-page hidden-btn fa fa-upload',
                command: 'get-page',
                attributes: {"data-tooltip": 'Get Page', "data-tooltip-pos": "bottom"},
                active: true,
            },
        ],
    });

</script>
</body>
</html>