var keyword=""
//经过搜索匹配处理后的文字数组
var result_array=[]
$(function()
{
  //搜索按钮
  $(".button-toysworld:eq(1)").click(function()
  {
    alert("toysworld类的按钮被按下")
    //获取搜索框的值
    keyword=$("#InputSearch").val()
    alert("待搜索的关键词"+keyword)
    //执行搜索方法 返回一个处理后的数组变量 待处理
    //待动态更新界面 append??
    var result=search_with_keyword(keyword)
    //test_key_Search()
    console.log("返回的结果->"+result)
    $(".testDiv:eq(0)").append("<a href='userSpace.html'>"+result+"</a>")

  })
  //跳转按钮
  $(".button-toysworld:eq(2)").click(function()
  {
    alert("功能未开发")
  })
  //显示语句的按钮
  $(".button-toysworld:eq(3)").click(function()
  {
  $(".testDiv:eq(1)").css("display","none")
  $(".testDiv:eq(0)").css("display","block")
  })
  //显示用户的按钮
  $(".button-toysworld:eq(4)").click(function()
{
  $(".testDiv:eq(0)").css("display","none")
  $(".testDiv:eq(1)").css("display","block")
})
//显示全部
$(".button-toysworld:eq(5)").click(function()
{
  $(".testDiv:eq(0)").css("display","block")
  $(".testDiv:eq(1)").css("display","block")
})


   // 开始写 jQuery 代码...

})
var array=["测试是",'垃圾']

function search_with_keyword(keyword)
{
  //文字数组
  var SentenceSet=["修正",'通用aaa','学生b']
  //遍历 改用简单算法
  //alert(SentenceSet.length)
  for(var i=0;i<SentenceSet.length;i++)
  {
    var currentValue=SentenceSet[i]
    console.log("当前的数组值->"+i+currentValue)
    console.log("当前被匹配的字符串长度"+currentValue.length)
    if(currentValue.indexOf(keyword)!=-1)
    {
      alert("匹配到值->success")
      result_array.push(currentValue)
    }
  }
  return result_array
}
//-------遗弃嵌套for算法
/*
for(var i2=0;i2<currentValue.length;i2++)
{
  //当前文字（从字符串分离出单个字）
  var current_text=currentValue.charAt(i2)
  console.log("当前分字->"+current_text)
  if(current_text==keyword.charAt(i2))
  {
    result_array.push(SentenceSet[i])
    alert(result_array)
    i2+=1
  }
}*/
