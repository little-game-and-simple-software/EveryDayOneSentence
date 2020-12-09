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
      $.post("register.php",{to_action:action,account:value1,pwd:value2},function(data,status)
      {
        alert(status)
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
    alert("可以注册")
    $.post("register.php",{to_action:action,account:value1,pwd:value2},function(data,status)
    {
      alert(status)
      //alert(data)
      //document.write(data)
      console.log(data)
      //alert(data)
    })
  }
  else
  {
      alert("不可以注册")
  }
})

})
