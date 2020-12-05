<?php
//注册用php
header("Content-Type:text/plain;charset=utf-8");
$servername = "127.0.0.1";
$username = "root";
$password = "";
//$conn = new mysqli($servername, $username, $password);

if($_POST['to_action']=="login")
{
  echo "从php返回的值：准备执行登录代码";
  //login()
}
if($_POST['to_action']=="register")
{
  echo "从php返回的值：准备执行注册代码";
}

function login()
{
  /*//第一步，先查询数据表中是否有和账号相同的值，如果相同，那么返回一句错误，此账号名已存在
  //如果不存在，那么就往数据表中添加一行新的数据
  $seletSql="SELECT account FROM user";
  $result=mysqli_query($conn,$seletSql);
  //var_dump($result);
  $query_result=mysqli_fetch_all($result);
  //var_dump($query_result);
  echo $query_result[0][0];
  echo "<br/>"."得到的post数据".$_POST["account"];
  if($query_result[0][0]==$_POST["account"])
  {
      echo "<br/>错误，此账号名已存在";
      echo "<br/>点击此链接返回";
      echo "<a href='index.html'>返回主页</a>";
  }*/
}

/*
if ($conn->connect_error)
{
echo "连接失败";
  die("连接失败: " . $conn->connect_error);
}
else
{
  mysqli_select_db($conn,"everydayonesentence");
  if($_POST['to_action']=="login")
  {
    echo "执行登录";
  }

}*/

 ?>
