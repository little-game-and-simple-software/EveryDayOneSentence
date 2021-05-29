<?php
include("../auto_login_db.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
$tmp_db_connect=auto_login_db("mryj");
function login($conn,$account,$pwd)
{
  $seletSql="SELECT pwd from user WHERE account='$account' ";
  mysqli_query($conn,"SET NAMES utf8");
  $result=mysqli_query($conn,$seletSql);
  if (mysqli_num_rows($result) > 0)
  {  
    $row = mysqli_fetch_assoc($result);
    //验证登录数据
    if($row['pwd'] == $pwd)
    {
        echo true;
    }else{ 
      echo false;}
   }
}
login($tmp_db_connect,$_POST['account'],$_POST['pwd']);
?>