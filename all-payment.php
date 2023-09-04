<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>
 <div class='row' id='row' style='margin-top:24px;padding:4px;'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li class='breadcrumb-item'><a href='all-payment.php'><i class='fa fa-list'></i>&nbsp;&nbsp;All PAYMENT</a></li> </ul>
 
  </div>

 
  </div>
 <style>#row{margin-top:24px;}</style>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <div class='btn-group'><a href='add-payment.php' class='btn btn-info'><i class='fa fa-plus'></i> ADD NEW</a><a class='btn btn-primary' href='all-payment.php' class='btn btn-default'><i class='fa fa-refresh'></i> payment List</a>
 
  </div>

 
  </div></div>

 <div class='row' id='searchbar'><div class='col-sm-6 col-md-6 col-xs-12 col-lg-6'><form class='form-inline'><i class='fa fa-calendar'> Search Between Dates: </i>
 <input type='date' name='date1' class='form-control' required='required'><input type='date' name='date2' class='form-control' required='required'><button type='submit' class='btn btn-default'>&nbsp;<i class='fa fa-search'></i>&nbsp;&nbsp;SEARCH</button>
 

</form>
 
  </div>
<div class='col-sm-6 col-md-6 col-xs-12 col-lg-6'>
 <form class='form-inline'>
 <select name='type' class='form-control select' required='required'><option value='business_name'>BUSINESS NAME</option><option value='date'>DATE</option><option value='period'>PERIOD</option><option value='status'>STATUS</option></select><input type='text' name='query' class='form-control' required='required'><button style='margin-left:4px;border:1px solid lightgrey;' name='check' type='submit' class='btn btn-info'><i class='fa fa-search'></i> SEARCH</button>
 
</form>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
<?php

 if(isset($_GET['id'])){ $r=new payment($_GET['id']); 
 $r->delete_payment();
 echo '<script>alert("ITEM WAS DELETED!"); window.location.href="all-payment.php";</script>
';  } 
 $alldata=payment::read_payment(); $column=payment::payment_constants(); 
 if(isset($_GET['check']) && isset($_GET['type']) && isset($_GET['query'])){ 
 if(in_array($_GET['type'],$column)){ 
 $alldata=payment::search_payment($_GET['type'],$_GET['query']); }
 else{
 $alldata=payment::read_payment();
} 
 if(isset($_GET['date1']) && isset($_GET['date2'])){
 extract($_GET); 
  $alldata= payment::check_between_dates_payment($date1,$date2); 
 } 
 } 
  ?>
<center><b><?php

 echo count($alldata); 
 
  ?> Records Found. <?php

 if(isset($_GET['type']) && isset($_GET['query'])){ echo 'search results for: '.$_GET['type'].' / '.$_GET['query']; }
 
  ?></b></center><p><hr><p>
 <div class='table-responsive'>

<table style='width:100%;' border='1' cellpadding='2' class='table table-striped table-hover table-bordered table-condensed' id='table'>
 <thead>
<tr><th class='business_name'>BUSINESS NAME</th><th class='date'>DATE</th><th class='period'>PERIOD</th><th class='status'>STATUS</th><td class='Edit'><i class='fa fa-edit'></i> Update</td><td class='Delete'><i class='fa fa-trash'></i> Delete</td></tr>
</thead><tbody>
 <?php

 
 for($i=0; $i<count($alldata); $i++){ 
 $raw=$alldata[$i]; 
 
  ?><tr><td class='business_name'><?php

 echo $raw['business_name']; 
 
  ?></td><td class='date'><?php

 echo $raw['date']; 
 
  ?></td><td class='period'><?php

 echo $raw['period']; 
 
  ?></td><td class='status'><?php

 echo $raw['status']; 
 
  ?></td><td class='Edit'><a href='add-payment.php?id=<?php

 echo $raw['payment_id']; 
 
  ?>' class='btn btn-success'><i class='fa fa-edit'></i> EDIT</a></td><td class='Delete'><a href='all-payment.php?id=<?php

 echo $raw['payment_id']; 
 
  ?>' class='btn btn-danger'><i class='fa fa-trash'></i> TRASH</a></td> </tr><?php

 } 
 
  ?>
</tbody></table>
  </div>

 
  </div>

 
  </div>
<?php

 include_once('foot.php'); 
 
   ?>