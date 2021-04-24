<?php
//include("core.php");
//本地php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
include("auto_login_db.php");
$conn=auto_login_db();
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
  $sql="SELECT juzi FROM checkjuzi";
  mysqli_query($connect,"SET NAMES utf8");
  $result=mysqli_query($connect,$sql);
  $all=mysqli_fetch_all($result,MYSQLI_NUM);
  //print_r($all);
  return $all;
}
 /*弃用
 function connect_to_db()
{
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  global $conn;
  $conn = new mysqli($servername,$username,$password);
  if ($conn->connect_error)
  {
  echo "连接失败";
    die("连接失败: " . $conn->connect_error);
  }
  else
  {
    mysqli_select_db($conn,"everydayonesentence");
    // echo "连接成功";
   return $conn;
  }
}
 */
 ?>
 
