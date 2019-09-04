<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>conect to DB</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
DEFINE ('DB_USER', 'trang');
DEFINE ('DB_PASSWORD', 'trang123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sitename');
// connect to DB
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// set utf8
mysqli_set_charset($dbc, 'utf8');
        ?>
    </body>
</html>
