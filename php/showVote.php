<?php



print("<form>");
print('<p>預測下一個交易日會漲還是跌</p>');
print('<label><input type="radio" name="V" id="Y">會漲');
print('<input type="radio" name="V" id="N">會跌</label>');
print('<label><input type="button" onclick="doVote()" value="Submit"></label>');
print('</form>');
print('<div id="showVoteResult"></div>');


?>