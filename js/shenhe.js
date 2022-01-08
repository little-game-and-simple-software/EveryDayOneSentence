$(function()
{
  // WARNING: 需要添加网站管理员验证登录的功能，防止用户误触审核系统
  var php_path=auto_set_php()
  // NOTE: 获得待审核的数据
  get_to_check_data()
  function get_to_check_data()
  {
    $.get(php_path+"get_posted_juzi.php",function(data,status)
    {
      console.log(status)
      //data="[10213m,1321,23,13,1]"
      // NOTE: 应该是需要判断一下，不然会把json数组搞到主页上面去了
      var data_type=data.indexOf("<")
      console.log(data)
      console.log('data类型>'+data_type)
      // NOTE: 根据返回的string是否含有<p>标签，来判断是否是json格式
      if(data_type==0)
      {
         $("body").append(data)
      }
      // NOTE: 动态添加待审核句子
      if(data_type==-1)
      {
        var js_data=Array(data)
        var result=$.parseJSON(js_data)
        // NOTE: 遍历 设置待审核的li的属性
        //$("#test").text(result[0].juzi+" "+"日期："+result[0].date+" "+"用户"+result[0].user)
        for(var i=0;i<result.length;i++)
        {
          console.log("执行了"+i+"次")
           // TODO: 根据json对象的长度，动态生成li
           $("#ol").append("<li class='t'></li>")
           $(".t:eq("+String(i)+")").text(result[i].juzi+"用户"+result[i].user)
           //+" "+"日期："+result[i].date+" "
           $(".t:eq("+String(i)+")").append("<button class='pass_btn'>可以通过</button><button class='faile_btn'>不可以通过</button>")
        }
      }
      // NOTE: 两个审核按钮
    //  $(".pass_btn:eq(0)").click(function()
      $(".pass_btn").click(function()
      {
        // NOTE: 当通过按钮按下，设置状态为1，即通过审核
        var state=1
        $(this).css("background","green")
        // NOTE: 暂时遇到问题，需要一段时间来解决这个问题 使用echo函数解决？
        // TODO: 获取点击按钮所在li的文字 即button父节点
        //  var parent=$(".pass_btn").parent()
        var text_raw=$(this).parent().text()
        // NOTE: 需要处理掉按钮上的无用字符串
        var text=text_raw.split("用户")[0]
        // NOTE: 暂时还没有想到如何获取这个句子的用户信息，因为当按下按钮后，是通过this的parent节点来查找它对应的句子的
        var use=text_raw.split("用户")[1].split("可以通过")[0]
    //    console.log($(this).parent())
        alert(text)
        console.log(text)
    //    console.log("用户"+use)
        // TODO: 提交post审核句子，参数1：句子 参数2：状态
        $.post(php_path+"shenhe.php",{juzi:text,status:state,user:use},function(data,status)
        {
          console.log(status)
          console.log("提交到shenhe.php并通过后，返回的数据"+data)
          document.write(data)
          if(data)
          {
            alert("审核通过！已经添加这句话到句子总表")
            window.open("shenhe.html","_self")
          }
          else
          {
            alert("错误")
          }
        })
      //  console.log(status)
      })
      $(".faile_btn").click(function()
      {
        // NOTE: 不通过 0
        var state=0
        var text_raw=$(this).parent().text()
        // NOTE: 需要处理掉按钮上的无用字符串
        //alert(text_raw)
        var text=text_raw.split("用户")[0]
        // NOTE: 暂时还没有想到如何获取这个句子的用户信息，因为当按下按钮后，是通过this的parent节点来查找它对应的句子的
        var use=text_raw.split("用户")[1].split("可以通过")[0]
        //console.log($(this).parent())
        console.log(text)
        console.log("用户"+use)
        $(this).css("background","red");
        $.post(php_path+"shenhe.php",{juzi:text,status:state,user:use},function(data,status)
        {
          console.log(status)
          console.log("提交到shenhe.php并通过后，返回的数据"+data)
          console.log(data)
          //document.write(data)
          if(data)
          {
            alert("这句话不符合社区规范和真善美，已更新审核数据为不通过")
            location.reload()
          }
          else
          {
            alert("错误")
          }
        })
        //alert("不可以通过")
      })
    })
  }
  // NOTE: 获取最新待审核的句子
  $("#get_latest_uncheckd_juzi").click(function()
  {
    //      get_to_check_data()
    // NOTE: 刷新
    location.reload()
  })
 })
