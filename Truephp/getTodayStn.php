<?php
//include("core.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
$conn="";
//juzi数组
$juzi=[];
header("Content-Type:text/plain;charset=utf8");
include("core.php");
//首先要链接到数据库
#core_connect_to_db("127.0.0.1","s6761292","wmED04zeWT","s6761292");
core_connect_to_db("127.0.0.1","wyyqspewtel","zr871214","wyyqspewtel");
echo "输出测试";
//获取所有的句子
// $juzi_array=get_all_juzi($conn);
// $random_value=rand(0,count($juzi_array)-1);
// //echo $random_value;
// $final_str=$juzi_array[$random_value][0];
// echo $final_str;
// function get_all_juzi($conn)
// {
//   $sql="SELECT juzi FROM sentence";
//   mysqli_query($conn,"SET NAMES utf8");
//   $result=mysqli_query($conn,$sql);
//   $all=mysqli_fetch_all($result,MYSQLI_NUM);
//   //print_r($all);
//   return $all;
// }
//$encode = mb_detect_encoding("中文测试");
//echo $encode;
/*$q=iconv("ASCII","UTF-8",$final_str);
echo $q;*/
//echo "中文测试";
 ?>
 
