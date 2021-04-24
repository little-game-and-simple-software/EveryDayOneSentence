<?php
//获得用户上传的句子
header("Content-Type:text/plain;charset=utf-8");
include("auto_login_db.php");
$tmp_db_connect=auto_login_db("mryj");
$user=$_POST['usr'];
//echo $user;
$sql="SELECT juzi FROM checkjuzi WHERE(user='$user')";
$result=mysqli_query($tmp_db_connect,$sql);
//var_dump($result);
if (mysqli_num_rows($result) > 0)
{
      while($row = mysqli_fetch_assoc($result))
      {
        echo $row['juzi']."<br>";
      }
  }
 ?>
