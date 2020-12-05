var action="" //login或则register注册

//登录页面
$(function()
{
  /*$.get("register.php",function(data,status)
  {
    alert(data)
  })*/
  $("#showPwd").click(function()
  {
    $("#pwd").attr('type','text')
  })
  $("#hidePwd").click(function()
  {
    $("#pwd").attr('type','password')
  })
  //登录或者注册
//登录
  $("#Mylogin").click(function()
  {
    action="login"
    var value1=$("#account").val()
    var value2=$("#pwd").val();
    if(value1!='' && value2!='')
    {
      alert("可以登录")
      $.post("register.php",{to_action:action},function(data,status)
      {
        alert(data)
      })
    }
    else
    {
        alert("不可以登录")
    }
  })


})
