<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li class='breadcrumb-item'><a href='all-payment.php'><i class='fa fa-list'></i>&nbsp;&nbsp;PAYMENT Records</a></li> <li  class='breadcrumb-item'><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;payment</a></li> </ul>
 
  </div>

 
  </div>
<?php

 
$business_name=$date=$period=$status='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=payment::get_payment($id); 
 extract($data); 
 } 
 
 
 
  ?>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new payment($_GET['id']);
echo $ss->update_payment($business_name,$date,$period,$status);


 echo '<script>swal({
  title: "Success!",
  text: "Info Updated!",
  icon: "success",
  button: "Close",
})</script>'; 
 
                      }
 else{ 

$ss=new payment(); echo $ss->create_payment($business_name,$date,$period,$status,'YES'); 


 echo '<script>swal({
  title: "Success!",
  text: "Info Saved!",
  icon: "success",
  button: "Close",
})</script>'; 
 
                      
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form' enctype='multipart/form-data'>
 <div class='panel panel-default'>
 <div class='panel-heading'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp; PAYMENT/ info</h3>
 
  </div>

 <div class='panel-body'><div class='row' style='display:flex;flex-wrap:wrap;'>
 <div class='col-sm-4 col-md-4 col-lg-4 col-xs-12'><div class='row form-group'>
 <div class='col-12 col-sm-4'>BUSINESS NAME
 
  </div>


 <div class='col-12 col-sm-8'><input type='text' name='business_name' class='form-control' placeholder='BUSINESS NAME' value='<?php

 echo $business_name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>
</div>

 <div class='col-sm-4 col-md-4 col-lg-4 col-xs-12'><div class='row form-group'>
 <div class='col-12 col-sm-4'>DATE
 
  </div>


 <div class='col-12 col-sm-8'><input type='text' name='date' class='form-control' placeholder='DATE' value='<?php

 echo $date; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>
</div>

 <div class='col-sm-4 col-md-4 col-lg-4 col-xs-12'><div class='row form-group'>
 <div class='col-12 col-sm-4'>PERIOD
 
  </div>


 <div class='col-12 col-sm-8'><input type='text' name='period' class='form-control' placeholder='PERIOD' value='<?php

 echo $period; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>
</div>

 <div class='col-sm-4 col-md-4 col-lg-4 col-xs-12'><div class='row form-group'>
 <div class='col-12 col-sm-4'>STATUS
 
  </div>


 <div class='col-12 col-sm-8'><input type='text' name='status' class='form-control' placeholder='STATUS' value='<?php

 echo $status; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>
</div>

 
  </div>
</div>

 <div class='panel-footer'><button type='submit' name='save' class='btn btn-primary'><i class='fa fa-save'></i> OKAY</button>
 
  </div>

 
  </div>
</form>
 
  </div>

 
  </div>
<?php

 include_once('foot.php'); 
 
  ?>