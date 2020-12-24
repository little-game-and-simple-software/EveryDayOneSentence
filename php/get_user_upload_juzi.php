<?php
//获得用户上传的句子
header("Content-Type:text/plain;charset=utf-8");
$conn="";
connect_to_db();
$user=$_POST['usr'];
//echo $user;
$sql="SELECT juzi FROM sentence WHERE(user='$user')";
mysqli_query($conn,"SET NAMES utf8");

$result=mysqli_query($conn,$sql);
//var_dump($result);
if (mysqli_num_rows($result) > 0)
{
      while($row = mysqli_fetch_assoc($result))
      {
        echo $row['juzi']."<br>";
      }
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
