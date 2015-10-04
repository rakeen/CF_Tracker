
	

<form id="" class=""  method="post" action="post.php">
	<input id="handle" name="handle" type="text" value="" />		

	<input id="saveForm" class="submitButton" type="button" name="save" value="Save" />
</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {		

    	$(".submitButton").click(function(){    		    		
    		var handle=$("#handle").val();
    		var data = new Object();
    		$.ajax({
    		  type: "GET",			  
    		  url: "http://codeforces.com/api/user.info?handles="+handle+"&jsonp=parseResponse",			  
    		  jsonpCallback: "parseResponse",
			  jsonp: "callback",
			  dataType: "jsonp",

			  success: function(user){			  				  	
			  	data["handle"]=user.result[0].handle;
			  	data["rank"]=user.result[0].rank;
			  	data["rating"]=user.result[0].rating;
			  	data["organization"]=user.result[0].organization;
			  	data["city"]=user.result[0].city;
			  	data["country"]=user.result[0].country;
			  	//data+= "handle"+user.result[0].handle+"&rank"+user.result[0].rank+"&rating"+user.result[0].rating+"&organization"+user.result[0].organization+"&city"+user.result[0].ciy+"&country"+user.result[0].country;			  	
			  	//console.log("success");
			  	//console.log(user.result[0].city);			  				  	
			  	
			  	$.ajax({
			  		type: "POST",
			  		url: "./post.php",
			  		data: data,
			  		error: function(){
			  			console.log("something went wrong!");
			  		},
			  		success: function(){
			  			console.log("data sent successgully! :) ");
			  		}
			  	});
			  },
			  error: function(){
			  	console.log("something went wrong!");
			  }

			});
    	});    	

	});

</script>