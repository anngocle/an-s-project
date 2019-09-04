<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View User logined</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php include "includes/header1.php" ?>
    </head>
    <body>
        
        
        <?php
        //AS dr,user_id FROM users ORDER BY registration_date ASC"
        // Register the user in the database...
 	 require ("includes/dbconnect1.php");
         
         $display = 20; // gán cho biến display số dòng nhận max là 20
         // Determine how many pages there are...
 if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.	
 $pages = $_GET['p'];
} else{ // need to determine
    // Count the number of records:
 $q = "SELECT COUNT(user_id) FROM users";
 $r = @mysqli_query ($dbc, $q);
 $row = @mysqli_fetch_array ($r,MYSQLI_NUM);
 $records = $row[0];
 // Calculate the number of pages...
 if ($records > $display) { // More than 1 page.
 $pages = ceil ($records/$display);
 } else {
 $pages = 1;
 }
    
}// End of p IF
     // Determine where in the database to start returning results...    
     
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
 $start = $_GET['s'];
 } else {
 $start = 0;
 }
         // make query to db
$q = "SELECT last_name,first_name,email, DATE_FORMAT(registration_date,'%M %d, %Y')AS dr,user_id FROM users ORDER BY registration_date ASC LIMIT $start, $display"; 
// put your code here
         $r = @mysqli_query ($dbc, $q); // Run the query.
         // Count the number of returned rows:
         $num = mysqli_num_rows($r);
         if ($num>0) {
             // Print how many users there are:
echo "<p>There are currently $num registered users.</p>\n";
//table header
echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
<tr>
<tr>
<td align="left"><b>Edit</b></td>
<td align="left"><b>Delete</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Email </b></td>
<td align="left"><b>Date Registered</b></td>
<td align="left"><b>Change_time</b></td>
</tr>';
// Fetch and print all the records....
$bg = '#eeeeee'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $bg = ($bg=='#eeeeee' ? '#ffffff' :'#eeeeee'); // Switch the background color.
    
echo '<tr bgcolor="' . $bg . '">
<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>    
<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
<td align="left">' . $row['last_name'] . '</td>
<td align="left">' . $row['first_name'] . '</td>
<td align="left">'.$row['email'].'</td>
<td align="left">' . $row['dr'] . '</td>
    
</tr>';
}
echo '</table>'; // Close the table.
 	
 mysqli_free_result ($r); // Free up the resources.	
	
 } else { // If it did not run OK.

 	 // Public message:
 	 echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>'; 	
 	 // Debugging message:
 	 echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	 	
 } // End of if ($r) IF.

	 mysqli_close($dbc); // Close the database connection.
	
         // Make the links to other pages, if necessary.
 if ($pages >1) {
	 	 // Add some spacing and start a paragraph:
	echo '<br /><p>';
	 	 // Determine what page the script is on:	
 $current_page = ($start/$display)+1;
	 	 // If it's not the first page, make a Previous link:
 if ($current_page != 1) { 
     echo '<a href="view_users.php?s=' . ($start - $display) .'&p=' . $pages . '">Previous</a> ';
}
 
// Make all the numbered pages:
for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="view_users.php?s=' . (($display *($i - 1))) . '&p=' . $pages .'">' . $i . '</a> ';
} else {
 echo $i . ' ';
 }
} // End of FOR loop.

 // If it's not the last page, make a Next button:
 if ($current_page != $pages) {
 echo '<a href="view_users.php?s=' . ($start + $display) .'&p=' . $pages . '">Next</a>';
 }
	 	
echo '</p>'; // Close the paragraph.
	 	
 } // End of links section.

        ?>
    </body>
</html>
