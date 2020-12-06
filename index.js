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
}
$(document).ready(function()
{

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
  $(".button-toysworld:eq(3)").click(function()
{
  alert("请先登录")
  window.open("userSpace.html")
})
})
