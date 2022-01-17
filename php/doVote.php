<?php

//Step 1. 先取得今天的日期和星期
if(date("w",strtotime(date("Y-m-d")))==5) //星期5瀏覽 下個交易日是星期一 => add 3 day
    $next=date('Y-m-d',strtotime('+3 day'));
else if(date("w",strtotime(date("Y-m-d")))==6) //星期6瀏覽 下個交易日是星期一 => add 2 day
    $next=date('Y-m-d',strtotime('+2 day'));
else //星期0 1 2 3 4  下個交易日是星期一 => add 1 day
    $next=date('Y-m-d',strtotime('+1 day'));

//Step 2.丟sql

$stock=$_POST['stock'];
$result=$_POST['option'];

// $stock="2330";
// $result="F";

$host="140.138.150.32";
$dbuser="huan";
$dbpassword="kalso4212h2o";
$dbname="stock";

$query = "INSERT INTO `ticket`(`code`, `date`, `result`) VALUES ('$stock','$next','$result');";

if ( !( $database = mysqli_connect( "$host", "$dbuser", "$dbpassword" ) ) )
    die( "Could not connect to database </body></html>" );
if ( !mysqli_select_db($database,$dbname ) )
    die( "Could not open products database </body></html>" );
if ( !( $result = mysqli_query($database, $query) ) )
{
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error() . "</body></html>" );
}
//Step 3.拉資料統計

//if it is rise
$query = "SELECT * FROM `ticket` WHERE `date`='$next' AND `result`='U' AND `code`='$stock'";
$result = mysqli_query($database, $query);
$up=0;
while($row = mysqli_fetch_assoc($result))
{
    $up++;
}

//if it is down 

$query = "SELECT * FROM `ticket` WHERE `date`='$next' AND `result`='D' AND `code`='$stock'";
$result = mysqli_query($database, $query);
$down=0;
while($row = mysqli_fetch_assoc($result))
{
    $down++;
}

$total=$up+$down;
$up=$up/$total;
$down=$down/$total;

//Step 4.輸出 
print('<div class="g-container"><div class="g-progress" style="--progress: '.$up.' ">'.$up.'% </div></div>');
print('<div class="g-container"><div class="g-progress" style="--progress: '.$down.' ">'.$down.'% </div></div>');


mysqli_close( $database );
?>