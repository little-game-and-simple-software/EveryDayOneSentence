<?php
//用于php代码的试验文件
header("Content-Type:text/html;charset=utf-8");
$conn="";
connect_to_db();
//include("core.php");
$sql="SELECT juzi FROM stn_backup3";
mysqli_query($conn,"SET NAMES utf8");
$result=mysqli_query($conn,$sql);
$all=mysqli_fetch_all($result);
print_r($all);
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
    mysqli_query($conn,"SET NAMES utf8");

    mysqli_select_db($conn,"backup");
  }
}
?>
