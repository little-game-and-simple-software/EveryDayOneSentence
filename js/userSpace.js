$(function()
{
  //更换用户头像功能
  $("#change_head_img").click(function()
  {
    alert("感谢轻图床提供免费图片存储服务！")
    $.post("https://img.52hyjs.com/api/token")
    alert("为了确保隐私，这里不使用站长的公用轻图床账号，请各位用户自己注册账号，并在弹出的框内输入参数")
    var account=prompt("请输入账号")
    var pwd=prompt("请输入密码")
    alert("正在获取token？")
    alert("测试账号->"+account)
    alert("测试密码->"+pwd)

  })
})
