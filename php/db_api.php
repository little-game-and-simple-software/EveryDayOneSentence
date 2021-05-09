<?php
#删除所有的测试句子
include("auto_login_db.php");
$db = "";
function connect_to_db()
{
    global $db;
    if ($_POST['db_remote']) 
    {
        $db = auto_login_db("mryj");
    } else 
    {
        $db = auto_login_db("local");
    }
}
connect_to_db();
if ($_POST['action'] == "remove_test_stn") 
{
    remove_all_test_stn($db);
}
function remove_all_test_stn($db)
{
    echo "删除测试句子！";
    $sql="DELETE FROM checkjuzi Where user=666";
    $result=mysqli_query($db,$sql);
    var_dump($result);
}
