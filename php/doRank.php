<?php

    $stock=$_POST['stock'];

    $host="140.138.150.32";
    $dbuser="huan";
    $dbpassword="kalso4212h2o";
    $dbname="stock";

    $query = "SELECT * FROM `hot` WHERE `code`='$stock';";

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
    while($row = mysqli_fetch_assoc($result))
    {
        $num++;
    }

    if($num==0)
    {
        $query = "INSERT INTO `hot`(`code`, `times`) VALUES ('$stock','1')";
        $result = mysqli_query($database, $query);
    }
    else
    {



        $query = "SELECT * FROM `hot` WHERE `code`='$stock';";
        $result = mysqli_query($database, $query);

        $num=0;
        while($row = mysqli_fetch_assoc($result))
        {
            $num=$row['times'];
        }
        $num++;
        $query = "UPDATE `hot` SET `times`='$num' WHERE `code`='$stock'";
        $result = mysqli_query($database, $query);
    
    }



    mysqli_close( $database );
?>