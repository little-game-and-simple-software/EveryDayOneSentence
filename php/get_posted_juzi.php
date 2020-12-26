<?php
header("Content-Type:text/plain;charset=utf-8");
//ob_end_clean();
// NOTE: 用于审核页面获取用户句子的php 和get_user_upload_juzi.php区分开来
$conn="";
connect_to_db();
$sql="SELECT * from checkjuzi WHERE state=-1";
mysqli_query($conn,"SET NAMES utf8");
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
$row_number=mysqli_num_rows($result);
$array=[];
//print_r($row_number);
if($row_number==0)
{
  echo "<p>暂时没有需要审核的句子</p>";
}
else
{
  for($i=0;$i<count($rows);$i++)
  {
  $tmp_row=$rows[$i];
  //var_dump( $tmp_row);
  //print_r($tmp_row);
  array_push($array,$tmp_row);
}
//print_r($array);
$js_json=json_encode($array);
echo $js_json;
//print_r($array);
//print_r($rows);
}

//首先要链接到数据库
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
