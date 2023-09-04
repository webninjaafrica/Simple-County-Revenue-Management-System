<?php

 include_once('autoload.php'); 

 class payment{

  
 var $primary_key; 
 function __construct($payment_id=''){ 
 $this->primary_key=$payment_id;
}

public function create_payment($business_name,$date,$period,$status,$Amount,$payment_method,$business_type,$show_error='NO'){
$q='insert into payment(business_name,date,period,status,Amount,payment_method,business_type) values(:business_name,:date,:period,:status,:Amount,:payment_method,:business_type)';

$con_init=DB::connect();
$stmt=$con_init->prepare($q);
$stmt->bindParam(':business_name',$business_name);
$stmt->bindParam(':date',$date);
$stmt->bindParam(':period',$period);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':Amount',$Amount);
$stmt->bindParam(':payment_method',$payment_method); //
$stmt->bindParam(':business_type',$business_type);
$stmt->execute();
 $stmt=null;
if($show_error=='YES'){
 return 'Success Data saved.'; 
}else{
 return $con_init->lastInsertId();
 }
 }
 
 
static function read_payment($start='0',$limit='1000'){
$q='select * from payment limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function payment_constants(){$const=array('payment_id','business_name','date','period','status');

 return $const;
}
 
 static function setStatus($payment_id,$status="Approved"){
  $q="update payment set status=:status where payment_id=:payment_id";
  $stmt=DB::connect()->prepare($q);
  $stmt->bindParam(':status',$status);
  $stmt->bindParam(':payment_id',$payment_id);
$stmt->execute();
 }
public function update_payment($business_name,$date,$period,$status){
 
$q='update payment set business_name=:business_name,date=:date,period=:period,status=:status where payment_id=:4361_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':business_name',$business_name);
$stmt->bindParam(':date',$date);
$stmt->bindParam(':period',$period);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':4361_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_payment(){
$q='delete from payment where payment_id=:4361_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':4361_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_payment($col,$value,$start='0',$limit='1000'){
$q='select * from payment where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function search_marched_payment($col,$value,$start='0',$limit='1000'){
$q='select * from payment where '.$col.'=:col limit'.' '.$start.','.$limit; 
 $data=array();
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':col',$value);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){
 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function get_payment($id){
$q='select * from payment where payment_id=:4361_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':4361_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 

 } 
 
  ?>