$(function()
{
  action="login"
  value1="toysworld"
  value2="toysworld"
  alert("测试js代码是否执行")
  $.post("http://everydayonesentence.biu8.top/Truephp/register.php",{to_action:action,account:value1,pwd:value2},function(data,status)
  {
    alert(data)
    console.log(data)
    document.write(data)
  })
})
