<?php
//注册用php
$account_name="";
$pwd="";
$action="";
$conn="";
header("Content-Type:text/plain;charset=utf-8");
connect_to_db();
get_to_do_action_and_do_action();

//获得前端发送过来的行为 并根据不同注册或者登录行为选择不同的function
function get_to_do_action_and_do_action()
{
  global $account_name;
  global $pwd;
  global $action;
  global $conn;
  $action=$_POST['to_action'];
  $account_name=$_POST['account'];
  $pwd=$_POST['pwd'];

  if($action=="login")
  {

    echo "从php返回的值：准备执行登录代码";
    echo "<br/>";
    echo "账号->". $account_name;
    echo "<br/>";
    echo "密码->".$pwd;
    //var_dump($conn);
    login($account_name,$pwd,$conn);
  }
  if($action=="register")
  {
    echo "从php返回的值：准备执行注册代码";
    echo "从php返回的值：准备执行登录代码";
    echo "<br/>";
    echo "账号->". $account_name;
    echo "<br/>";
    echo "密码->".$pwd;
    register($account_name,$pwd,$conn);
  }
}


function register($account_name,$pwd,$conn)
{
  //第一步，先查询数据表中是否有和账号相同的值，如果相同，那么返回一句错误，此账号名已存在
  //如果不存在，那么就往数据表中添加一行新的数据
  $seletSql="SELECT account FROM user";
  $result=mysqli_query($conn,$seletSql);
  //var_dump($result);
  $query_result=mysqli_fetch_all($result);
  //var_dump($query_result);
  echo "<br/>";
  echo "查询结果". $query_result[0][0];
  //echo "<br/>"."得到的post数据".$account_name;
  if($query_result[0][0]==$_POST["account"])
  {
      echo "<br/>错误，此账号名已存在,无法注册";
      echo "<br/>点击此链接返回";
      echo "<a href='login.html'>返回登录页面</a>";
  }
  else
  {
    echo "此账号名不存在，可以创建新用户";
    get_latest_uid($conn);
  }
}
function login()
{

}
//获得最新用户的uid，以便给新用户分配int类型的uid 用于识别用户
function get_latest_uid($conn)
{
$sql="SELECT Max(uid) FROM user";
$pre_result=mysqli_query($conn,$sql);
echo "<br>";
$latest_uid=mysqli_fetch_array($pre_result);
$latest_uid_value=$latest_uid[0];
//新用户
$newer_uid_value=$latest_uid_value+1;
var_dump($latest_uid_value);
//var_dump($latest_uid[1]);
echo "最后用户uid为".$latest_uid_value;
echo "<br>";
echo "注册的新用户uid为->".$newer_uid_value;
}
//首先要链接到数据库
function connect_to_db()
{
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  global $conn;
  $conn = new mysqli($servername, $username, $password);
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
