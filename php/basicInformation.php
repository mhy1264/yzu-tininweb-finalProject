<?php


    $stock=$_POST['name'];
    // $stock="2330";

    $host="140.138.150.32";
    $dbuser="huan";
    $dbpassword="kalso4212h2o";
    $dbname="stock";

    $query = "SELECT * FROM `t187ap03_l` WHERE `公司代號`='公司代號' OR `公司代號`='$stock' ORDER BY `公司代號` DESC";

    if ( !( $database = mysqli_connect( "$host", "$dbuser", "$dbpassword" ) ) )
        die( "Could not connect to database </body></html>" );
    if ( !mysqli_select_db($database,$dbname ) )
        die( "Could not open products database </body></html>" );
    if ( !( $result = mysqli_query($database, $query) ) )
    {
        print( "<p>Could not execute query!</p>" );
        die( mysqli_error() . "</body></html>" );
    }

    $count=0;
    while ( $row = mysqli_fetch_row( $result ) )
    {
        $count++;
    }

    mysqli_close( $database );
    if($count>1)
    {
        print ('<table id="stockInfo" class="styled-table">');
        while ( $row = mysqli_fetch_row( $result ) )
        {
            print( "<tr>" );
            foreach ( $row as $value )
            print( "<td>$value</td>" );
            print( "</tr>" );
        }
        print ("</table>");        
    }
    else{
        print("0");
    }

?>
