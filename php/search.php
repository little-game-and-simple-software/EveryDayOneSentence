<?php
     include("auto_login_db.php");
     $db_connect=auto_login_db("local");
    function search($db,$action)
    {
        if($action=="search_user")
        {}
        if($action=="search_stn")
        {
            $sql="SELECT juzi FROM checkjuzi WHERE state=1";
            mysqli_query($db,"SET NAMES utf8");
            $result=mysqli_query($db,$sql);
            $all=mysqli_fetch_all($result,MYSQLI_NUM);
            #var_dump($all);
            $json=json_encode($all[0]);
            echo $json;
        }
    }
    search($db_connect,$_POST['action']);
    ?>