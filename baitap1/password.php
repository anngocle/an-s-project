<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    
        <title>change password </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <?php include "includes/header1.php" ?>
    </head>
    <body>
        <?php
        // put your code here                                           
        // Check for form submission:	 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){	
        require ("includes/dbconnect1.php"); // Connect to the db. 	
	$errors = array( ); // Initialize an error array.     
            
        // Check for an email address:
    if (empty($_POST['email'])){
	 $errors[] = 'You forgot to enter your email address.'; 
             } 
    else {
	 $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
         }
	// Check for the current password:
    if (empty($_POST['pass'])){
	 	$errors[] = 'You forgot to enter your current password.';
	     } 
    else {
	 	$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	      }
        // Check for a new password and match
 	 // against the confirmed password:
    if (!empty($_POST['pass1'])){
	 if ($_POST['pass1'] != $_POST['pass2']){
	 	 $errors[] = 'Your new password did not match the confirmed password.';
             } 
         else {
	 	 $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
	 }
         } 
    else {
	 	 $errors[] = 'You forgot to enter your new password.';
	 }
    
    if (empty($errors)) { // If everything's OK.
	// Check that they've entered the right email address/password combination:
	 $q = "SELECT user_id FROM users WHERE (email='$e' AND pass=SHA1('$p') )";
	 $r = @mysqli_query($dbc,$q);// run query
	 $num = @mysqli_num_rows($r);
      if ($num == 1) { // Match was made.
        // Get the user_id:
	 $row = mysqli_fetch_array($r, MYSQLI_NUM);
 	// Make the UPDATE query:
	$q = "UPDATE users SET pass=SHA1('$np') WHERE user_id=$row[0]";	
	$r = @mysqli_query($dbc, $q);// run query	 	 	
           if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
	// Print a message.
 echo '<h1>Thank you!</h1> <p>Your password has been updated. In Chapter 12 you will actually be able to login!</p><p><br /></p>';	
	   }
           else { // If it did not run OK.
	// Public message:
 echo '<h1>System Error</h1><p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>';
	 	 	 // Debugging message:
	 	 	echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
                }
        mysqli_close($dbc); // Close the database connection.
	  // Include the footer and quit the script (to not show the form).
         include ('includes/footer1.php');
         exit();
       }
      else { // Invalid email address/password combination.
	echo '<h1>Error!</h1><p class="error">The email address and password do not match those on file.</p>';
           }
    }
    else { // Report the errors.
echo '<h1>Error!</h1><p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) { //Print each error.
	 echo " - $msg<br />\n";
	 	}
	echo '</p><p>Please try again.</p><p><br /></p>';
         } // End of if (empty($errors)) IF. 	
} // End of the main Submit conditional
        
        
        ?>
        
        <h1>Change Your Password</h1>
	 <form action="password.php" method="post">
<p>Email Address: <input type="text" name="email" size="20" maxlength="60" 
                         value="<?php if (isset($_POST['email']))echo $_POST['email']; ?>" /> </p>
<p>Current Password: <input type="password" name="pass" size="10" maxlength="20" 
                         value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" /></p>
<p>New Password: <input type="password" name="pass1" size="10" maxlength="20" 
                        value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
<p>Confirm New Password: <input type="password" name="pass2" size="10" maxlength="20" 
                                value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
<p><input type="submit" name="submit" value="Change Password" /></p>
	 </form>
	 
    </body>
</html>
