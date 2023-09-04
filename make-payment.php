<?php include_once("head.php"); ?>
<div class="row">
<div class="col-md-12">
                     <h2>Revenue</h2>   
                        <h5>Make Payment</h5>
                       
                    </div>
                </div>
                 <hr />
<div class="row">
   <div class="col-md-12">
      <?php if (isset($_POST['go'])) {
         extract($_POST);
         $p=new payment();
         $status="Pending Approval";
         $p->create_payment($business_name,$date,$Period,$status,$Amount,$payment_method,$business_type);
         echo "<script>alert('payment was sent.'); window.location.href='make-payment.php';</script>";
      } ?>
      <form method="POST">
         <div class="row form-group">
            <div class="col-12 col-sm-4">Business Name</div>
            <div class="col-12 col-sm-9">
               <input type="text" name="business_name" value="<?php echo $_SESSION['user_details']['business_name']; ?>" class="form-control" required readonly>

            </div>
         </div>
         

         <div class="row form-group">
            <div class="col-12 col-sm-4">Business Type</div>
            <div class="col-12 col-sm-9">
               <input type="text" name="business_type" value="<?php echo $_SESSION['user_details']['type_of_business']; ?>" class="form-control" required>

            </div>
         </div>

         <div class="row form-group">
            <div class="col-12 col-sm-4">Date of Payment</div>
            <div class="col-12 col-sm-9">
               <input type="date" name="date"  class="form-control" required>

            </div>
         </div>

         <div class="row form-group">
            <div class="col-12 col-sm-4">Period</div>
            <div class="col-12 col-sm-9">
               <select name="Period"  class="form-control" required>
                  <option value="2023/2024">2022/2023</option>
                  <option value="2024/2025">2024/2025</option>
                  <option value="2025/2026">2025/2026</option>
               </select>

            </div>
         </div>

         <div class="row form-group">
            <div class="col-12 col-sm-4">Payment Method</div>
            <div class="col-12 col-sm-9">
               <select name="payment_method"  class="form-control" required>
                  <option value="Mpesa">Mpesa</option>
                  <option value="Cash">Cash</option>
                  <option value="Other">Other</option>
               </select>

            </div>
         </div>

         <div class="row form-group">
            <div class="col-12 col-sm-4">Amount Paid (KES)</div>
            <div class="col-12 col-sm-9">
               <input type="number" name="Amount"  class="form-control" required>

            </div>
         </div>


         <button type="submit" name="go" class="btn btn-primary btn-lg btn-block"> SUBMIT PAYMENT</button>

      </form>

   </div>
</div>


<?php include_once("foot.php"); ?>