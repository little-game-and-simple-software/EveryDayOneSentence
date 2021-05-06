<?php
    #include("core.php");
    include("auto_login_db.php");
    $db_connect=auto_login_db("mryj");
    #$db_connect=auto_login_db("local");
    function count_users($db)
    {
        $sql="SELECT * FROM user ";
        $result=mysqli_query($db,$sql);
        $rows=mysqli_fetch_row($result);
        echo count($rows);
    }
    #句子
    function count_stns($db)
    {
        $sql="SELECT * FROM checkjuzi WHERE state=1 ";
        $result=mysqli_query($db,$sql);
        $rows=mysqli_fetch_row($result);
        echo count($rows);
    }
   
    count_users($db_connect);
    echo ",";
    count_stns($db_connect);

?>