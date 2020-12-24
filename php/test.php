<?php
//用于php代码的试验文件
header("Content-Type:text/html;charset=utf-8");

//phpinfo();
$conn="";
include("core.php");
$tmp=connect_to_db("127.0.0.1","root","",NULL);
print_r($tmp);
?>
