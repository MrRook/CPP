<?php

$source=$_POST["source"];
$lang=$_POST["lang"];
$qcode=$_POST["qcode"];
session_start();


//echo "./codecompiler.sh ".$lang." ".session_id()." 1 ".$qcode;
//$cmd =  'sh codecompiler.sh ';


$k = session_id();
$file=fopen(session_id().".cpp","w") or die("noooo");
if(!$file)
{
     die("unable to create");
}
fwrite($file,$source);
fclose($file);

echo shell_exec("./codecompiler.sh ".$lang." ".session_id()." 1 ".$qcode);
shell_exec("rm -f ".session_id().".cpp")
?>
