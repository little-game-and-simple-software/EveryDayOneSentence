<?php
$conn="";
header("Content-Type:text/plain;charset=utf-8");
include("register.php")
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
 ?>
