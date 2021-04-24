<?php
header("Content-Type:text/plain;charset=utf-8");
include("auto_login_db.php");
$tmp_db_connect=auto_login_db("root");
//upload($tmp_db_connect);
//投稿功能，默认投稿至审核数据表，审核通过之后，复制数据到句子总表
/*function upload($conn)
{
  $today=date("Y/m/d");
  $juzi=$_POST['text'];
  $user=$_POST['user'];

  // TODO: 新的审核的投稿方式 // NOTE: 首先插入到临时审核表
  $sql="INSERT INTO checkjuzi VALUES('$juzi','$today','$user',-1)";
  mysqli_query($conn,"SET NAMES utf8");
  $result=mysqli_query($conn,$sql);
  echo $result;
}*/
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
//移除旧代码 无用登录
// NOTE: 旧的投稿方式
/*  $sql="INSERT INTO sentence VALUES('$text','$today','$user')";
  $result=mysqli_query($conn,$sql);
  echo $result;
  */
 ?>
