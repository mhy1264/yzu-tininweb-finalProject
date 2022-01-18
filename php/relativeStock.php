<?php

    $stock=$_POST['name'];
    //$stock=2330;
    $host="140.138.150.32";
    $dbuser="huan";
    $dbpassword="kalso4212h2o";
    $dbname="stock";

    $query = "SELECT * FROM `t187ap03_l` WHERE  `公司代號`='$stock'";

    if ( !( $database = mysqli_connect( "$host", "$dbuser", "$dbpassword" ) ) )
        die( "Could not connect to database </body></html>" );
    if ( !mysqli_select_db($database,$dbname ) )
        die( "Could not open products database </body></html>" );
    if ( !( $result = mysqli_query($database, $query) ) )
    {
        print( "<p>Could not execute query!</p>" );
        die( mysqli_error() . "</body></html>" );
    }
  
    $row = mysqli_fetch_row( $result );
    $stockCat=$row[3];
    $query = "SELECT * FROM `t187ap03_l` WHERE `ind`='$stockCat'";
    $result = mysqli_query($database, $query);




    print("<h2>猜你喜歡</h2>");
    print ('<table id="stockInfo" class="styled-table">');
    print("<thead><tr><th>公司全名</th><th>股票代碼</th></tr></thead><tbody>");
    while ( $row = mysqli_fetch_row( $result ) )
    {
        $displayNumber=rand(0,10000000)%8;
        if(!$displayNumber)
        {
            $CompanySimpleName=$row[2];
            $CompanyCode=$row[0];
            print( "<tr><td>$CompanySimpleName</td><td>$CompanyCode</td?</ttr>" );
        }

    }
    print ("</tbody></table>");
 // this is comment 50
    mysqli_close( $database );
?>
