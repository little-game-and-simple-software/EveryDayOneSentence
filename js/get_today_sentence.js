$(function()
{
  alert("获取今天的句子！")
  $.get("php/get_today_sentence.php",function(data,status)
  {
    document.write(data)
  })
})
