<?php
	$username = "rak1";
	$password = "";
	$hostname = "0.0.0.0"; 

	//connection to the database
	$dbhandle = mysql_connect($hostname, $username, $password) 
	  or die("Unable to connect to MySQL");
	echo "Connected to MySQL<br>"."<br><br><br>";



	//select a database to work with
	$selected = mysql_select_db("cf_user",$dbhandle) 
	  or die("Could not select cf_user db");

?>



	<form action="#" method="post">
	<select name="opt">
		<option value="all">All Time</option>
		<option value="week">Last Week</option>
		<option value="month">Last Month</option>		
	</select>
	<input type="submit" name="submit" value="select" />
	</form>




<?php
	error_reporting(0);


	function weeklyF(){
		$sql = "SELECT Handle FROM info";
		$result = mysql_query($sql);				

		while($row = mysql_fetch_assoc($result)){

			$nm = $row["Handle"];
			$oneWeekB4 = date('Y-m-d H:i:s' ,time()-(7 * 24 * 60 * 60));

			$subSql = "SELECT COUNT(*) AS id FROM submissions WHERE `user_ID`='$nm'  AND  `submission_Time` > '$oneWeekB4' ";
			
			$subResult = mysql_query($subSql);
			$subNum = mysql_fetch_array($subResult);
			$subCnt = $subNum["id"];

			echo $row["Handle"]."   "." -> ".$subCnt."<br>";
		}
	}

	function monthlyF(){
		$sql = "SELECT Handle FROM info";
		$result = mysql_query($sql);				

		while($row = mysql_fetch_assoc($result)){

			$nm = $row["Handle"];
			$oneWeekB4 = date('Y-m-d H:i:s' ,time()-(7 * 24 * 60 * 60*30));

			$subSql = "SELECT COUNT(*) AS id FROM submissions WHERE `user_ID`='$nm'  AND  `submission_Time` > '$oneWeekB4' ";
			
			$subResult = mysql_query($subSql);
			$subNum = mysql_fetch_array($subResult);
			$subCnt = $subNum["id"];

			echo $row["Handle"]."   "." -> ".$subCnt."<br>";
		}
	}

	function allTime(){
		$sql = "SELECT Handle FROM info";
		$result = mysql_query($sql);				

		while($row = mysql_fetch_assoc($result)){

			$nm = $row["Handle"];
			$oneWeekB4 = date('Y-m-d H:i:s' ,time());

			$subSql = "SELECT COUNT(*) AS id FROM submissions WHERE `user_ID`='$nm'  AND  `submission_Time` < '$oneWeekB4' ";
			
			$subResult = mysql_query($subSql);
			$subNum = mysql_fetch_array($subResult);
			$subCnt = $subNum["id"];

			echo $row["Handle"]."   "." -> ".$subCnt."<br>";
		}	
	}	
	



	if($_POST['opt']=="week") weeklyF();
	else if($_POST['opt']=="month") monthlyF();
	else allTime();
?>