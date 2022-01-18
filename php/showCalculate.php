<?php

print("<form>");
print('<p><h2>物品換算</h2></p>');
print('<p><label>購買金額&nbsp<input type="text" id="inPrice"></p>');
print('<label>賣出金額&nbsp<input type="text" id="outPrice"></p>');
print('<label>持有張數&nbsp<input type="text" id="num"></p>');
print('<p><label>物品&nbsp<select id="thing">');
print('<option value="10">麥香10元系列</option>');
print('<option value="160">星巴克冷翠咖啡</option>');
print('<option value="75">麥當勞大麥克</option>');
// print('<option value="10">麥香10元系列</option>');
print('<option value="25250">基本月薪</option>');
print('<option value="168">基本時薪</option></p></p>');
print('<br><label><input type="button" onclick="doCal()" value="Submit" class="button"></label>');
print('</form>');
print('<div id="showCalResult"></div>');
?>