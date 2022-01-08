<?php
     include("auto_login_db.php");
     include("mysqli_utils.php");
     $db_connect=auto_login_db("local");
    function search($db,$action,$key_word)
    {
        if($action=="search_user")
        {
            $sql="SELECT account FROM user WHERE account LIKE '%$key_word%' ";
            $json=utils_fetch_data_to_json($db,$sql);
            echo $json;
        }
        if($action=="search_stn")
        { 
            $sql="SELECT juzi FROM checkjuzi WHERE state=1 AND juzi LIKE '%$key_word%' ";
            $json=utils_fetch_data_to_json($db,$sql);
            echo $json;
        }
        if($action=="get_all_stn")
        {
           $sql="SELECT juzi FROM checkjuzi WHERE state=1";
           $json=utils_fetch_data_to_json($db,$sql);
           echo $json;
        }
    }
    search($db_connect,$_POST['action'],$_POST['keyword']);
    ?>