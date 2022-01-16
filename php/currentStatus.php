<?php
header("Access-Control-Allow-Origin: *");
// $stock=$_POST['name'];

$stock="0056";
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/json')));
$url ="https://mis.twse.com.tw/stock/api/getStockInfo.jsp?json=1&delay=0&ex_ch=tse_".$stock.".tw";
print($url);
print("\n\n");
$data = file_get_contents($url, false, $context);
$data = json_decode($data);
$data = $data->msgArray;
$open=$data[0];

print($open);

?>