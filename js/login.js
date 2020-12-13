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
      alert("登录中")
      //php/register.php
      $.post("爱给网正式php/register.php",{to_action:action,account:value1,pwd:value2},function(data,status)
      {
        //alert('http->'+status)
        //alert(data)
        //document.write(data)
        console.log(data)
        if(data)
        {
          $.cookie("login","true",{path:'/'})
          $.cookie("account",value1,{path:'/'})
          $.cookie("pwd",value2,{path:'/'})
          alert("登录成功")
          //用户信息保存完成后回到主页
          window.open("index.html","_self")
        }
        else if(data=="")
        {
          alert("错误,账号或密码不正确")
        }
      })
    }
    else
    {
        alert("不可以登录")
    }
  })
//注册
$("#register").click(function()
{
  action="register"
  var value1=$("#account").val()
  var value2=$("#pwd").val();
  if(value1!='' && value2!='')
  {
    alert("注册中")
    $.post("爱给网正式php/register.php",{to_action:action,account:value1,pwd:value2},function(data,status)
    {
      alert('http状态'+status)
      //alert(data)
      //document.write(data)
      console.log(data)
      if(data==true)
      {
        alert("注册成功，请牢记你的账号密码")
      }
      else
      {
        alert("注册失败，账号已存在")
      }
      //alert(data)
    })
  }
  else
  {
      alert("不可以注册")
  }
})

})
