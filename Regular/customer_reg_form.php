<?php ob_start() ?>

<html>
<head>
	<meta charset="utf-8">
	
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/customer_reg_form.css"/>
    
	<?php include'header.php';  ?>
    </head>
    <body onload='document.emailform.email.focus()'>
    <div class="container_regfrm_container_parent">
	<h3>Online Account Opening Form</h3>
	<div class="container_regfrm_container_parent_child">
		<form name="emailform" action="#" method="post">
				 <input type="text" name="name" placeholder="Name" required />
				 <select name ="gender" required >
					  <option class="default" value="" disabled selected>Gender</option>
					  <option value="Male" required >Male</option>
					  <option value="Female">Female</option>
					  <option value="Others">Others</option>
				</select>
				 <input type="text" name="mobile" placeholder="Mobile no" required />
				 <input type="text" name="email" placeholder="Email id" />
				 <input type="text" name="landline" placeholder="Landline no" />
				 <input type="text" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" required />
				 <input type="text" name="pan_no" placeholder="PAN Number" required />
				 <input type="text" name="citizenship" placeholder="Citizenship Number" required />
				 <input class="address" type="text" name="homeaddrs" placeholder="Home Address" required  />
				 <input class="address" type="text" name="officeaddrs" placeholder="Office Address" />
				 <input type="text" name="country" placeholder="Bangladesh" value="Bangladesh" readonly="readonly" />



				 <select name ="state" required >
					  <option class="default" value="" disabled selected>State</option>
					  
					  <option value="Barishal">Barishal</option>
					  <option value="Dhaka">Dhaka</option>
					  <option value="Chattogram">Chattogram</option>
					  <option value="Dhaka">Dhaka</option>
					  <option value="Khulna">Khulna</option>
					  <option value="Rajshahi">Rajshahi</option>
					  <option value="Rangpur">Rangpur</option>
					  <option value="Mymensing">Mymensing</option>
					  <option value="Sylhet">Sylhet</option>
				</select>



				 <select name ="city" required >
					  <option class="default" value="" disabled selected>City</option>
					  <option value="Bhairab">Bhairab</option>
					  <option value="Bogra">Bogra</option>
					  <option value="Brahmanbaria">Brahmanbaria</option>
					  <option value="Chandpur">Chandpur</option>
					  <option value="Chowmuhani">Chowmuhani</option>
					  <option value="Chuadanga">Chuadanga</option>
					  <option value="Comilla Sadar">Comilla Sadar</option>
					  <option value="Cox's Bazar">Cox's Bazar</option>
					  <option value="Dinajpur">Dinajpur</option>
					  <option value="Dhaka">Dhaka</option>
					  <option value="Faridpur">Faridpur</option>
					  <option value="Feni">Feni</option>
					  <option value="Jamalpur">Jamalpur</option>
					  <option value="Jessor">Jessor</option>
					  <option value="Jhenaidah">Jhenaidah</option>
					  <option value="Kadam Rasul (Bandar)">Kadam Rasul (Bandar)</option>
					  <option value="Kaliakari">Kaliakari</option>
					  <option value="Kishoreganj">Kishoreganj</option>
					  <option value="Kushtia">Kushtia</option>
					  <option value="Maijdee">Maijdee</option>
					  <option value="Naogaon">Naogaon</option>
					  <option value="Narayanganj">Naryanganj</option>
					  <option value="Narshindi">Narshindi</option>
					  <option value="Nawabganj">Nawabganj</option>
					  <option value="Pabna">Pabna</option>
					  <option value="Saidpur">Saidpur</option>
					  <option value="Satkhira">Satkhira</option>
					  <option value="Savar">Savar</option>
					  <option value="Siddhirganj">Siddhirganj</option>
					  <option value="Sirajganja">Sirajganja</option>
					  <option value="Sreepur">Sreepur</option>
					  <option value="Tangail">Tangail</option>
					  <option value="Tarabo">Tarabo</option>
					  <option value="Tongi">Tongi</option>
					  
				</select>



				 
				 <input type="text" name="pin" placeholder="Pin Code" required />
				 <input type="text" name="arealoc" placeholder="Area/Locality" required />
				 <input type="text" name="nominee_name" placeholder="Nominee Name (If any)" />
				 <input type="text" name="nominee_ac_no" placeholder="Nominee Account no"  />
				 
				 <select name ="acctype" required >
					  <option class="default" value="" disabled selected>Account Type</option>
					  <option value="Saving">Saving</option>
					  <option value="Current">Current</option>
				</select>
				<input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.emailform.email)">
				</form>
				<script src="email-validation.js"></script>
         </div>
		 </div>
		
		 
<?php include'footer.php';?>
    
</body>
</html>


<?php 

if(isset($_POST['submit'])){

	session_start();
	$_SESSION['$cust_acopening'] = TRUE;
	$_SESSION['cust_name']=$_POST['name'];
	$_SESSION['cust_gender']=$_POST['gender'];
	$_SESSION['cust_mobile']=$_POST['mobile'];
	$_SESSION['cust_email']=$_POST['email'];
	$_SESSION['cust_landline']=$_POST['landline'];
	$_SESSION['cust_dob']=$_POST['dob'];
	$_SESSION['cust_pan=']=$_POST['pan_no'];
	$_SESSION['cust_citizenship']=$_POST['citizenship'];
	$_SESSION['cust_homeaddrs']=$_POST['homeaddrs'];
	$_SESSION['cust_officeaddrs']=$_POST['officeaddrs'];
	$_SESSION['cust_country']=$_POST['country'];
	$_SESSION['cust_state']=$_POST['state'];
	$_SESSION['cust_city']=$_POST['city'];
	$_SESSION['cust_pin']=$_POST['pin'];
	$_SESSION['arealoc']=$_POST['arealoc'];
	$_SESSION['nominee_name']=$_POST['nominee_name'];
	$_SESSION['nominee_ac_no']=$_POST['nominee_ac_no'];
	$_SESSION['cust_acctype']=$_POST['acctype'];
	
	header('location:cust_regfrm_confirm.php');
	
	
}

?>