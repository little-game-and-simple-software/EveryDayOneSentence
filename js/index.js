//设置php的路径模式
var php_path=set_php_path_mode("internet")
console.log(php_path)
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
//投稿按钮
function upload()
{
  //alert("请先登录")
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
      $('#login a').text("状态：已登录")
    }
  }
  $('#debug').click(function()
  {
    $('.button-toysworld:eq(0)').show()
    $('.button-toysworld:eq(1)').show()
  })
  $(".button-toysworld:eq(2)").click(function()
  {
  //  alert("敬请期待")
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

// NOTE: 由于php自带mail方法需要服务器支持，所以暂时不同php发送邮件，需要用户手动发送邮件
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
//登出按钮
$("#logout").click(function()
{
    alert("退出登录")
    $.removeCookie('login',{path:'/'})
    $.removeCookie('account',{path:'/'})
    $.removeCookie('pwd',{path:'/'})
    $("#login a").text("状态,未登录")
    $('.button-toysworld:eq(0)').show()
    $('.button-toysworld:eq(1)').show()
})
//播放器
$("#play").click(function()
{
  $("#bgm")[0].play()
})
//暂停
$("#pause").click(function()
{
  $("#bgm")[0].pause()
})
//设置音量
$("#vol-set").click(function()
{
  var v=$("#vol-set")
  var volume=v.val()
var float_volume=Number(volume/100)
  console.log(float_volume)

  console.log($("#bgm")[0].volume)
  $("#vol").text("音量设置："+volume+"%")
 $("#bgm")[0].volume=float_volume
})
//切换背景音乐
$("#change_bgm").click(function()
{
  alert("切换音乐！")
  var url=$("#bgm_url").val()
  $("#bgm").attr("src",url)
})
//重置背景音乐
$("#reset_bgm").click(function()
{
  alert("重置背景音乐！")
  $("#bgm").attr("src","https://sound-ks1.cdn.missevan.com/aod/202010/23/8b49d1d92e992adb6fd21b052c8e4769202649.m4a")
})

})
