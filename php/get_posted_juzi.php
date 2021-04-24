<?php
#header("Content-Type:text/plain;charset=utf-8");
include("core.php");
//ob_end_clean();
// NOTE: 用于审核页面获取用户句子的php 和get_user_upload_juzi.php区分开来
$conn="";
// $conn=connect_to_db();
//首先要链接到数据库
$host_name=$_SERVER["HTTP_HOST"]; 
echo "域名".$host_name;
#如果域名为127.0.0.1 用本地连接否则用远程连接
if($host_name=="127.0.0.1")
{
  global $conn;
  $conn=connect_to_db_quick("everydayonesentence");
  local_get_juzi($conn);
}
if($host_name=="mryj.biu8.top")
{
 // global $conn;
  $remote_conn=core_connect_to_db("127.0.0.1","mryi_com","Gx2sy8M3YWGsJZwk","mryi_com");
  //print_r($remote_conn);
  $conn=$remote_conn;
  local_get_juzi($remote_conn);
}
#本地处理方法
function local_get_juzi($conn)
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
print_r($array);
//print_r($rows);
 ?>
