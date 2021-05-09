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
            $array=[];
            $row_number=mysqli_num_rows($result);
            $all=mysqli_fetch_all($result,MYSQLI_NUM);
            for($i=0;$i<count($all);$i++)
            {
            $tmp_row=$all[$i];
             array_push($array,$tmp_row);
           }
            #print_r($array);
            $json=json_encode($array);
            echo $json;
        }
    }
    search($db_connect,$_POST['action']);
    ?>