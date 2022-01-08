<?php
//注册用php
header("Content-Type:text/html;charset=utf-8");
$servername = "127.0.0.1";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
echo "连接失败";
  die("连接失败: " . $conn->connect_error);
}
else
{
echo "连接成功";
echo "账号";
echo $_POST["account"];
echo "密码";
echo $_POST["pwd"];
mysqli_select_db($conn,"");
//第一步，先查询数据表中是否有和账号相同的值，如果相同，那么返回一句错误，此账号名已存在
//如果不存在，那么就往数据表中添加一行新的数据
$seletSql="SELECT account FROM user ";
$result=mysqli_query($conn,$sql);
echo $result;
if($result==$_POST["account"])
{
  echo "错误，此账号名已存在"
}
else
{
    $InterestSql="INTERSET INTO user VALUES($_POST["account"],$_POST["pwd"])"
    $InterestResult=mysqli_query($coon,"$InterestedSql")
    echo "成功插入".$InterestResult
}
}
 ?>
