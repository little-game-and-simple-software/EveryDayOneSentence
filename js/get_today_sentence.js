//设置php的路径模式
var php_path=set_php_path_mode("internet")
console.log(php_path)
$(function()
{
  //句子被喜欢的次数 初始化
  var likes=0
  alert("获取今天的句子！")
  $.get(php_path+"get_today_sentence.php",function(data,status)
  {
    //document.write(data)
    console.log(data)
    $(".sentence").text(data)
  })
  //点赞功能
  $("#like").click(function()
  {
    if(likes<1)
    {
    likes+=1
    console.log('喜欢->'+likes)
    $("#like").css('background-color',"red")
    alert("喜欢->"+likes)
    }
    else
    {
      alert("你已经点过赞了，不要重复刷赞")
    }
  })
  //取消点赞
  $("#unlike").click(function()
  {
    likes=0
    console.log("喜欢->"+likes)
    alert("已取消喜欢")
    $("#like").css("background-color","white")
  })
  //上传数据到数据库
  function upload_likes_to_mysql()
  {
    $.post("upload_likes.php",{},function(data,status)
    {

    })
  }

})
