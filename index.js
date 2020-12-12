//展示公告
function get_update_information()
{
  $("#dialog").dialog()
//  alert("暂时没有公告")
}
//搜索按钮 跳转搜索界面
function search()
{
  alert("具体细节待开发中，按确定键跳转页面")
  window.open("search.html")
}
function upload()
{
  alert("请先登录")
  window.open("upload.html")
}
$(document).ready(function()
{
  //判断cookie
  if($.cookie('login'))
  {
    alert("测试->存在cookie")
    if($.cookie('login'))
    {
      //如果登录成功 隐藏注册按钮等
      $('.button-toysworld:eq(0)').hide()
      $('.button-toysworld:eq(1)').hide()
    }
  }
  $('#debug').click(function()
  {
    $('.button-toysworld:eq(0)').show()
    $('.button-toysworld:eq(1)').show()
  })
  $(".button-toysworld:eq(2)").click(function()
  {
    alert("敬请期待")
    window.open("showTodaySentence.html","_self")
  })
  //签到
  $(".button-toysworld:eq(4)").click(function()
  {
    alert("请先登录")
    window.open("qiandao.html","_self")
  })
  //建议反馈按钮
  $(".button-toysworld:eq(8)").click(function()
  {
    var x=confirm("请发送反馈建议给2439905184@qq.com")
    if(x)
    {
      window.open("https://mail.qq.com/")
    }
  })
  //主页的我的按钮
  $(".button-toysworld:eq(3)").click(function()
{
  //alert("请先登录")
  if($.cookie('login'))
  {
    alert("测试->存在cookie")
    //如果登录成功 隐藏注册按钮等
    $('.button-toysworld:eq(0)').hide()
    $('.button-toysworld:eq(1)').hide()
    window.open("userSpace.html")
  }
    else
    {
      alert("错误，请先登录")
    }

})
//按钮音效
$(".button-toysworld").click(function()
{
  var audio_effect=$("#effect")
  //alert(audio_effect)
  console.log(audio_effect)
  audio_effect[0].play()
})

})
