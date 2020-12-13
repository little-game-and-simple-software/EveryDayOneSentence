$(function()
{
  //alert("获取状态")
  //$.get()
  $.get('Truephp/get_web_state.php',function(data,status)
  {
    //document.write(data)
  //  console.log('网站状态'+data)
    if(data=="on")
    {

    }
    else if(data=="off")
    {
      alert("网站维护中，请稍后访问！")
      window.open("error/fix.html","_self")
    }
  })
})
