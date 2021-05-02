<?php
#header("Content-Type:text/html;charset=utf-8");
//php允许跨域访问
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST'); // 允许请求的类型
#自动登录数据库
include("auto_login_db.php");
#验证用php
include("checker.php");
$sentence=$_POST['juzi'];
$status=$_POST['status'];
$user=$_POST['user'];

$tmp_db_connect=auto_login_db("mryj");
#$secret_key="fu96diflza";
update_juzi_state($tmp_db_connect,$_POST['status'],$_POST['user'],$_POST['juzi'],$_POST['key']);
//update_juzi_state($tmp_db_connect,$status,$user,$sentence,$_POST['key']);
// NOTE: 一个细节，审核通过后，给用户发送系统通知消息时，可以带上通过审核的时间，如果要带上时间，那么应该是审核通过的时间还是用户投稿时的时间
// NOTE: 或者，也可以完全不加这个细节，因为加不加影响也不大，反正是小网站，已经是超级破的了。
function update_juzi_state($conn,$state,$user,$sentence,$input_secret_key)
{
  $verify_result=checker_verify($input_secret_key);
  if($verify_result)
  {
    $sql="UPDATE checkjuzi SET state='$state' WHERE user='$user' AND  juzi='$sentence' ";
    $result=mysqli_query($conn,$sql);
    print_r($result);
  }
  else
  {
    echo "登录验证失败！";
    echo "post信息";
    var_dump($_POST);
  }
}
#暂时废弃代码 在旧的架构中使用
// NOTE: 审核通过
/*
if($status==1)
{
  $today=date("Y/m/d");
  $sql="INSERT INTO sentence VALUES('$sentence','$today','$user')";
  mysqli_query($conn,"SET NAMES utf8");
  $result=mysqli_query($conn,$sql);
  #var_dump($result);
  update_juzi_state($conn,1,$user,$sentence,$input_secret_key);
  // WARNING: 下面是废弃的
}
// NOTE: 改变句子被审核的状态 这是一个通用方法的封装
// NOTE: 审核不通过
if($status==0)
{
  // TODO: 更新临时待审核表，句子的审核状态
  update_juzi_state($conn,0,$user,$sentence,$input_secret_key);
}*/
 ?>
