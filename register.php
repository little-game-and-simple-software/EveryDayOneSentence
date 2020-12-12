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
    login($account_name,$pwd,$conn);
  }
  if($action=="register")
  {
    // BUG: 注册功能存在小bug
    // FIXME: 已经修复 待测试
      register($account_name,$pwd,$conn);
  }
}
function login($account_name,$pwd,$conn)
{
  $seletSql="SELECT account,pwd from user";
  $result=mysqli_query($conn,$seletSql);
  if (mysqli_num_rows($result) > 0)
  {
    // 输出数据
    while($row = mysqli_fetch_assoc($result))
    {
      //  echo "<br>"."账号->".$row["account"]."<br>密码->".$row["pwd"]."<br>";
        if($account_name==$row["account"] and $pwd==$row['pwd'])
         {
          //$user_array=[];
          //$user_array.append($account_name);
          echo true;
         }
    }
   }
}
function register($account_name,$pwd,$conn)
{
   $seletSql="SELECT account FROM user";
   $result=mysqli_query($conn,$seletSql);
   #账号状态
   $account_state="";
  //mysqli_fetch_assoc()会自动查找下一行数据
  //NOTE:遍历数据表 查询是否存在账号
    if (mysqli_num_rows($result) > 0)
    {
          while($row = mysqli_fetch_assoc($result))
          {
            //数据库内的账号名称
            //echo '数据库中的账号->'.$row['account'];
            if($account_name==$row['account'])
            {
              //echo "账号已存在,不能注册";
              $account_state="cant reg";
            }
            else
            {
              //echo "账号不存在,可以注册";
              $account_state="can reg";
            }
           }
           //循环结束后 取得最终结果
           //echo $account_state;
   }
     //NOTE: 实际注册代码 //
     if($account_state=="can reg")
      {
        $uid=get_latest_uid($conn);
        //注册
        $reg_sql="INSERT INTO user VALUES($uid,'$account_name','$pwd') ";
        $state=mysqli_query($conn,$reg_sql);
        echo $state;
      }
}
//获得最新用户的uid，以便给新用户分配int类型的uid 用于识别用户
function get_latest_uid($conn)
{
  $sql="SELECT Max(uid) FROM user";
  $pre_result=mysqli_query($conn,$sql);
  //  echo "<br>";
  $latest_uid=mysqli_fetch_array($pre_result);
  $latest_uid_value=$latest_uid[0];
  //新用户
   $newer_uid_value=$latest_uid_value+1;
  return $newer_uid_value;
}
//首先要链接到数据库
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
