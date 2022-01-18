<?php
print("<form>");
print('<p><h2>預測下一個交易日會漲還是跌</h2></p>');
print('<label><input type="radio" name="V" value="U">會漲');
print('<input type="radio" name="V" value="D">會跌</label>');
print('<br><label><input type="button" onclick="doVote()" value="Submit" class="button"></label>');
print('</form>');
print('<div id="showVoteResult"></div>');
?>