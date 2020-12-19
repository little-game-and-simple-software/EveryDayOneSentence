<?php
$conn="";
header("Content-Type:text/plain;charset=utf-8");
connect_to_db();
$a=get_all_juzi($conn);
print_r($a);

//获取完旧的表，插入新的表
newJuzi($conn);
function get_all_juzi($conn)
{
  $sql="SELECT * FROM sentence_backup";
  $result=mysqli_query($conn,$sql);
  $all=mysqli_fetch_all($result,MYSQLI_ASSOC);
//  print_r($all);
  return $all;
}
function newJuzi($conn)
{
//插入
  global $a;
  /*for($i=0;i<count($a);$i++)
  {
    $juzi=$a[i]['juzi'];
    $date=$a[i]['date'];
    $user=$a[i]['user'];
  //  $sql="INSERT INTO sentence_new VALUES('$juzi','$date','$user')";
  //  $result=mysqli_query($conn,$sql);
    //print_r($result);
  }*/
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
