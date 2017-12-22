<?php

function NamaBulan($bulan)
{
	Switch ($bulan){
		case 1 : $bulan="Januari";
			Break;
		case 2 : $bulan="Februari";
			Break;
		case 3 : $bulan="Maret";
			Break;
		case 4 : $bulan="April";
			Break;
		case 5 : $bulan="Mei";
			Break;
		case 6 : $bulan="Juni";
			Break;
		case 7 : $bulan="Juli";
			Break;
		case 8 : $bulan="Agustus";
			Break;
		case 9 : $bulan="September";
			Break;
		case 10 : $bulan="Oktober";
			Break;
		case 11 : $bulan="November";
			Break;
		case 12 : $bulan="Desember";
			Break;
		}
	return $bulan;
}

function smart_resize_image($file,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;

    # Setting defaults and meta
    $info                         = getimagesize($file);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;

    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
      case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
      case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);

      if ($transparency >= 0) {
        $transparent_color  = imagecolorsforindex($image, $trnprt_indx);
        $transparency       = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output);   break;
      case IMAGETYPE_PNG:   imagepng($image_resized, $output);    break;
      default: return false;
    }

    return true;
  }

  function GetListFile($url, $type = "image")
  {
    $arrFile = array();

    $matches = array();

    preg_match_all("/(a href\=\")([^\?\"]*)(\")/i", get_text($url), $matches);

    $regex = '';
    if ($type == "image")
      $regex = '/\.(jpe?g|bmp|png|gif|JPE?G|BMP|PNG|GIF)(?:[\?\#].*)?$/';

    foreach($matches[2] as $match) {  
        if (preg_match($regex, $match))
          array_push($arrFile, $match);
    }

    return $arrFile;     
  }

function get_text($filename) {

    $content = "";
    $fp_load = fopen("$filename", "rb");

    if ( $fp_load ) {

        while ( !feof($fp_load) ) {
            $content .= fgets($fp_load, 8192);
        }

        fclose($fp_load);

        return $content;

    }
}

function GetNewFilenameFTP($fileName, $conn_id)
{
  // set up a connection to the server we chose or die and show an error
  //$conn_id = ftp_connect($ftpParam['host']) or die("Couldn't connect to " . $ftpParam['host']);
  //ftp_login($conn_id, $ftpParam['username'], $ftpParam['password']);

  // check if a file exist
  $path = "/images/"; //the path where the file is located

  $check_file_exist = $path.$fileName; //combine string for easy use

  $contents_on_server = ftp_nlist($conn_id, $path); //Returns an array of filenames from the specified directory on success or FALSE on error. 

  // Test if file is in the ftp_nlist array
  if (in_array($check_file_exist, $contents_on_server)) 
  {
      $ext = strrpos($fileName, '.');
      $fileName_a = substr($fileName, 0, $ext);
      $fileName_b = substr($fileName, $ext);

      $count = 1;
      while (in_array($path . $fileName_a . '_' . $count . $fileName_b, $contents_on_server))
          $count++;

      $fileName = $fileName_a . '_' . $count . $fileName_b;
  }

  // output $contents_on_server, shows all the files it found, helps for debugging, you can use print_r() as well
  //var_dump($contents_on_server);

  // remember to always close your ftp connection
  //ftp_close($conn_id);

  return $fileName;
}

function CreateDirFTP($dir, $ftpParam)
{
  // set up basic connection
  $conn_id = ftp_connect($ftpParam['host']);

  // login with username and password
  ftp_login($conn_id, $ftpParam['username'], $ftpParam['password']);

  // try to create the directory $dir
  if (!ftp_mkdir($conn_id, $dir)) {
    die("Couldn't create dir $dir");
  } 

  // close the connection
  ftp_close($conn_id);
}


