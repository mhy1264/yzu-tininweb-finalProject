var stockCode;
var input = document.getElementById("name");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("getStock").click();
  }
});

function showVote(stock)
{
	$.ajax({
		url: "php/showVote.php",
		data: {
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
			document.getElementById("vote").innerHTML=out;
		},
		error : function(){
			alert( "Request failed." );
		}
	});

}


function doVote()
{
	console.log("in doVolt");
	console.log(stockCode);
	var option=$('input:radio[name=V]:checked').val();
	console.log(option);
	$.ajax({
		url: "php/doVote.php",
		data: {
			stock:stockCode,
			option:option
		},
		type: "POST",
		datatype: "html",
		success: function( out ) {
        	document.getElementById("showVoteResult").innerHTML=out;
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}


function showRelativeStock(stockCode)
{
	$.ajax({
		url: "php/relativeStock.php",
		data: {
			name: stockCode
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

function calculate()
{
	$.ajax({
		url: "php/showCalculate.php",
		data: {
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			document.getElementById( "calculate" ).innerHTML = output;
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}


function showBasicInformation()
{
	stockCode = $("#name").val();
	$.ajax({
		url: "php/basicInformation.php",
		data: {
			name: stockCode
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			document.getElementById( "BasicInormation" ).innerHTML = output;
			showRelativeStock(stockCode);
			showVote(stockCode);
			calculate(name);
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}
