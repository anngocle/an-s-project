<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chào mừng đến trang quản trị OPX MCU </title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <?php include "includes/header1.php" ?> 
    </head>
    
 <body>  
     
     
     
        <?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
require ("includes/dbconnect1.php"); // Connect to the db.
	 	 	
	 $errors = array(); // Initialize an error array.
 	 // Check for a first name:
 	 if (empty($_POST['first_name'])) {
 	 	 $errors[] = 'You forgot to enter your first name.';
 	 } else {
 $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	 	 }
	 	 // Check for a last name:
	 	 if (empty($_POST['last_name'])) {
	 	 	 $errors[] = 'You forgot to enter your last name.';
	 	 } else {
 $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));	
                 }
	 	 // Check for an email address:
 	 if (empty($_POST['email'])) {
	 	 	 $errors[] = 'You forgot to enter your email address.';
 	 } else {
 $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	 	 }
	 	 // Check for a password and match against the confirmed password:
	 	 if (!empty($_POST['pass1'])) {
 	 	 if ($_POST['pass1'] != $_POST['pass2']) {
	 	 	 	 $errors[] = 'Your password did not match the confirmed password.';
	 	 	 } else {
 $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));	 	 	 }
	 	 } else {
	 	 	 $errors[] = 'You forgot to enter your password.';
	 	 }
	 	
	 	 if (empty($errors)) { // If everything's OK.
	 	
	 	 	 // Register the user in the database...
	 	 	
	 	 	 // Make the query:
	 	 	 $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES
('$fn', '$ln', '$e', SHA1('$p'), NOW( ) )";	 	
	 	 	 if ($r) { // If it ran OK.
	 	 	 	 // Print a message:
	 	 	 	 echo '<h1>Thank you!</h1>
	 	 	 <p>You are now registered. In Chapter 12 you wi $r = @mysqli_query ($dbc, $q); // Run the query.
ll actually be able to log in!</p><p>	
	 	 	 <br /></p>';	
	 	 	
	 	 	 } else { // If it did not run OK.
	 	 	 	
	 	 	 	 // Public message:
	 	 	 	 echo '<h1>System Error</h1>
	 	 	 	 <p class="error">You could not be registered due to a system error. We apologize for
any inconvenience.</p>';
	 	 	 	
	 	 	 	 // Debugging message:
	 	 	 	 echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	 	 	 	 	 	 	
	 	 	 } // End of if ($r) IF.
	 	 	
	 	 	 mysqli_close($dbc); // Close the database connection.
	
	 	 	 // Include the footer and quit the script:
	 	 	 include ('includes/footer.html');
	 	 	 exit( );
	 	 	
	 	 } else { // Report the errors.
        echo '<h1>Error!</h1>
	 	 	 <p class="error">The following error(s) occurred:<br />';
	 	 	 foreach ($errors as $msg) { // Print each error.
	 	 	 	 echo " - $msg<br />\n";
	 	 	 }
	 	 	 echo '</p><p>Please try again.</p><p><br /></p>';
	 	 	
	 	 } // End of if (empty($errors)) IF.
	 	
 mysqli_close($dbc); // Close the database connection.	
	 } // End of the main Submit conditional.
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
