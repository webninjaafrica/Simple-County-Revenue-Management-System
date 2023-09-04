<?php session_start();
 include_once('autoload.php');
 $error_message=''; if(isset($_SESSION['user_details']) && isset($_SESSION['user_id'])){

                        $confirm=users::login_users($_SESSION['user_details']['username'],$_SESSION['user_details']['password']);

                        $crows=$confirm['row_count'];

                        if($crows >0){
 echo '<script type="text/javascript">window.location.href="home.php";</script>'; 
}else{
 session_destroy();
 echo '<script type="text/javascript">window.location.href="login.php";</script>';
                        }
                    
}else{

                    if(isset($_POST['login'])){

                    extract($_POST);

                    $confirm_login=users::login_users($username,$password);

                    $row_count=$confirm_login['row_count'];

                    $rows=$confirm_login['rows'];

                    if($row_count >0){

                    $_SESSION['user_details']=$rows;

                    $_SESSION['user_id']=$rows['user_id'];

                    echo '<script type="text/javascript">window.location.href="home.php";</script>';
                    }else{ $error_message="<div class='alert alert-danger'>Login Failed! Incorrect username/password.</div>"; }

                    } 
                     
}
 ?>
<?php include_once("hhead.php"); ?>
        <div class="col text-col">
          

                                <form method='POST' action='login.php'>
                                <div class='card card-default' style="margin-top:45px;">
                                    <div class="card-header"><h1>Account Log In</h1></div>
                                    
                                    <div class='card-body'><?php echo $error_message; ?>

                                    <b>USERNAME:</b><br>

                                    <div class='form-group'><input type='text' class='form-control' required='required' name='username'></div>


                                    <b>PASSWORD:</b><br>

                                    <div class='form-group'><input type='password' class='form-control' required='required' name='password' placeholder='****'></div>

                                    
                                    </div>
                                    <div class='card-footer'>
                                    <button class='btn btn-info' type='submit' name='login'><i class='fa fa-padlock'></i> Login</button></div>
                            
</div>
 </form>
  </div>
     <?php include_once("ffoot.php"); ?>