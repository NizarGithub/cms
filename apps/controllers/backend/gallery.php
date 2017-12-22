<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $gallery = GetListFile($this->session->userdata('bpom_ppid_content_url') . "images/");
        natcasesort($gallery);

        $data['gallery'] = $gallery;
        $data['title'] = "Gallery";
        $data['page'] = "backend/gallery";
        $this->load->view('backend/page', $data);
    }

    public function deletepicture() {

        $value= urldecode($this->input->Post('value'));
        $targetDir = APPCONTENT . 'images/';
        $targetDirThumb = APPCONTENT . 'images/thumbs/';
        if (@unlink($targetDir . $value)){
            if (@unlink($targetDirThumb . $value)){
                $msgBack['isSukses'] = true;
                $msgBack['msg'] = "Image $value is deleted successfully.";
            }
            else{
                $msgBack['isSukses'] = false;
                $msgBack['msg'] = "Image $value cannot be deleted.";
            }
        }
        else{
            $msgBack['isSukses'] = false;
            $msgBack['msg'] = "Image $value cannot be deleted.";
        }
        
        $dir = "content/images/";
        $gallery = scandir($dir);
        $gallery = array_diff($gallery, array('.', '..', 'index.html', 'thumbs'));
        natcasesort($gallery);
        
        $list = array();
        foreach ($gallery as $row){
            $l["image"] = "images/$row";
            $l["thumb"] = "images/thumbs/$row";
            $l["folder"] = "Picture";
            
            array_push($list, $l);
        }
        
        
        file_put_contents('content/list.json', json_encode($list));
            
        echo json_encode($msgBack);
    }

    public function uploadftp($func = "", $param = null){

        $ftpParam = $this->ftpParam;

        if ($func == "") {
            // HTTP headers for no cache etc
            //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");

            // Settings
            //$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
            $targetDir = $this->session->userdata('bpom_ppid_content_url') . 'images';

            $cleanupTargetDir = true; // Remove old files
            $maxFileAge = 5 * 3600; // Temp file age in seconds

            // set up basic connection
            $conn_id = ftp_connect($ftpParam['host']) or die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Couldn\'t connect to " . $ftpParam[\'host\']}, "id" : "id"}');

            // login with username and password
            ftp_login($conn_id, $ftpParam['username'], $ftpParam['password']) or die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Couldn\'t login to " . $ftpParam[\'host\']}, "id" : "id"}');

            $dirFtp = "images";

            // 5 minutes execution time
            @set_time_limit(5 * 60);

            // Uncomment this one to fake upload time
            // usleep(5000);

            // Create target dir
            if (!is_dir("ftp://" . $ftpParam['username'] . ":" . $ftpParam['password'] . "@" . $ftpParam['host'] . "/images/"))
            {
                if (!ftp_mkdir($conn_id, $dirFtp)) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Couldn\'t create dir $dirFtp"}, "id" : "id"}');
                } 
                //CreateDirFTP("images", $ftpParam);
            }

            // Get parameters
            $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
            $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
            $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

            // Clean the fileName for security reasons
            $fileName = preg_replace('/[^\w\._]-()+/', '_', $fileName);
            
            $chkFileExt = explode(".",$fileName);
            $chkFileExt = $chkFileExt[count($chkFileExt)-1];

            // Make sure the fileName is unique but only if chunking is disabled
            if ($chunks < 2) {
                $fileName = GetNewFilenameFTP($fileName, $conn_id);
            }

            $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

            // Remove old temp files    
            if ($cleanupTargetDir && is_dir("ftp://" . $ftpParam['username'] . ":" . $ftpParam['password'] . "@" . $ftpParam['host'] . "/images/") && ($dir = ftp_chdir($conn_id, $dirFtp))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    // Remove temp file if it is older than the max age and is not the current file
                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }

                closedir($dir);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
                

            // Look for the content type header
            if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
                $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

            if (isset($_SERVER["CONTENT_TYPE"]))
                $contentType = $_SERVER["CONTENT_TYPE"];

            // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
            if (strpos($contentType, "multipart") !== false) {
                if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                    // Open temp file
                    $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                    if ($out) {
                        // Read binary input stream and append it to temp file
                        $in = fopen($_FILES['file']['tmp_name'], "rb");

                        if ($in) {
                            while ($buff = fread($in, 4096))
                                fwrite($out, $buff);
                        } else
                            die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                        fclose($in);
                        fclose($out);
                        @unlink($_FILES['file']['tmp_name']);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            } else {
                // Open temp file
                $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = fopen("php://input", "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                    fclose($in);
                    fclose($out);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            // Check if file has been uploaded
            if (!$chunks || $chunk == $chunks - 1) {
                // Strip the temp .part suffix off 
                rename("{$filePath}.part", $filePath);
            }

            $copyFile = APPCONTENT . 'images/thumbs/' . DIRECTORY_SEPARATOR . $fileName;
            if (copy($targetDir . DIRECTORY_SEPARATOR . $fileName, $copyFile)) {
                //get size list for original image
                list($width, $height) = getimagesize($copyFile);
                $new_width  = 100;
                $new_height = 100;
                
                smart_resize_image($copyFile, $new_width, $new_height);
                
                /* if ($chkFileExt == "png"){
                    smart_resize_image($copyFile, $new_width, $new_height);
                }
                else{
                
                    switch ($chkFileExt) {
                        case 'jpg' or 'jpeg': $im=imagecreatefromjpeg($copyFile); break;
                        case 'gif': $im=imagecreatefromgif($copyFile); break;
                        case 'png': $im=imagecreatefrompng($copyFile); break;
                        default: $im='error'; break;
                    }
                    if ($im=='error') {
                        unlink ($copyFile);
                    }
                    else {
                        $width=imagesx($im); 
                        $height=imagesy($im);
                        $newimage=imagecreatetruecolor($new_width,$new_height); 
                        if ($chkFileExt == "png"){
                            imagealphablending($newimage , false);
                            imagesavealpha($newimage , true);
                        }
                        imagecopyresampled($newimage,$im,0,0,0,0,$new_width,$new_height,$width,$height); 
                        switch ($chkFileExt) {
                            case 'jpg' or 'jpeg': $image_create=imagejpeg($newimage,$copyFile,100); $im = imagecreatefromjpeg($copyFile); break;
                            case 'gif': $image_create=imagegif($newimage,$copyFile); $im=imagecreatefromgif($copyFile); break;
                            case 'png': 
                                imagealphablending($newimage , false);
                                imagesavealpha($newimage , true);
                                $image_create=imagepng($newimage,$copyFile); 
                                //$im=imagecreatefrompng($copyFile);                            
                                break;
                        }
                        
                        imagedestroy($im);
                    }
                } */
            }
            
            $dir = "content/images/";
            $gallery = scandir($dir);
            $gallery = array_diff($gallery, array('.', '..', 'index.html', 'thumbs'));
            natcasesort($gallery);
            
            $list = array();
            foreach ($gallery as $row){
                $l["image"] = base_url() . "content/images/$row";
                $l["thumb"] = base_url() . "content/images/thumbs/$row";
                $l["folder"] = "Picture";
                
                array_push($list, $l);
            }
            
            
            file_put_contents('content/list.json', json_encode($list));

            ftp_close($conn_id);

            
            /* $result = $this->rest->get("statics/viewby/id/3", array(), 'json');
            
            if ($result != NULL && !isset($result->error)){
                $static = $result[0];
                
                $fields = array();
                $fields['value'] =  $static->value . ';' . $fileName;
                $fields['id'] = 3;
                
                $result = $this->rest->post('statics/editone', $fields, 'json');
            } */
            
            // Return JSON-RPC response
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "filename" : "'. $fileName .'"}');
        }
    }

    public function upload($func = "", $param = null){
        if ($func == "") {
            // HTTP headers for no cache etc
            //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");

            // Settings
            //$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
            $targetDir = APPCONTENT . 'images';

            $cleanupTargetDir = true; // Remove old files
            $maxFileAge = 5 * 3600; // Temp file age in seconds

            // 5 minutes execution time
            @set_time_limit(5 * 60);

            // Uncomment this one to fake upload time
            // usleep(5000);

            // Get parameters
            $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
            $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
            $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

            // Clean the fileName for security reasons
            $fileName = preg_replace('/[^\w\._]-()+/', '_', $fileName);
            
            $chkFileExt = explode(".",$fileName);
            $chkFileExt = $chkFileExt[count($chkFileExt)-1];

            // Make sure the fileName is unique but only if chunking is disabled
            if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
                $ext = strrpos($fileName, '.');
                $fileName_a = substr($fileName, 0, $ext);
                $fileName_b = substr($fileName, $ext);

                $count = 1;
                while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                    $count++;

                $fileName = $fileName_a . '_' . $count . $fileName_b;
            }

            $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

            // Create target dir
            if (!file_exists($targetDir))
                @mkdir($targetDir);

            // Remove old temp files    
            if ($cleanupTargetDir && is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    // Remove temp file if it is older than the max age and is not the current file
                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }

                closedir($dir);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
                

            // Look for the content type header
            if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
                $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

            if (isset($_SERVER["CONTENT_TYPE"]))
                $contentType = $_SERVER["CONTENT_TYPE"];

            // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
            if (strpos($contentType, "multipart") !== false) {
                if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                    // Open temp file
                    $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                    if ($out) {
                        // Read binary input stream and append it to temp file
                        $in = fopen($_FILES['file']['tmp_name'], "rb");

                        if ($in) {
                            while ($buff = fread($in, 4096))
                                fwrite($out, $buff);
                        } else
                            die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                        fclose($in);
                        fclose($out);
                        @unlink($_FILES['file']['tmp_name']);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            } else {
                // Open temp file
                $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = fopen("php://input", "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                    fclose($in);
                    fclose($out);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            // Check if file has been uploaded
            if (!$chunks || $chunk == $chunks - 1) {
                // Strip the temp .part suffix off 
                rename("{$filePath}.part", $filePath);
            }

            $copyFile = APPCONTENT . 'images/thumbs/' . DIRECTORY_SEPARATOR . $fileName;
            if (copy($targetDir . DIRECTORY_SEPARATOR . $fileName, $copyFile)) {
                //get size list for original image
                list($width, $height) = getimagesize($copyFile);
                $new_width  = 100;
                $new_height = 100;
                
                smart_resize_image($copyFile, $new_width, $new_height);
                
                /* if ($chkFileExt == "png"){
                    smart_resize_image($copyFile, $new_width, $new_height);
                }
                else{
                
                    switch ($chkFileExt) {
                        case 'jpg' or 'jpeg': $im=imagecreatefromjpeg($copyFile); break;
                        case 'gif': $im=imagecreatefromgif($copyFile); break;
                        case 'png': $im=imagecreatefrompng($copyFile); break;
                        default: $im='error'; break;
                    }
                    if ($im=='error') {
                        unlink ($copyFile);
                    }
                    else {
                        $width=imagesx($im); 
                        $height=imagesy($im);
                        $newimage=imagecreatetruecolor($new_width,$new_height); 
                        if ($chkFileExt == "png"){
                            imagealphablending($newimage , false);
                            imagesavealpha($newimage , true);
                        }
                        imagecopyresampled($newimage,$im,0,0,0,0,$new_width,$new_height,$width,$height); 
                        switch ($chkFileExt) {
                            case 'jpg' or 'jpeg': $image_create=imagejpeg($newimage,$copyFile,100); $im = imagecreatefromjpeg($copyFile); break;
                            case 'gif': $image_create=imagegif($newimage,$copyFile); $im=imagecreatefromgif($copyFile); break;
                            case 'png': 
                                imagealphablending($newimage , false);
                                imagesavealpha($newimage , true);
                                $image_create=imagepng($newimage,$copyFile); 
                                //$im=imagecreatefrompng($copyFile);                            
                                break;
                        }
                        
                        imagedestroy($im);
                    }
                } */
            }
            
            $dir = "content/images/";
            $gallery = scandir($dir);
            $gallery = array_diff($gallery, array('.', '..', 'index.html', 'thumbs'));
            natcasesort($gallery);
            
            $list = array();
            foreach ($gallery as $row){
                $l["image"] = "images/$row";
                $l["thumb"] = "images/thumbs/$row";
                $l["folder"] = "Picture";
                
                array_push($list, $l);
            }
            
            
            file_put_contents('content/list.json', json_encode($list));
            
            /* $result = $this->rest->get("statics/viewby/id/3", array(), 'json');
            
            if ($result != NULL && !isset($result->error)){
                $static = $result[0];
                
                $fields = array();
                $fields['value'] =  $static->value . ';' . $fileName;
                $fields['id'] = 3;
                
                $result = $this->rest->post('statics/editone', $fields, 'json');
            } */
            
            // Return JSON-RPC response
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "filename" : "'. $fileName .'"}');
        }
    }
}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */