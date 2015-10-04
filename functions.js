$(document).ready(function(){

});


function fetchSubmission(handle){
	var url = "http://codeforces.com/api/user.status?handle="+handle+"&jsonp=parseResponse";
	$.ajax({		
		type: 'GET',
		url: url,
		jsonpCallback: "parseResponse",
		jsonp: "callback",
		dataType: 'jsonp',

		success: function(submission){
			console.log("success!");
			remodel_submission_data(submission,handle);
		}
	});
}


function remodel_submission_data(submission,handle){	
	var data= new Object();	
	$(submission.result).each(function(i){		
		var ret = new Object();
		ret["submission_ID"]= submission.result[i].id;
		ret["user_ID"]= handle;  /// scope of var
		ret["problem_ID"]=submission.result[i].problem.contestId+submission.result[i].problem.index;
		ret["problem_Name"]=submission.result[i].problem.name;
		ret["verdict"]=submission.result[i].verdict;

		data[i]=ret;
	});
	
	console.log(data);
	return data;
}


function postSubmission(dat){
	//console.log(dat);
	$.ajax({
		type: 'POST',
		url: "./update_submissions.php",
		data: dat,
		error: function(){
			console.log("something went wrong!");
		},
		success: function(dat){			
			console.log("successfully updated user submissions");						
		}
	});
}