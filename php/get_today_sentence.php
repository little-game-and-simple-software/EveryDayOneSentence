<?php
//include("core.php");
//本地php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
include("auto_login_db.php");
$conn=auto_login_db("mryj");
//juzi数组
$juzi=[];
#header("Content-Type:text/plain;charset=utf8");
$juzi_array=get_all_juzi($conn);
$random_value=rand(0,count($juzi_array)-1);
//echo $random_value;
$final_str=$juzi_array[$random_value][0];
echo $final_str;
//获取所有的句子
get_all_juzi($conn);
function get_all_juzi($connect)
{
  $sql="SELECT juzi FROM checkjuzi WHERE state=1";
  mysqli_query($connect,"SET NAMES utf8");
  $result=mysqli_query($connect,$sql);
  $all=mysqli_fetch_all($result,MYSQLI_NUM);
  //print_r($all);
  return $all;
}
 ?>
 
