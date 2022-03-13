<?php
session_start();
if(isset($_SESSION['staff_login'])){
	
	header('location:staff_profile.php') ;
	
}


 ?>
<html>
<head>
    <title>Staff Page</title>
  
    

    </head>
    <body>
        
	 <?php include'header.php' ?>
        <div class="staff_login_container">
            
            <form method="post"> 
                
      <br>
        <div class="formspace">
		<p class="formspace2">
    
        <div class="form">
            
        <label class="login">Staff</label>
        <div class="input_field">  
        <label class="userdetail">Staff ID</label><br>
        <input class="customer_id" type="text" name="staff_id" required /><br>
        <label class="userdetail">Password</label><br>
        <input class="password" type="password" name="password" required/><br>
        <input class="login-btn" type="submit" name="staff_login-btn" value="LOGIN"/><br>
  
            
        </div>
                </div>
							</div>  </div>
            </form>
        <br>
        
        
    </body>
</html> 

<?php include 'staff_login_process.php'?>

