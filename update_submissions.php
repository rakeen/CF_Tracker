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



	 function update($handle,$dbhandle){

	 	//$url = "http://codeforces.com/api/user.status?handle=".$handle."&from=350&count=450";	 	
	 	$url = "http://codeforces.com/api/user.status?handle=".$handle;	 	
	 	$json = file_get_contents($url);
	 	$obj = json_decode($json);
	 	 	
	 	foreach ($obj->result as $i) {	  		  		 		
	 		set_time_limit(100);
		  	$subID = $i->id;
		  	$problemId = (string)$i->problem->contestId . (string)$i->problem->index;  // concatenate operator .
		  	$problemName = $i->problem->name;
		  	$verdict = $i->verdict;
		  	$submissionDate = $i->creationTimeSeconds; // unix timestamp
		  	$submissionDate = date('Y-m-d H:i:s',$submissionDate);
		  	//echo $submissionDate."<br>";
		  	//$handle = $i->author->members[0]->handle;

		  	//$sql = "INSERT INTO submissions (submission_ID,user_ID,problem_ID,problem_Name,verdict) VALUES ('$subID','$handle','$problemId','$problemName','$verdict')";
		  	$sql = "INSERT INTO submissions VALUES ('$subID','$submissionDate','$handle','$problemId','$problemName','$verdict')";
		  	//$sql = "INSERT INTO submissions (submission_ID,user_ID) VALUES ($subID,$handle)";
		  	if(!$sql) die(mysql_error());
		  	mysql_query($sql);	  		  			  	
	    }
	 }

	$sql= "SELECT Handle FROM info";
	$result = mysql_query($sql);

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	//printf("name: %s", $row["Handle"]);
    	update($row["Handle"],$dbhandle);
	}
	//update("rakeen",$dbhandle);
	mysql_close($dbhandle);



?>
