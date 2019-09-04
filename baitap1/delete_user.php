<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>delete-user</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php include "includes/header1.php" ?>      

    </head>
    <body>
        <?php
        // put your code here
        // Check for a valid user ID, through GET or POST:
	 if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	 	 $id = $_GET['id'];
	 } 
         elseif ( (isset($_POST['id'])) &&(is_numeric($_POST['id'])) ) { // Form submission.
	 	 $id = $_POST['id'];
	 } else { // No valid ID, kill the script.
	 	 echo '<p class="error">This page has been accessed in error.</p>';
	 	 include ('includes/footer1.php');
	 	 exit();
	 }
         require ("includes/dbconnect1.php"); // ket noi toi db
         // Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['sure']=='Yes') {
         // delete record
         // Make the query:
 	 	 $q = "DELETE FROM users WHERE user_id=$id LIMIT 1";
 	 	 $r = @mysqli_query ($dbc, $q);// Run the query.
        if (mysqli_affected_rows($dbc) ==1) {// if it ran
                      // Print a message:
	 	echo '<p>The user has been deleted.</p>';
        }
        else{// If the query did not run OK
            echo '<p class="error">The user could not be deleted due to a system error.</p>'; // Public message
            echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';// Debugging message.
        }
    }
    else{// No confirmation of deletion.
 	 	 echo '<p>User không thể xóa.</p>';
        
    }
        
     
}else { // Show the form.
	 	 // Retrieve the user's information:
	 	 $q = "SELECT CONCAT(last_name, ',', first_name) FROM users WHERE user_id=$id";
 	 $r = @mysqli_query ($dbc, $q);	
	 	 if (mysqli_num_rows($r) == 1) {
// Valid user ID, show the form
	 	 	 // Get the user's information:
	 	 	 $row = mysqli_fetch_array ($r,MYSQLI_NUM); 	 	
	 	 	 // Display the record being deleted:
	 	 	 echo "<h3>Name: $row[0]</h3>
	 	 	 Bạn có muốn xóa user này không ?";	 	 	
	 	 	 // Create the form: 	 	 
echo '<form action="delete_user.php" method="post">
<input type="radio" name="sure" value="Yes" /> Yes
<input type="radio" name="sure" value="No" checked="checked" /> No
<input type="submit" name="submit" value="Apply" />
<input type="hidden" name="id" value="' . $id . '" />
</form>';	 	
	 	 } else { // Not a valid user ID.
	 	 	 echo '<p class="error">This page has been accessed in error.</p>';
	 	 }
    
}   // End of the main submission conditional
mysqli_close($dbc);
        ?>
    </body>
</html>
