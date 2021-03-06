var stockCode;
//ref :https://cynthiafan1230.pixnet.net/blog/post/179563965-170828-%3A%3A-javascript-%3A%3A-%E5%9C%A8input-text-%E6%8C%89%E4%B8%8B-enter-%E5%8D%B3%E5%8F%AF%E9%80%818
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

function doCal()
{
	var buyPrice=$("#inPrice").val();
	var sellPrice=$("#outPrice").val();
	var unit=$("#thing").val();
	var num=$("#num").val();
	console.log(unit);
	$.ajax({
		url: "php/doCalculate.php",
		data: {
			buyPrice:buyPrice,
			sellPrice:sellPrice,
			unit:unit,
			num:num
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			document.getElementById( "showCalResult" ).innerHTML = output;
		},
		error : function(){
			alert( "Request failed." );
		}
	});
}

function doRank(stock)
{
	$.ajax({
		url: "php/doRank.php",
		data: {
			stock:stock
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			console.log("do rank");
		},
		error : function(){
			alert( "Request failed." );
		}
	});

}

function showRank()
{
	$.ajax({
		url: "php/showRank.php",
		data: {
		},
		type: "POST",
		datatype: "html",
		success: function( output ) {
			document.getElementById("rank").innerHTML=output;
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
			if(output!="0")
			{
				$("#summation").show();
				document.getElementById( "BasicInormation" ).innerHTML = output;
				showRelativeStock(stockCode);
				showVote(stockCode);
				calculate(stockCode);
				doRank(stockCode);
				showRank();
			}
			else{
				document.getElementById( "BasicInormation" ).innerHTML = "<table><thead><tr><th>Not found</th></tr></thead><table>";
				$("#summation").hide();
			}

		},
		error : function(){
			alert( "Request failed." );
		}
	});
}
