<?php

 include_once('autoload.php'); 

 class users{

  
 var $primary_key; 
 function __construct($user_id=''){ 
 $this->primary_key=$user_id;
}

public function create_users($full_names,$username,$password,$tel,$business_name,$type_of_business,$addresses,$role,$show_error='NO'){
$q='insert into users(full_names,username,password,tel,business_name,type_of_business,addresses,role) values(:full_names,:username,:password,:tel,:business_name,:type_of_business,:addresses,:role)';

$con_init=DB::connect();
$stmt=$con_init->prepare($q);
$stmt->bindParam(':full_names',$full_names);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':tel',$tel);
$stmt->bindParam(':business_name',$business_name);
$stmt->bindParam(':type_of_business',$type_of_business);
$stmt->bindParam(':addresses',$addresses);
$stmt->bindParam(':role',$role);
$stmt->execute();
 $stmt=null;
if($show_error=='YES'){
 return 'Success Data saved.'; 
}else{
 return $con_init->lastInsertId();
 }
 }
 
 
static function read_users($start='0',$limit='1000'){
$q='select * from users limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function users_constants(){$const=array('user_id','full_names','username','password','tel','business_name','type_of_business','addresses','role');

 return $const;
}
 
 
public function update_users($full_names,$username,$password,$tel,$business_name,$type_of_business,$addresses,$role){
 
$q='update users set full_names=:full_names,username=:username,password=:password,tel=:tel,business_name=:business_name,type_of_business=:type_of_business,addresses=:addresses,role=:role where user_id=:4361_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':full_names',$full_names);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':tel',$tel);
$stmt->bindParam(':business_name',$business_name);
$stmt->bindParam(':type_of_business',$type_of_business);
$stmt->bindParam(':addresses',$addresses);
$stmt->bindParam(':role',$role);
$stmt->bindParam(':4361_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_users(){
$q='delete from users where user_id=:4361_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':4361_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_users($col,$value,$start='0',$limit='1000'){
$q='select * from users where '.$col.' like :col limit'.' '.$start.','.$limit;
 $value='%'.$value.'%'; 
 $data=array();
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':col',$value);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){
 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function search_marched_users($col,$value,$start='0',$limit='1000'){
$q='select * from users where '.$col.'=:col limit'.' '.$start.','.$limit; 
 $data=array();
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':col',$value);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){
 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function get_users($id){
$q='select * from users where user_id=:4361_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':4361_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function login_users($username,$password){ 
$q='select * from users where username=:username and password=:password';
 $data=array();

 $stmt=DB::connect()->prepare($q); 
$stmt->bindParam(':username',$username); 
$stmt->bindParam(':password',$password); 

 $stmt->execute(); 
 $data['rows']=$stmt->fetch(PDO::FETCH_ASSOC); 
 $data['row_count']=$stmt->rowCount(); 
 return $data; 
 } 
 

 } 
 
  ?>