<?php include_once("head.php"); 
$error_message="";
if (isset($_GET['approve'])) {
   payment::setStatus($_GET['approve']);
   $error_message="<div class='alert alert-success'>Payment Approved</div>";
}

?>
<div class="row">
<div class="col-md-12">
                     <h2>Home</h2>
                     <?php if ($role=='admin'){ ?><h5><i class="fa fa-money"></i> All Revenue</h5><?php }else{ ?>
                        <h5><i class="fa fa-money"></i> My Payments</h5><?php } ?>
                       
                    </div>
                 <hr />
                    </div>


      <div class="row">
      <div class="col-md-12">

         <table class="table table-striped">
            <thead>
               <tr>
                  <th>S.no</th> <th>Business name</th>  <th>Business Type</th> <th>Period</th> <th>Date</th> <th>Amount (KES)</th> <th>Payment Method</th> <th>Status</th>
                  <?php if ($role=='admin'){ ?><th>Approve</th><?php } ?>
               </tr>
            </thead>
            <tbody>
               <?php if ($role!=='admin'){ $p=payment::search_marched_payment('business_name',$_SESSION['user_details']['business_name']);
            }else{
               $p=payment::read_payment();
              
            }

             if (!is_array($p)) {
                 $p=array();
               }
               for ($i=0; $i < count($p); $i++) {  ?>

                  <tr>
                     <td><?php echo $p[$i]['payment_id']; ?></td>
                     <td><?php echo $p[$i]['business_name']; ?></td>
                     <td><?php echo $p[$i]['business_type']; ?></td>
                     <td><?php echo $p[$i]['period']; ?></td>
                     <td><?php echo $p[$i]['date']; ?></td>
                     <td><?php echo $p[$i]['Amount']; ?></td> 
                     <td><?php echo $p[$i]['payment_method']; ?></td>
                     <td><?php echo $p[$i]['status']; ?></td>
                     <?php if ($role=='admin'){ ?><td>
                        <a href='?approve=<?php echo $p[$i]['payment_id']; ?>' class='btn btn-success btn-sm'><i class="fa fa-check"></i> Approve</a></td><?php } ?>
                  </tr>
            

            <?php }  ?>
            </tbody>

         </table>
      </div>
      </div>
<?php include_once("foot.php"); ?>