<?php
$conn="";
//juzi数组
$juzi=[];
header("Content-Type:text/plain;charset=utf-8");
//首先要链接到数据库
connect_to_db();
$juzi_array=get_all_juzi($conn);
$random_value=rand(0,count($juzi_array)-1);
//echo $random_value;
echo $juzi_array[$random_value][0];
//获取所有的句子
function get_all_juzi($conn)
{
  $sql="SELECT juzi FROM sentence";

  $result=mysqli_query($conn,$sql);
  $all=mysqli_fetch_all($result,MYSQLI_NUM);
//  print_r($all);
  return $all;
}
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
  }
}
 ?>
