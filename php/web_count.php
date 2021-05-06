<?php
    #include("core.php");
    include("auto_login_db.php");
    #$db_connect=auto_login_db("mryj");
    $db_connect=auto_login_db("local");
    function count_users($db)
    {
        $sql="SELECT * FROM user ";
        $result=mysqli_query($db,$sql);
        var_dump($result);
        print_r($result);
        $rows=mysqli_fetch_row($result);
        var_dump($rows);
        echo 
    }
    count_users($db_connect);
?>