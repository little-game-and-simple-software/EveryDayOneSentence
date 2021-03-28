<?php
header("Content-Type:text/plain;charset=utf-8");
$conn="";
connect_to_db();
//获得index状态
/*if($_POST['action']=="index")
{
  get_index_state($conn);
}*/
get_index_state($conn);
function get_index_state($conn)
{
  $sql='SELECT state FROM config WHERE page="index"';
  $result=mysqli_query($conn,$sql);
//  var_dump($result);
  $state=mysqli_fetch_assoc($result);
  echo $state['state'];
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
