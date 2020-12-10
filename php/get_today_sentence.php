<?php
$conn="";
//juzi数组
$juzi=[];
header("Content-Type:text/plain;charset=utf-8");
//首先要链接到数据库
connect_to_db();
$sql="SELECT juzi FROM juzi";

$result=mysqli_query($conn,$sql);

$nums=mysqli_num_rows($result);
var_dump($nums);
echo rand(1,$nums);
//获取所有的句子
if($nums>1)
{
  echo "选择随机句子(未完成)";
//  $r=mysqli_fetch_assoc();
/*  while($row = mysqli_fetch_assoc($result))
  {
    //  echo "<br>"."账号->".$row["account"]."<br>密码->".$row["pwd"]."<br>";
      if($account_name==$row["account"] and $pwd==$row['pwd'])
      {
      //  echo "账号密码正确->登录成功";
      //  echo "<br>"."<a href='index.html'>返回主页</a>";
        //$user_array=[];
        //$user_array.append($account_name);
        echo true;
      }
  }*/
}

function connect_to_db()
{
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  global $conn;
  $conn = new mysqli($servername,$username,$password);
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
