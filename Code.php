<!DOCTYPE html>
<html>
<body>
<p>this is ques</p>
<form action="submit.php" method="post">
  <textarea name="source" rows="50" cols="200"></textarea><br>
<input type="hidden" name="qcode" value="{$_POST[qcode]}">c++<br>
  <input type="radio" name="lang" value="gcc" checked>c<br>

  <input type="radio" name="lang" value="g++">c++<br>
  <input type="submit" value="Submit">
  </form>





</body>
</html>
