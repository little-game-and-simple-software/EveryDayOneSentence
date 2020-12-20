<?php
header("Content-Type:text/plain;charset=utf-8");
$conn="";
connect_to_db();
upload($conn);
//投稿功能，默认投稿至审核数据表，审核通过之后，复制数据到句子总表
function upload($conn)
{
  $today=date("Y/m/d");
  $text=$_POST['text'];
  $user=$_POST['user'];

// NOTE: 旧的投稿方式
/*  $sql="INSERT INTO sentence VALUES('$text','$today','$user')";
  $result=mysqli_query($conn,$sql);
  echo $result;
  */
  // TODO: 新的审核的投稿方式
  
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
