<?php
#用于自动登录数据库的PHP文件
include("core.php");
function auto_login_db($login_type)
{
    $host_name=$_SERVER["HTTP_HOST"]; 
    #echo "域名".$host_name;
    if($host_name=="127.0.0.1")
    {
        if($login_type=="local")
        {
        $conn=connect_to_db_quick("mryj");
        return $conn;
        }
    }
    if($host_name=="mryj.biu8.top")
    {
        if($login_type=="root")
        {
            $remote_conn=core_connect_to_db("localhost","root","zr871214","mryi_com");
            //print_r($remote_conn);
            return $remote_conn;
        }
        if($login_type=="mryj")
        {
            $remote_conn=core_connect_to_db("127.0.0.1","mryi_com","Gx2sy8M3YWGsJZwk","mryi_com");
            return $remote_conn;
        }
    }
    else
    {
        echo "未知域名";
    }
}
#auto_login_db("root");
?>