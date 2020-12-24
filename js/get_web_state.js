$(function()
{
  var php_path=auto_set_php()
  console.log(php_path)
  $.get(php_path+'get_web_state.php',function(data,status)
  {
    //document.write(data)
  //  console.log('网站状态'+data)
    if(data=="on")
    {
      alert("网站状态>正常运行")
    }
    else if(data=="off")
    {
      alert("网站维护中，请稍后访问！")
      window.open("error/fix.html","_self")
    }
    else
    {
      alert("未知状态，异常！！！")
    }
  })
})
