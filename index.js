var input = document.getElementById("name");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("getStock").click();
  }
});


function showRelativeStock(name)
{
	$.ajax({
		url: "php/relativeStock.php",
		data: {
			name: name
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			document.getElementById( "releativeStock" ).innerHTML = output;
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function showBasicInformation()
{
var name = $("#name").val();
	$.ajax({
		url: "php/basicInformation.php",
		data: {
			name: name
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			document.getElementById( "BasicInormation" ).innerHTML = output;
			// showRelativeStock(name);
			showCurrentStatus(name);
			// showanalyze(name);
			// showPlaceOrderArea(name);
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function showCurrentStatus(name)
{
	$.ajax({
	url: "currentStatus.php",
	data: {
		name:name
	},
	type: "POST",
	datatype: "json",
		success: function( output ) {
	   $( "#currentStatus" ).html(output);
		},
	error : function(){
		alert( "Request failed." );
	}
	});

}