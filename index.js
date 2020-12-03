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
  $("#getRecommandJuzi").click(function()
  {
    alert("敬请期待")
    window.open("showTodaySentence.html")
  })
  $("#qiandao").click(function()
  {
    alert("请先登录")
    window.open("qiandao.html")
  })
  $("#user").click(function()
{
  alert("请先登录")
  window.open("userSpace.html")
})
})
