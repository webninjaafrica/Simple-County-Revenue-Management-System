<?php



spl_autoload_register(function($class){

 if(file_exists('classes/class.'.$class.'.php')){ 

 include_once('classes/class.'.$class.'.php'); 
 
 }  }); 
 
  ?>