<?php

    $buyPrice=$_POST['buyPrice'];
    $sellPrince=$_POST['sellPrice'];
    $unit=$_POST['unit'];
    $num=$_POST['num'];
    $diff=($sellPrince-$buyPrice)*1000*$num;
    if($diff>=0)
    {
        print("<p>你總共賺的錢是".$diff."元</p>");
        print("<p>總共可以換".$diff/$unit);
        if($unit==10)
            print("瓶麥香");
        else if ($unit==160)
            print("杯星巴克冷翠咖啡");
        else if ($unit==75)
            print("個麥當勞大麥克");
        else if ($unit==25250)
            print("個月的年終(依照基本時薪計算");
        else if($unit==168)
            print("個小時的薪水");
        print("</p>");

    }
    else 
    {
        print("<p>可悲阿 被收割ㄌ顆顆</p>");
    }



?>