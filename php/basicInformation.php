<?php



    $stock=$_POST['name'];
    // $stock="2330";

    $host="140.138.150.32";
    $dbuser="huan";
    $dbpassword="kalso4212h2o";
    $dbname="stock";
    // 
    $query = "SELECT * FROM `t187ap03_l` WHERE  `公司代號`='$stock' OR  `公司代號`='公司代號' ORDER BY `公司代號` DESC";

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

    // echo $count;
    // print("\n\n");

    if($count==2)
    {
        $result = mysqli_query($database, $query);
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
    // // print("\n");


    // tr><td>公司代號</td><td>公司名稱</td><td>公司簡稱</td><td>產業別</td><td>住址</td><td>營利事業統一編號</td><td>董事長</td><td>總經理</td><td>總機電話</td><td>成立日期</td><td>上市日期</td><td>普通股每股面額</td><td>實收資本額</td><td>私募股數</td><td>特別股</td><td>網址</td></tr>
    mysqli_close( $database );
?>
