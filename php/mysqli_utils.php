<?php
#fetch_all to json 返回给前端使用 返回json数组
function utils_fetch_data_to_json($db,$sql)
{
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
    return $json;
}
?>