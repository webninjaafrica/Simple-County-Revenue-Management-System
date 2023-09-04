<?php header('content-type: application/json');
/*API made by magochi-php-maker - from Kelvin Mwangi Magochi
Tel: +254111808341
This code is by under GNU license, the database author may sublicense ot or expand it the way they want.
 for more information, visit https://www.webninjafrica.com or call Kelvin Magochi from the number +254111560417


*/



include_once('autoload.php');

$feedback=array('status'=>'404','message'=>'service not found');

$api_key='abc1232';
$api_secret='were3qa';

if(isset($_GET['api_key']) && isset($_GET['api_secret']) && isset($_GET['service_id'])){

$service_id=$_GET['service_id'];

if($_GET['api_key']==$api_key && $_GET['api_secret']==$api_secret){

switch($service_id){

case 'add-payment':
$feedback['requested_service']='add-payment';
if(isset($_GET['business_name']) &&isset($_GET['date']) &&isset($_GET['period']) &&isset($_GET['status'])){
extract($_GET);
$add_obj=new payment();
$feedback['status']=200;
$feedback['message']=$add_obj->create_payment($business_name,$date,$period,$status);
}else{
$feedback['status']=403;
$feedback['message']='error, not all parameters were set!';
}
break;

case 'update-payment':
$feedback['requested_service']='update-payment';
if(isset($_GET['business_name']) &&isset($_GET['date']) &&isset($_GET['period']) &&isset($_GET['status'])){
extract($_GET);
$update_obj=new payment();
$feedback['status']=200;
$feedback['message']=$update_obj->update_payment($business_name,$date,$period,$status);
}else{
$feedback['status']=403;
$feedback['message']='error, not all parameters were set!';
}
break;

case 'remove-from-payment':
$feedback['requested_service']='remove-from-payment';
$cols=payment::payment_constants();
if(isset($_GET['payment_id'])){
 $resp=$_GET['payment_id'];
$response= new payment($resp);
 $response->delete_payment();
$feedback['message']=$response;
$feedback['status']=200;

}else{
$feedback['message']='forbidden access! nothing to delete, you did not supply any valid parameter';

$feedback['status']='403';}
break;

case 'select-single-from-payment':
$feedback['requested_service']='select-single-from-payment';
$cols=payment::payment_constants();
if(isset($_GET['payment_id'])){
 $resp=$_GET['payment_id'];
$response=payment::get_payment($resp);
$feedback['message']=$response;
$feedback['status']=200;

}else{
$feedback['message']='forbidden access! nothing to read from, you did not supply any valid parameter';

$feedback['status']='403';}
break;

case 'list-all-payment':
$feedback['requested_service']='list-payment';
$start=0;
$limit=1000; /*defining data fetch limits*/

if(isset($_GET['start']) && isset($_GET['limit'])){
$start=$_GET['start'];
$limit=$_GET['limit'];
}

$magochi_stack=payment::read_payment();
$feedback['rows']=$magochi_stack;
$feedback['status']=200;
$feedback['message']='rows returned';
$feedback['row_count']=count($magochi_stack);

break;


case 'search-keyword-from-payment':
$feedback['requested_service']='search-from-payment';

/*wildcard search*/

$start=0;
$limit=1000; /*defining data fetch limits*/

if(isset($_GET['start']) && isset($_GET['limit'])){
$start=$_GET['start'];
$limit=$_GET['limit'];
}
$cols=payment::payment_constants();
 $col=$cols[0];
$value='hello world, no search query specified';
$feedback['search-type']='wildcard';

if(isset($_GET['col']) && isset($_GET['value'])){
$value=$_GET['value'];
$col=$_GET['col'];
if(in_array($col,$cols)){

}else{
$feedback['status']=403;
$feedback['message']='forbidden access, table column not found!';
}
$magochi_stack=payment::search_payment($col,$value,$start,$limit);
$feedback['rows']=$magochi_stack;
$feedback['row_count']=count($magochi_stack);}


break;


case 'search-keyword-from-payment':
$feedback['requested_service']='search-keyword-from-payment';

/*wildcard search*/

$start=0;
$limit=1000; /*defining data fetch limits*/

if(isset($_GET['start']) && isset($_GET['limit'])){
$start=$_GET['start'];
$limit=$_GET['limit'];
}
$cols=payment::payment_constants();
 $col=$cols[0];
$value='hello world, no search query specified';
$feedback['search-type']='wildcard';

if(isset($_GET['col']) && isset($_GET['value'])){
$value=$_GET['value'];
$col=$_GET['col'];
if(in_array($col,$cols)){

$magochi_stack=payment::search_marched_payment($col,$value,$start,$limit);
$feedback['rows']=$magochi_stack;
$feedback['row_count']=count($magochi_stack);

}else{
$feedback['status']=403;
$feedback['message']='forbidden access, table column not found!';
}
}


break;




case 'add-users':
$feedback['requested_service']='add-users';
if(isset($_GET['full_names']) &&isset($_GET['username']) &&isset($_GET['password']) &&isset($_GET['tel']) &&isset($_GET['business_name']) &&isset($_GET['type_of_business']) &&isset($_GET['addresses']) &&isset($_GET['role'])){
extract($_GET);
$add_obj=new users();
$feedback['status']=200;
$feedback['message']=$add_obj->create_users($full_names,$username,$password,$tel,$business_name,$type_of_business,$addresses,$role);
}else{
$feedback['status']=403;
$feedback['message']='error, not all parameters were set!';
}
break;

case 'update-users':
$feedback['requested_service']='update-users';
if(isset($_GET['full_names']) &&isset($_GET['username']) &&isset($_GET['password']) &&isset($_GET['tel']) &&isset($_GET['business_name']) &&isset($_GET['type_of_business']) &&isset($_GET['addresses']) &&isset($_GET['role'])){
extract($_GET);
$update_obj=new users();
$feedback['status']=200;
$feedback['message']=$update_obj->update_users($full_names,$username,$password,$tel,$business_name,$type_of_business,$addresses,$role);
}else{
$feedback['status']=403;
$feedback['message']='error, not all parameters were set!';
}
break;

case 'remove-from-users':
$feedback['requested_service']='remove-from-users';
$cols=users::users_constants();
if(isset($_GET['user_id'])){
 $resp=$_GET['user_id'];
$response= new users($resp);
 $response->delete_users();
$feedback['message']=$response;
$feedback['status']=200;

}else{
$feedback['message']='forbidden access! nothing to delete, you did not supply any valid parameter';

$feedback['status']='403';}
break;

case 'select-single-from-users':
$feedback['requested_service']='select-single-from-users';
$cols=users::users_constants();
if(isset($_GET['user_id'])){
 $resp=$_GET['user_id'];
$response=users::get_users($resp);
$feedback['message']=$response;
$feedback['status']=200;

}else{
$feedback['message']='forbidden access! nothing to read from, you did not supply any valid parameter';

$feedback['status']='403';}
break;

case 'list-all-users':
$feedback['requested_service']='list-users';
$start=0;
$limit=1000; /*defining data fetch limits*/

if(isset($_GET['start']) && isset($_GET['limit'])){
$start=$_GET['start'];
$limit=$_GET['limit'];
}

$magochi_stack=users::read_users();
$feedback['rows']=$magochi_stack;
$feedback['status']=200;
$feedback['message']='rows returned';
$feedback['row_count']=count($magochi_stack);

break;


case 'search-keyword-from-users':
$feedback['requested_service']='search-from-users';

/*wildcard search*/

$start=0;
$limit=1000; /*defining data fetch limits*/

if(isset($_GET['start']) && isset($_GET['limit'])){
$start=$_GET['start'];
$limit=$_GET['limit'];
}
$cols=users::users_constants();
 $col=$cols[0];
$value='hello world, no search query specified';
$feedback['search-type']='wildcard';

if(isset($_GET['col']) && isset($_GET['value'])){
$value=$_GET['value'];
$col=$_GET['col'];
if(in_array($col,$cols)){

}else{
$feedback['status']=403;
$feedback['message']='forbidden access, table column not found!';
}
$magochi_stack=users::search_users($col,$value,$start,$limit);
$feedback['rows']=$magochi_stack;
$feedback['row_count']=count($magochi_stack);}


break;


case 'search-keyword-from-users':
$feedback['requested_service']='search-keyword-from-users';

/*wildcard search*/

$start=0;
$limit=1000; /*defining data fetch limits*/

if(isset($_GET['start']) && isset($_GET['limit'])){
$start=$_GET['start'];
$limit=$_GET['limit'];
}
$cols=users::users_constants();
 $col=$cols[0];
$value='hello world, no search query specified';
$feedback['search-type']='wildcard';

if(isset($_GET['col']) && isset($_GET['value'])){
$value=$_GET['value'];
$col=$_GET['col'];
if(in_array($col,$cols)){

$magochi_stack=users::search_marched_users($col,$value,$start,$limit);
$feedback['rows']=$magochi_stack;
$feedback['row_count']=count($magochi_stack);

}else{
$feedback['status']=403;
$feedback['message']='forbidden access, table column not found!';
}
}


break;





}
}else{
$feedback['status']=500;
$feedback['message']='incorrect API credentials. please try again!';
}
}
echo json_encode($feedback);


?>