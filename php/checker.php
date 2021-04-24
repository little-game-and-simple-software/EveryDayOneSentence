<?php
    $secret_key="fu96diflza";
    //验证身份 审核员登录
    function checker_verify($input_secret_key)
    {
        if($input_secret_key=="secret_key")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    #审核句子的流程 (http协议) php路径：mryj.biu8.top/php
    #1.先发送get请求 链接在下面
    #1.先通过mryj.biu8.top/php/get_posted_juzi.php获取标识为-1的句子列表 (待审核句子) 返回json值 可能是json对象 也能是json数组 
    #本质上是这一句  $js_json=json_encode($array);echo $js_json;
    # 你需要从返回的json对象中获取待审核的句子和用户名称
    #2.向shenhe.php发送post请求 
    #带参数 $_POST['status'],$_POST['user'],$_POST['juzi'],$_POST['key']
    #post参数一 设定句子的处理方式（-1待审核 1通过审核 0不通过审核）
    #post参数二 用户名 执行sql的必须参数 
    #post参数三 待审核的句子句子
    #post参数四 审核人员身份验证秘钥 每次向发送post请求都需要验证秘钥
    #本质上执行这个sql语句
    #$sql="UPDATE checkjuzi SET state='$state' WHERE user='$user' AND  juzi='$sentence' "; 
    #不清楚看我的github上私有仓库的代码 EveryDayOneSentence
?>