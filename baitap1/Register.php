<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wellcome Register pages</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <?php include "includes/header1.php" ?>
    </head>
    <body>
        <?php
        // put your code here
        //// Check for form submission:
     
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $errors = array( ); // Initialize an error array.
            // Check for a first name:
    if (empty($_POST['first_name'])) {
 	 	 $errors[] = 'You forgot to enter your first name.';
    } 
    else {
 	 $fn = test_input($_POST['first_name']);
         
     // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fn)) {
      $errors[] = "Only letters and white space allowed"; 
            }          
    }
         // Check for a last name:
    if (empty($_POST['last_name'])) {
 	 $errors[] = 'You forgot to enter your last name.';
        } 
    else {
 	 $ln = test_input($_POST['last_name']);
     // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$ln)) {
      $errors[] = "Only letters and white space allowed"; 
        }              
    }

 // Check for an email address:
    if (empty($_POST['email'])) {
	 $errors[] = 'You forgot to enter your email address.';
	 } 
    else {
 	 $e = test_input($_POST['email']);
         // check if e-mail address is well-formed
        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "mail khong hop le"; 
        }
    }

 // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
	if ($_POST['pass1'] != $_POST['pass2']) {
 	 	 	 $errors[] = 'Your password did not match the confirmed password.';
 	} 
        else {
	 	 	 $p = test_input($_POST['pass1']);
 	 }
    } 
    else {
	 	 $errors[] = 'You forgot to enter your password.';
	 }
 	
    if (empty($errors)) { // If everything's OK.
 	
	 // Register the user in the database...
 	 require ("includes/dbconnect1.php"); // Connect to the db.
 	 	 // Make the query:
	 	 $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES
('$fn', '$ln', '$e', SHA1('$p'), NOW( ) )";

 	 	 $r = @mysqli_query ($dbc, $q); // Run the query.
 	 	 if ($r) { // If it ran OK.
	 	 	 	 // Print a message:
 	 	 	 echo '<h1>Thank you!</h1><p>You are now registered.</p><p>	
	 	 	 <br /></p>';	

 	 	 } else { // If it did not run OK.
 		 	 	 	 // Public message:
	 	 	 	 echo '<h1>System Error</h1>
	 	 	 	 <p class="error">You could not be registered due to a system error. We apologize for
any inconvenience.</p>';	 	
 	 	 	 // Debugging message:	 	 	 	 echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	 	 	 	 	
	 	 	 } // End of if ($r) IF.
	 	 	
 	 	 mysqli_close($dbc); // Close the database connection.
 	 	
	 	 	 // Include the footer and quit the script:
	 	 	 include ('includes/footer1.php');
	 	 	 exit( );
	 	 	
	 	 } else { // Report the errors.
	 	
	 	 	 echo '<h1>Error!</h1>
	 	 	 <p class="error">The following error(s) occurred:<br />';
	 	 	 foreach ($errors as $msg) { // Print each error.
	 	 	 	 echo " - $msg<br />\n";
	 	 	 }
	 	 	 echo '</p><p>Please try again.</p><p><br /></p>';
	 	 	
	 	 } // End of if (empty($errors)) IF.
         
        }
        //lam sach cac thong tin nguoi dung nhap vao làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        
        ?>
        
        <h1>Register</h1>
 <form action="register.php" method="post">
	 	 <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if
(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
 	 <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if
(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
 	 <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if
(isset($_POST['email'])) echo $_POST['email']; ?>" /> </p>
 	 <p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if
(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
 	 <p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20"
value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
 	 <p><input type="submit" name="submit" value="Register" /></p>	 
 </form 
     <?php include "includes/footer1.php" ?> 
 
 
    </body>
</html>
