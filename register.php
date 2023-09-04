<?php include_once("hhead.php");
 include_once('autoload.php');
  ?>
        <div class="col text-col">
          <h1>Register</h1>
          <?php $role="client"; if (isset($_POST['go'])) {
            extract($_POST);
            $user=new users();
            $user->create_users($full_names,$username,$password,$tel,$business_name,$type_of_business,$addresses,$role);
            echo "<div class='alert alert-success'>Registration successful. please <a href='login.php'> click here to login </a>.</div><style>#fr{ display: none;}</style>";
          } ?>
         <form method="POST" id="fr">
          <style type="text/css">
            .form-group{
              margin-top: 12px;
            }
          </style>
           <div class="row form-group">
             <div class="col-12 col-sm-4">Full Names</div>
             <div class="col-12 col-sm-8">
               <input type="text" name="full_names" class="form-control" required>
             </div>
           </div>

           <div class="row form-group">
             <div class="col-12 col-sm-4">Email</div>
             <div class="col-12 col-sm-8">
               <input type="email" name="username" class="form-control" required>
             </div>
           </div>

           <div class="row form-group">
             <div class="col-12 col-sm-4">Password</div>
             <div class="col-12 col-sm-8">
               <input type="password" name="password" class="form-control" required>
             </div>
           </div>

           <div class="row form-group">
             <div class="col-12 col-sm-4">Phone</div>
             <div class="col-12 col-sm-8">
               <input type="text" name="tel" class="form-control" required>
             </div>
           </div>

           

           <div class="row form-group">
             <div class="col-12 col-sm-4">Business Name</div>
             <div class="col-12 col-sm-8">
               <input type="text" name="business_name" class="form-control" required>
             </div>
           </div>

           <div class="row form-group">
             <div class="col-12 col-sm-4">Business Type</div>
             <div class="col-12 col-sm-8">
               <input type="text" name="type_of_business" class="form-control" required>
             </div>
           </div>

           <div class="row form-group">
             <div class="col-12 col-sm-4">Address</div>
             <div class="col-12 col-sm-8">
               <input type="text" name="addresses" class="form-control" required>
             </div>
           </div>


           <button type="submit" name="go" class="btn btn-primary btn-lg btn-block">
             Submit
           </button>

       </form>
        </div>
     <?php include_once("ffoot.php"); ?>