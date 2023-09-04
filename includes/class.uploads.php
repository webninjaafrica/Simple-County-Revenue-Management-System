<?php include_once('autoload.php'); 
 class uploads{ 
var $filename; 
 function __construct($filename=''){ $this->filename=$filename; 
 } 
 static function upload($htmlname,$extensions='',$dir='uploads',$rename='0'){
 $res=array(); 
  $res['error']='';
 $res['dest']='';
 $tempname=$_FILES[$htmlname]['tmp_name']; 
 $fname=basename($_FILES[$htmlname]['name']);
 $res['file_ext']=pathinfo($fname,PATHINFO_EXTENSION); 
 $ext=array(); 
 if(is_array($extensions)){
 $ext=$extensions; }
 if(count($ext) >0){
 // check extensions
 if(!in_array($res['file_ext'],$ext)){
 $res['error']='file extension not supported!'; 
 }else{ 
 if(!is_dir($dir)){
 $res['error']='file upload path is not valid!'; 
 } 
}}else{
//allow all extensions 
 $res['error']=''; 
  } 
 if(empty($res['error'])){
 if($rename=='1'){
 $fname=sha1(mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9)).'.'.$res['file_ext']; 
 }
  move_uploaded_file($tempname,$dir.'/'.$fname);
 $res['dest']=$dir.'/'.$fname;  
  }
 return $res;
  }
static function remove($filedest){ 
unlink($filedest); 
 }
 } 
 ?>