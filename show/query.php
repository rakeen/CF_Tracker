<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<?php

	$username = "rak1";
	$password = "";
	$hostname = "0.0.0.0"; 

	//connection to the database
	$dbhandle = mysql_connect($hostname, $username, $password) 
	  or die("Unable to connect to MySQL");
	//echo "Connected to MySQL<br>"."<br><br><br>";



	//select a database to work with
	$selected = mysql_select_db("c9",$dbhandle) 
	  or die("Could not select c9 db");

	error_reporting(0);

	//echo $_POST["verdict"];


	$sql = "SELECT * FROM `submissions` WHERE `submission_Time`<= \"".$_POST['start']."\" AND `submission_Time` >= \" ".$_POST['end'] ."\"";
	$sql = "SELECT * FROM `info`";	
	//echo $sql;
	$result = mysql_query($sql);
	$i=0;
?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<th>#</th>
				<th>User Name</th>
				<th>Problem Count</th>
			</thead>
			<tbody>

<?php
	while($row = mysql_fetch_assoc($result)){ 
		$i++;
		$sqlSub = "SELECT COUNT(*) FROM `submissions` WHERE `submission_Time`>= \"".$_POST['start']."\" AND `submission_Time` <= \"".$_POST['end']."\" AND `user_ID`= \"".$row['Handle']."\"";		
		//echo $sqlSub."<br>";
		$res = mysql_query($sqlSub);
		//echo $res;
		$subNum = mysql_fetch_array($res);
		$subCnt = $subNum[0];		
		//echo $subCnt;
		//echo $row['Handle'];
?>

				<tr>
					<th scope="row"> <?php echo $i; ?> </th>			
					<td> <?php echo $row['Handle']; ?> </td>			
					<td> <?php echo $subCnt; ?> </td>
				</tr>			
<?php
	}
?>

			</tbody>
					</table>
				</div>
