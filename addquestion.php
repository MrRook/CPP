<?php
	if((!isset($_POST["qcode"]))||strlen($_POST["qcode"])==0)
	die("no qcode");
	if(file_exists($_POST["qcode"].".php"))	
	die("this question exists!");
	$descfile='<!DOCTYPE html>
<html>
<body>
';
$descfile=$descfile."<p>".preg_replace("/\r\n|\r|\n/",'<br/>',$_POST['source'])."</p>";
if(!empty($_FILES['fileToUpload']['tmp_name']))
{
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$_POST["qcode"].".jpg");
$descfile=$descfile.'<img src="'.$_POST["qcode"].'.jpg">';
}
$descfile=$descfile.'
<br><form action="submit.php" method="post">
  &nbsp;&nbsp;&nbsp;&nbsp;<B>Code</B><br><textarea name="source" rows="50" cols="200" style="color: red; background-color:rgb(245,245,245) ;margin:3%"></textarea><br>
<input type="hidden" name="qcode" value="'.$_POST["qcode"].'"><br>
  <input type="radio" name="lang" value="gcc" checked>c<br>

  <input type="radio" name="lang" value="g++">c++<br>
  <input type="submit" value="Submit">
  </form>





</body>
</html>
';
$file=fopen($_POST["qcode"].".html","w");
fwrite($file,$descfile);
fclose($file);	
$file=fopen($_POST["qcode"].".input","w");
fwrite($file,$_POST['tcase']);
fclose($file);	
$file=fopen($_POST["qcode"]."sol.txt","w");
fwrite($file,$_POST['output']);
fclose($file);
echo "your question link: 107.108.221.43/".$_POST["qcode"].".html";
?>
