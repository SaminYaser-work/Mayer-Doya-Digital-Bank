<?php
ob_start();
session_start();
if(isset($_SESSION['customer_login'])){
	
	header('location:customer_profile.php') ;
	
}


 ?>
<html>
<head>
    <title>Login Page</title>
  


    </head>
    <body>
        
	 <?php include'header.php' ?>
        <div class="login_container">
            
            <form method="post"> 
                
      <br>
        <div class="formspace">
		<p class="formspace2">
    
        <div class="form">
            
        <label class="login">LOGIN</label>
        <div class="input_field">  
           
        <label class="userdetail">Customer ID</label><br>
        <input class="customer_id" type="text" name="customer_id" required /><br>
        <label class="userdetail">Password</label><br>
        <input class="password" type="password" name="password" required/><br>
        <input class="login-btn" type="submit" name="login-btn" value="LOGIN"/><br>
        
            
        </div>
                </div>
							</div>  </div>
            </form>
        <br>
        
  
    </body>
</html> 

<?php include 'customer_login_process.php'?>

