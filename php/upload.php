<?php
header("Content-Type:text/plain;charset=utf-8");
$conn="";
connect_to_db();
upload($conn);
function upload($conn)
{
  $today=date("Y/m/d");
  $text=$_POST['text'];
  $user=$_POST['user'];

  $sql="INSERT INTO sentence VALUES('$text','$today','$user')";
  $result=mysqli_query($conn,$sql);
  echo $result;
}
 // TODO: 查句子
/*  $sql2="SELECT juzi FROM sentence";
  $r2=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($r2)>0)
  {
    while($row = mysqli_fetch_assoc($r2))
    {
      echo($row['juzi']);
    }
  }*/

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
