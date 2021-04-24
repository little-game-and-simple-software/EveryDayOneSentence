<?php
#用于自动登录数据库的PHP文件
include("core.php");
function auto_login_db()
{
    $host_name=$_SERVER["HTTP_HOST"]; 
    #echo "域名".$host_name;
    if($host_name=="127.0.0.1")
    {
        $conn=connect_to_db_quick("everydayonesentence");
        return $conn;
    }
    if($host_name=="mryj.biu8.top")
    {
        $remote_conn=core_connect_to_db("127.0.0.1","mryi_com","Gx2sy8M3YWGsJZwk","mryi_com");
        return $remote_conn;
    }
    else
    {
        echo "未知域名";
    }
}
?>