<?php
//注册用php
#用户账号 用户密码 行为 数据库链接
/*$account="";
$pwd="";
$action="";
$conn="";*/
include("auto_login_db.php");
header("Content-Type:text/plain;charset=utf-8");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
$tmp_db_connect=auto_login_db("root");
do_action($_POST['to_action'],$_POST['account'],$_POST['pwd'],$tmp_db_connect);
// TODO: 新的登录sql语句
//$sql="SELECT pwd FROM user WHERE account=$_POST \['account']";
//获得前端发送过来的行为 并根据不同注册或者登录行为选择不同的function
function do_action($action,$account,$pwd,$db_connect)
{
  if($action=="login")
  {
   // print_r($db_connect);
    login($account,$pwd,$db_connect);
  }
  if($action=="register")
  {
    // BUG: 注册功能存在小bug
    // FIXME: 已经修复 待测试
    register($account,$pwd,$db_connect);
  }
}
#登录和注册
function login($account,$pwd,$conn)
{
//  $seletSql="SELECT account,pwd from user";
  $seletSql="SELECT pwd from user WHERE account='$account' ";
  mysqli_query($conn,"SET NAMES utf8");
  $result=mysqli_query($conn,$seletSql);
  //var_dump($result);
  if (mysqli_num_rows($result) > 0)
  {  // 输出数据
    $row = mysqli_fetch_assoc($result);
    //var_dump($row);
  //  echo $row['pwd'];
    //验证登录数据
    if($row['pwd'] == $pwd)
    {
      echo true;
    }
    else
    { 
      //echo "密码不正确";
      echo false;
    }
   }
}
function register($account_name,$pwd,$conn)
{
   $seletSql="SELECT account FROM user WHERE(account='$account_name')";
   $result=mysqli_query($conn,$seletSql);
   #账号状态
   $account_state="";
   $rows=mysqli_num_rows($result);
   if($rows==0)
   {
    // echo '账号不存在可以注册';
     //NOTE: 实际注册代码 //
        $uid=get_latest_uid($conn);
        //注册
        $reg_sql="INSERT INTO user VALUES($uid,'$account_name','$pwd')";
        $state=mysqli_query($conn,$reg_sql);
        echo $state;
   }
   else
   {
     //echo "账号已存在";
     echo false;
      }
}
//获得最新用户的uid，以便给新用户分配int类型的uid 用于识别用户
function get_latest_uid($conn)
{
  $sql="SELECT Max(uid) FROM user";
  $pre_result=mysqli_query($conn,$sql);
  //echo "<br>";
  $latest_uid=mysqli_fetch_array($pre_result);
  $latest_uid_value=$latest_uid[0];
  //新用户
   $newer_uid_value=$latest_uid_value+1;
   return $newer_uid_value;
}
 //废弃代码
   /* while($row = mysqli_fetch_assoc($result))
    {
      //  echo "<br>"."账号->".$row["account"]."<br>密码->".$row["pwd"]."<br>";
        if($account==$row["account"] and $pwd==$row['pwd'])
         {
          //$user_array=[];
          //$user_array.append($account_name);
          echo true;
         }
    }*/
 ?>
