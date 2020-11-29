//登录页面
$(document).ready(function()
{
  //注册 如果账号和密码任意一个漏输了，不会自动发送form表单
  $("#register").click(function()
  {
    var value1=$("#account").val()
    var value2=$("#pwd").val()
    //alert(value)
    if(value1=='' || value2=='')
    {
      alert("错误，你未输入账号和密码！")
    }
    //输入新的账号和密码，发送请求到php，准备后续数据处理
    else
    {
      alert("正在向php发送数据...")
      $.post("register.php",function(data,status)
      {
        document.write("返回数据测试"+data)
        document.write("状态"+status)
      })
    }
  })
  //alert("你好Jquery")
  $("#account").click(function()
  {

  })
  //获取今日推荐的每日一句（从数据表随机抽取一句用户的句子
//登录
  $("#login").click(function()
  {
    var value1=$("#account").val()
    var value2=$("#pwd").val()
    //alert(value)
    if(value1=='' || value2=='')
    {
      alert("错误，你未输入账号和密码！")
    }

  })
  $("#showPwd").click(function()
  {
    $("#pwd").attr('type','text')
  })
  $("#hidePwd").click(function()
  {
    $("#pwd").attr('type','password')
  })
})
