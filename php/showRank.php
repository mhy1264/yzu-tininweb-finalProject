<?php

$host="140.138.150.32";
$dbuser="huan";
$dbpassword="kalso4212h2o";
$dbname="stock";

$query = "SELECT * FROM `hot` ORDER BY `times` DESC;";

if ( !( $database = mysqli_connect( "$host", "$dbuser", "$dbpassword" ) ) )
    die( "Could not connect to database </body></html>" );
if ( !mysqli_select_db($database,$dbname ) )
    die( "Could not open products database </body></html>" );
if ( !( $result = mysqli_query($database, $query) ) )
{
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error() . "</body></html>" );
}    
$num=0;
print('<table class="styled-table">');
print("<thead><th>名次</th><th>股票代碼</th></thead>");
while($row = mysqli_fetch_assoc($result))
{
    
    if($num==5)
        break;
    $num++;
    $id=$row['code'];
    print("<tr><td>$num</td><td>$id</td></tr>");
}
print("</table>");






?>