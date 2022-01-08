<?php
#header("Content-Type:text/plain;charset=utf-8");
include("auto_login_db.php");
#远程
if($_POST['db_remote'])
{
  $tmp_db_connect=auto_login_db("mryj");
  upload($tmp_db_connect);
}
else
{
  $tmp_db_connect=auto_login_db("local");
  upload($tmp_db_connect);
}
//投稿功能，默认投稿至审核数据表，审核通过之后，复制数据到句子总表
function upload($conn)
{
  $today=date("Y/m/d");
  $juzi=$_POST['text'];
  $user=$_POST['user'];
  // TODO: 新的审核的投稿方式 // NOTE: 首先插入到临时审核表
  $sql="INSERT INTO checkjuzi VALUES('$juzi','$today','$user',-1)";
  mysqli_query($conn,"SET NAMES utf8");
  $result=mysqli_query($conn,$sql);
  echo $result;
}
 ?>
