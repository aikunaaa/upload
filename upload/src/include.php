<?php
/*
ć?éĄľé˘ĺ­ĺ¨ćäťśĺĺŤćźć´ďźç¨äşćľčŻĺžçéŠŹć?ĺŚč˝ć­Łĺ¸¸čżč?ďź
*/
$flag='..........';
header("Content-Type:text/html;charset=utf-8");
$file = $_GET['file'];
if(isset($file)){
    include $file;
}else{
    show_source(__file__);
}
?>