$(document).ready(function() {
	
	//Function to load countries in select 
	$.ajax({url:"getcountries.php", success:function(result){
		var jsonObj = JSON.parse(result);
		for(var i=0; i< jsonObj.length; i++){
		  $("#country").append('<option value='+jsonObj[i]+'>'+jsonObj[i]+'</option>');
		}
	}});

	//Function to load states of the country
	$("#country").change(function(){
      $("#state").empty();
      $.ajax({url:"getstates.php?country="+$("#country").val(), success:function(result){
        var jsonObj = JSON.parse(result);
        for(var i=0; i< jsonObj.length; i++){
          $("#state").append('<option value='+jsonObj[i]+'>'+jsonObj[i]+'</option>');
        }
      }});
    });
});