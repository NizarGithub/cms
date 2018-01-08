
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>File Manager</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
   
    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" href="<?php echo base_url("content/docs/css/elfinder.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("content/docs/css/theme.css"); ?>" />

    <!-- elFinder JS (REQUIRED) -->
    <script src="<?php echo base_url("content/docs/js/elfinder.min.js"); ?>"></script>


<!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        // Helper function to get parameters from the query string.
        function getUrlParam(paramName) {
            var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i');
            var match = window.location.search.match(reParam);

            return (match && match.length > 1) ? match[1] : '';
        }

        $().ready(function () {
            var funcNum = getUrlParam('CKEditorFuncNum');
            var cu = getUrlParam('cu');
            var elf = $('#elfinder').elfinder({
                // set your elFinder options here
                customData: {
                    _token: 'cb5mZeWLEElwnZAM6GEA2je5VvWa321ssHSieRFU'
                },
                url: '<?php echo base_url();?>' + 'content/docs/php/connector.minimal.php',  // connector URL
                soundPath: '<?php echo base_url();?>' + 'content/docs/sounds',
                getFileCallback: function (file) {
                    window.opener.CKEDITOR.tools.callFunction(funcNum, cu + file.path.replace(/\\/g,'/'));
                    window.close();
                }
            }).elfinder('instance');
        });
    </script>
</head>
<body>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>

</body>
</html>
