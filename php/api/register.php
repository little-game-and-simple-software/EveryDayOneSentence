<?php
include("../auto_login_db.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
$tmp_db_connect=auto_login_db("mryj");
$questions=["1+13=?","5-4=?","6*6+7=?","6^2-3^2=?","2^4=?","x+66-7=20 x=?","三角形内角和=?","代码是编程的一部分吗"];
function register_test($verify_value)
{

}
function register($account_name,$pwd,$conn,$question,$verify_value)
{
    $verify_result=verify($question,$verify_value);
    // if($verify_result)
    // {
    //     echo "验证成功";
    //     $has_registered=check_has_registered($account_name,$conn);
    //     #注册
    //     if($has_registered==0)
    //     {
    //         $uid=get_latest_uid($conn);
    //         $reg_sql="INSERT INTO user VALUES($uid,'$account_name','$pwd')";
    //         $state=mysqli_query($conn,$reg_sql);
    //         echo $state;
    //     }
    //     else
    //     {
    //         echo "错误，用户名已存在";
    //     }
    // }
    // else
    // {
    //     echo "验证失败";
    // }
}
function request_q()
{   global $questions;
    $i=random_int(0,sizeof($questions)-1);
    $q=$questions[$i];
    echo "question:".$q;
    $_SESSION['q']=$q;
}
#检查是否用户名已经被注册
function check_has_registered($account_name,$conn)
{
   $seletSql="SELECT account FROM user WHERE(account='$account_name')";
   $result=mysqli_query($conn,$seletSql);
   #账号状态
   $rows=mysqli_num_rows($result);
   return $rows;
}
function verify($question,$verify_value)
{
    global $questions;
    $answers=["14","1",'43','27','16','-39','180度','是'];
    #问题index
    $q_index=array_search($question,$questions);
    echo "index";
    var_dump($q_index);
}
//获得最新用户的uid，以便给新用户分配int类型的uid 用于识别用户
function get_latest_uid($conn)
{
  $sql="SELECT Max(uid) FROM user";
  $pre_result=mysqli_query($conn,$sql);
  $latest_uid=mysqli_fetch_array($pre_result);
  $latest_uid_value=$latest_uid[0];
   $newer_uid_value=$latest_uid_value+1;
   return $newer_uid_value;
}
#echo "test";
#获取验证码，传递给第三方程序，问题存储在第三方
if( $_SERVER['REQUEST_METHOD'] === 'GET')
{
    request_q(); 
}else{
    #echo '这是post请求';
    #register($_POST['account'],$_POST['pwd'],$tmp_db_connect,$_POST["question"],$_POST['answer']);
    register_test($_POST["answer"]);
}


?>