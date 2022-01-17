<?php

print("<form>");
print('<p>輸入購買的金額</p>');
print('<p><label>購買金額<input type="text" id="inPrice">');
print('<label>賣出金額<input type="text" id="outPrice"></p>');
print('<label>持有張數<input type="text" id="num"></p>');
print('<p><label>想要換算的東西<select id="thing">');
print('<option value="10">麥香10元系列</option>');
print('<option value="160">星巴克冷翠咖啡</option>');
print('<option value="75">麥當勞大麥克</option>');
// print('<option value="10">麥香10元系列</option>');
print('<option value="25250">基本月薪</option>');
print('<option value="168">基本時薪</option></p>');
print('<label><input type="button" onclick="doCal()" value="Submit"></label>');
print('</form>');
print('<div id="showCalResult"></div>');
?>