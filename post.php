<?php
$username = "rak1";
$password = "";
$hostname = "0.0.0.0"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";



//select a database to work with
$selected = mysql_select_db("c9",$dbhandle) 
  or die("Could not select c9 db");
/*
if (isset($_POST['save'])) 
  {
    $formData =  array(
      "handle"=> mysql_real_escape_string($_POST['handle']),
      "rank"=> mysql_real_escape_string($_POST['rank']),
      "rating"=> mysql_real_escape_string($_POST['rating']));
    
    

    //$myDB->addNewStore($formData);
  }*/

	  $handle = $_POST['handle'];
    $rank = $_POST['rank'];
    $rating = $_POST['rating'];
    $organization = $_POST['organization'];
    $city = $_POST['city'];
    $country = $_POST['country'];

  $sql = "INSERT INTO info".
		"(Handle,Rank,Rating,Institution,City,Country)".
		"VALUES".
		"('$handle','$rank','$rating','$organization','$city','$country')";

	mysql_query($sql,$dbhandle);
	mysql_close($dbhandle);
?>


