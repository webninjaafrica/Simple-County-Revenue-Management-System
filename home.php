<?php include_once("head.php"); ?>
<div class="row">
<div class="col-md-12">
                     <h2>Home</h2>   
                        <h5>Welcome <?php echo $_SESSION['user_details']['full_names']; ?>, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <hr />
<div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
         <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-money"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo count(payment::search_marched_payment("status","Pending Approval")); ?> New</p>
                    <p class="text-muted">Pending Payments</p>
                </div>
             </div>
           </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
         <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-briefcase"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo count(payment::read_payment()); ?> Transactions</p>
                    <p class="text-muted">Revenue Collected</p>
                </div>
             </div>
           </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
         <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-info-circle"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">0 New</p>
                    <p class="text-muted">Via Mpesa Today</p>
                </div>
             </div>
           </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
         <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-laptop"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo count(users::read_users()); ?> Total</p>
                    <p class="text-muted">Businesses</p>
                </div>
             </div>
           </div>
         </div>


         <div class="row">
                <div class="col-12"> 


                <div class="row">
      <div class="col-md-12">
            <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                  <form method="GET" class="form-inline">
                     Enter Business Name To Search Payments:<br>
                     <input type="text" name="search" class="form-control" required>
                     <button class="btn btn-danger"><i class="fa fa-search"></i> Search</button>
                  </form>
               </div>
            </div>
         <table class="table table-striped" style="width:100%;" border="1">
            <thead>
               <tr style="background:black;color: whitesmoke;">
                  <th>S.no</th> <th>Business name</th>  <th>Business Type</th> <th>Period</th> <th>Date</th> <th>Amount (KES)</th> <th>Payment Method</th> <th>Status</th>
                  <?php if ($role=='admin'){ ?><th>Approve</th><?php } ?>
               </tr>
            </thead>
            <tbody>
               <?php 
               $p=payment::read_payment();

               if (isset($_GET['search'])) {
                  $p=payment::search_marched_payment('business_name',$_GET['search']);
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
                </div>
         </div>
<?php include_once("foot.php"); ?>