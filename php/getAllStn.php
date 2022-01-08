<?php
$conn="";
//header("Content-Type:text/plain;charset=utf-8");
connect_to_db();
$sql="SELECT * FROM sentence";
$result=mysqli_query($conn,$sql);
$array=[];
$rows=mysqli_num_rows($result);
if($rows>0)
{
  $all=mysqli_fetch_all($result,MYSQLI_ASSOC);
  for($i=0;$i<count($all);$i++)
  {
  $tmp_row=$all[$i];
  array_push($array,$tmp_row);
  }
#  print_r($all);
  $js_json=json_encode($array);
  echo $js_json;
}
else
{
  echo false;
}
//首先要链接到数据库
function connect_to_db()
{
  $servername = "127.0.0.1";
  $username = "s6761292";
  $password = "wmED04zeWT";
  global $conn;
  $conn = new mysqli($servername,$username,$password);
  if ($conn->connect_error)
  {
  echo "连接失败";
    die("连接失败: " . $conn->connect_error);
  }
  else
  {
    mysqli_query($conn,"SET NAMES utf8");
    mysqli_select_db($conn,"s6761292");
  }
}

 ?>
