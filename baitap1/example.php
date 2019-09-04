<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        echo "Today is " . date("Y/m/d") . "<br>";
        // create months array()
$months = array (1 => 'January','February', 'March', 'April', 'May','June', 'July', 'August', 'September','October', 'November', 'December');
//Make the days and years arrays:
$days = range(1,31);
$years = range(2011,2031);
// Make the months pull-down menu:
echo '<select name="month">';
foreach ($months as $key =>$value){
    echo "<option value=\"$key\">$value</option>\n";
}
echo '</select>';
// Make the days pull-down menu:
echo '<select name="day">';
 foreach ($days as $value) {
 echo "<option value=\"$value\">$value</option>\n";
 }
 echo '</select>';
   // Make the years pull-down menu:
	 echo '<select name="year">';
         foreach ($years as $value) {
 echo "<option value=\"$value\">$value</option>\n";
 }
echo '</select>';      
   
// Create one array:
 $mexico = array('YU' => 'Yucatan','BC' => 'Baja California','OA' => 'Oaxaca');
 // Create another array:
$us = array ('MD' => 'Maryland','IL' => 'Illinois','PA' => 'Pennsylvania','IA' => 'Iowa');
// Combine the arrays:
$n_america = array('Mexico' => $mexico,'United States' => $us);
// Loop through the countries:
foreach ($n_america as $country =>$list) {
	// Print a heading:
	echo "<h2>$country</h2><ul>";
	 // Print each state, province, or territory:
foreach ($list as $k => $v) {
	echo "<li>$k - $v</li>\n";
	 	 }
	 	 // Close the list:
	 	 echo '</ul>';
	
	 } // End of main FOREACH
 $name = array('an','can','bong','trang');
 sort($name);// săp xep theo thu tư abc
 $dem =count($name);
 echo $dem;
 foreach ($name as $value){
     echo "$value <br>";
 }
 // Create the array:
 $movies = array (
'Casablanca' => 10,
 'To Kill a Mockingbird' => 10,
 'The English Patient' => 2,
 'Stranger Than Fiction' => 9,
 'Story of the Weeping Camel' => 5,
'Donnie Darko' => 7
);
 // Display the movies in their original order:
 echo '<tr><td colspan="2"><b>In their original order:</b></td></tr>';
foreach ($movies as $title =>$rating) {
 echo "<tr><td>$rating</td><td>$title</td></tr>\n";
 }
 ksort($movies);
 echo "<br>";
 echo '<tr><td colspan="2"><b>sort by ksoft:</b></td></tr>';
foreach ($movies as $title =>$rating) {
 echo "<tr><td>$rating</td><td>$title</td></tr>\n";
 }
 arsort($movies);
 echo '<tr><td colspan="2"><b>Sorted by rating:</b></td></tr>';
 foreach ($movies as $title =>$rating) {
echo "<tr><td>$rating</td><td>$title</td></tr>\n";
}
 
 
        ?>
    </body>
</html>
