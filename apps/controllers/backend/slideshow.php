<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slideshow extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['title'] = "Slideshow";
        $this->tabel->_table = "slideshow";
        $data['slideshow'] = $this->tabel->SlideshowSelectListAll();
        $data['page'] = "backend/slideshow";
        $this->load->view('backend/page', $data);
    }

    public function add() {

        $this->tabel->_table = "lang";
        $lang = $this->tabel->find_all();
        
        $data['lang'] = $lang;
        
        $data['title'] = "Slideshow - Add";
        $data['page'] = "backend/slideshowadd";
        $this->load->view('backend/page', $data);
    }

    public function addsave() {

        $data = $this->input->post('data');
        $dataSave = array();
        if ( get_magic_quotes_gpc() )
            $dataSave['caption'] = htmlspecialchars( stripslashes((string)$data['caption']) );
        else
            $dataSave['caption'] = htmlspecialchars( (string)$data['caption'] );
        $dataSave['main_pict'] = $data['picture'];
        $dataSave['lang_id'] = $data['lang_id'];
        $dataSave['date_create'] = date('Y-m-d H:i:s');

        $this->tabel->_table = "slideshow";

        $dataSave['sorter'] = $this->tabel->SelectNextSorter($dataSave['lang_id'], "slideshow");

        $this->tabel->insert($dataSave);

        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Data slideshow (picture: ". $dataSave['main_pict'] .") is added succesfully.";
   
        echo json_encode($msgBack);
    }

    public function edit($param = null) {

        $id = $param;
        $this->tabel->_table = "slideshow";
        $slideshow = $this->tabel->find_by_id($id);
        $this->tabel->_table = "lang";
        $lang = $this->tabel->find_all();
        
        $data['slideshow'] = $slideshow[0];
        $data['lang'] = $lang;
        $data['id'] = $id;
        
        $data['title'] = "Slideshow - Edit";
        $data['page'] = "backend/slideshowedit";
        $this->load->view('backend/page', $data);
    }

    public function editsave($param = null) {

        $id = $param;
        $data = $this->input->post('data');
        $dataSave = array();
        if ( get_magic_quotes_gpc() )
            $dataSave['caption'] = htmlspecialchars( stripslashes((string)$data['caption']) );
        else
            $dataSave['caption'] = htmlspecialchars( (string)$data['caption'] );
        $dataSave['main_pict'] = $data['picture'];
        $dataSave['lang_id'] = $data['lang_id'];
        $dataSave['date_update'] = date('Y-m-d H:i:s');

        $this->tabel->_table = "slideshow";

        $this->tabel->update_where(array('id' => $id), $dataSave);

        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Data slideshow (picture: ". $dataSave['main_pict'] .") is edited succesfully.";
   
        echo json_encode($msgBack);
    }

    public function delete($param = null) {

        $id = $param;
                
        $this->tabel->_table = "slideshow";
        $this->tabel->delete_where(array('id' => $id));

        redirect('backend/slideshow');
    }

    public function sortslideshow() {

        $ids = $this->input->post('ids');
        //var_dump($ids);
        $this->tabel->_table = "slideshow";
        for($i = 0; $i < count($ids); $i++){

            $this->tabel->update_where(array("id"=>$ids[$i]), array("sorter" => ($i+1)));
        }

        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Succesfully.";
   
        echo json_encode($msgBack);
    }

    public function deletepicture() {

        $value= urldecode($this->input->Post('value'));
        $targetDir = APPCONTENT . 'slides/';
        $targetDirThumb = APPCONTENT . 'slides/thumbs/';
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
            
        echo json_encode($msgBack);
    }

    public function upload($func = "", $param = null){

        // HTTP headers for no cache etc
        //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        // Settings
        //$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = APPCONTENT . 'slides';

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

        $copyFile = APPCONTENT . 'slides/thumbs/' . DIRECTORY_SEPARATOR . $fileName;
        if (copy($targetDir . DIRECTORY_SEPARATOR . $fileName, $copyFile)) {
            //get size list for original image
            list($width, $height) = getimagesize($copyFile);
            $new_width  = 100;
            $new_height = 75;
            
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

/* End of file home.php */
/* Location: ./apps/controllers/home.php */