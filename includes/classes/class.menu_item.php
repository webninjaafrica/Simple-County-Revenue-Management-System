<?php
 class menu_item{ 
 var $menu_type, $menu; 
 function __construct($menu_type=''){
 $items=array(array('payment'=>array('create'=>'add-payment.php','create_name'=>'payment','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create payment ','view'=>'all-payment.php','view_icon'=>'fa fa-list','view_name'=>'view-payment','view_permission'=>'allow user to view payment '));,array('users'=>array('create'=>'add-users.php','create_name'=>'users','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create users ','view'=>'all-users.php','view_icon'=>'fa fa-list','view_name'=>'view-users','view_permission'=>'allow user to view users '));,
 $this->menu_type=$menu_type;
 $this->menu=$items;  
 
 } 
 static function getForDataEntry(){
 $menu=$items=array(array('payment'=>array('create'=>'add-payment.php','create_name'=>'payment','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create payment ','view'=>'all-payment.php','view_icon'=>'fa fa-list','view_name'=>'view-payment','view_permission'=>'allow user to view payment '));,array('users'=>array('create'=>'add-users.php','create_name'=>'users','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create users ','view'=>'all-users.php','view_icon'=>'fa fa-list','view_name'=>'view-users','view_permission'=>'allow user to view users ')););
 $menus=array(); 
for($i=0; $i<count($menu); $i++){
 $data=json_decode($menu[$i]);
 if($data['type']=='create'){ 
 array_push($data,$menus); 
} 
 }
 return $menus; }
  
 static function getForDataReports(){
 $menu=$items=array(array('payment'=>array('create'=>'add-payment.php','create_name'=>'payment','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create payment ','view'=>'all-payment.php','view_icon'=>'fa fa-list','view_name'=>'view-payment','view_permission'=>'allow user to view payment '));,array('users'=>array('create'=>'add-users.php','create_name'=>'users','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create users ','view'=>'all-users.php','view_icon'=>'fa fa-list','view_name'=>'view-users','view_permission'=>'allow user to view users ')););
 $menus=array(); 

 return $menu; }
 
 } 
 ?>