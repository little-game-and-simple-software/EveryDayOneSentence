//投稿代码
$(function()
{
  var cookie_usr=$.cookie('account')
  alert("当前用户->"+cookie_usr)
  var texts=0
  //初始化剩余值
  var left=100
  var cookie_login_state=$.cookie('login')
  console.log(cookie_login_state)
  $("#in").keydown(function()
  {
    texts+=1
    left=100-texts
    $("#left").text("还能输入"+left+"字")
    if(left<=0)
    {
      $("#in").attr("disabled","disabled")
      alert("字数上限 不能输入")
    }
  })
  $("#change").click(function()
  {
    $("#in").attr("disabled",false)
    texts=0
    left=100
    $("#left").text("还能输入"+left+"字")
    $("#in").val("")
  })
  //投稿功能
  $("#upload").click(function()
  {
    var to_post_text=$("#in").val()
    alert(to_post_text)
    // TODO: 投稿功能
    //alert("功能开发中")
    if(cookie_login_state)
    {
      $.post("爱给网正式php/upload.php",{text:to_post_text,user:cookie_usr},function(data,status)
      {
          //document.write(data)
          console.log(data)
          if(data==true)
          {
            alert("投稿成功")
          }
          else
          {
            alert("投稿失败")
          }
        })
   }
   else
   {
     alert("未登录，不能投稿")
   }

  })
})
