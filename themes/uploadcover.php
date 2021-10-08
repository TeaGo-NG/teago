<?php
require 'assets/init.php';
  $file_name =  $_FILES['file']['name']; //getting file name
  $tmp_name = $_FILES['file']['tmp_name']; //getting temp_name of file
  $allowed = '';
  $data = [];
  if (!file_exists('upload/files/' . date('Y'))) {
      @mkdir('upload/files/' . date('Y'), 0777, true);
  }
  if (!file_exists('upload/files/' . date('Y') . '/' . date('m'))) {
      @mkdir('upload/files/' . date('Y') . '/' . date('m'), 0777, true);
  }
  if (!file_exists('upload/photos/' . date('Y'))) {
      @mkdir('upload/photos/' . date('Y'), 0777, true);
  }
  if (!file_exists('upload/photos/' . date('Y') . '/' . date('m'))) {
      @mkdir('upload/photos/' . date('Y') . '/' . date('m'), 0777, true);
  }
  if (!file_exists('upload/videos/' . date('Y'))) {
      @mkdir('upload/videos/' . date('Y'), 0777, true);
  }
  if (!file_exists('upload/videos/' . date('Y') . '/' . date('m'))) {
      @mkdir('upload/videos/' . date('Y') . '/' . date('m'), 0777, true);
  }
  if (!file_exists('upload/sounds/' . date('Y'))) {
      @mkdir('upload/sounds/' . date('Y'), 0777, true);
  }
  if (!file_exists('upload/sounds/' . date('Y') . '/' . date('m'))) {
      @mkdir('upload/sounds/' . date('Y') . '/' . date('m'), 0777, true);
  }
  // $allowed = 'jpg,png,jpeg,gif,mp4,m4v,webm,flv,mov,mpeg,mp3,wav';
 $allowed = 'jpg,png,jpeg,gif';
 $data['name'] = t_Secure($file_name);
 $new_string        = pathinfo($data['name'], PATHINFO_FILENAME) . '.' . strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));
 $extension_allowed = explode(',', $allowed);
 $file_extension    = pathinfo($new_string, PATHINFO_EXTENSION);
 if (!in_array($file_extension, $extension_allowed)) {    
     $data = array(
      'status' => 500,
      'message' => 'File not supported'
    );
 }else{
  if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'gif') {
    $folder   = 'photos';
    $fileType = 'image';
} else if ($file_extension == 'mp4' || $file_extension == 'mov' || $file_extension == 'webm' || $file_extension == 'flv') {
    $folder   = 'videos';
    $fileType = 'video';
} else if ($file_extension == 'mp3' || $file_extension == 'wav') {
    $folder   = 'sounds';
    $fileType = 'soundFile';
}

if (empty($folder) || empty($fileType)) {
     
    $data = array(
      'status' => 500,
      'message' => 'Unknown Error'
    );
}else{
  $dir         = "upload/{$folder}/" . date('Y') . '/' . date('m');
  $filename    = $dir . '/' . t_GenerateKey() . '_' . date('d') . '_' . md5(time()) . "_{$fileType}.{$file_extension}";
  $second_file = pathinfo($filename, PATHINFO_EXTENSION);
  if (move_uploaded_file($tmp_name, $filename)) {
     
    $data = array(
      'status' => 400,
      'message' => 'Success',
      'image_url' => $filename
    );
  }else{
    $data = array(
      'status' => 500,
      'message' => 'Upload Failed'
    );
  }
 
}

 }
   
    header("Content-type: application/json");
    echo json_encode($data);
   
  // $file_up_name = time().$file_name; //making file name dynamic by adding time before file name
  // $upload = move_uploaded_file($tmp_name, "upload/".$file_up_name); //moving file to the specified folder with dynamic name
  // if($upload){
  //   echo 'success';
  // }else{
  //   echo 'not_upload';
  // }
?>
