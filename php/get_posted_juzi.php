<?php
//php允许跨域访问
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET'); // 允许请求的类型
include("auto_login_db.php");
// NOTE: 用于审核页面获取用户句子的php 和get_user_upload_juzi.php区分开来
//$conn="";
$tmp_db_connect=auto_login_db("mryj");
#如果域名为127.0.0.1 用本地连接否则用远程连接
get_juzi($tmp_db_connect);
#本地处理方法
function get_juzi($conn)
{
  $sql="SELECT * from checkjuzi WHERE state=-1";
  mysqli_query($conn,"SET NAMES utf8");
  $result=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
  $row_number=mysqli_num_rows($result);
  $array=[];
  //print_r($row_number);
  if($row_number==0)
  {
    echo "<p>暂时没有需要审核的句子</p>";
  }
  else
  {
    for($i=0;$i<count($rows);$i++)
    {
    $tmp_row=$rows[$i];
    //var_dump( $tmp_row);
    //print_r($tmp_row);
    array_push($array,$tmp_row);
    }
  }
  //print_r($array);
  $js_json=json_encode($array);
  echo $js_json;
}
//print_r($array);
//print_r($rows);
 ?>
