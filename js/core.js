//核心js
//设置php路径模式

// NOTE:打印出object对象所有的属性 返回包含object所有属性 的数组
function Litte_sandbox_pring_obj_all(obj)
{
  var array=[]
  for (var item in obj)
    {
    //  str +=item+":"+result[item]+"\n";
    //  console.log(item)
    console.log("！-遍历输出-！object属性->"+obj[item]+"\n");
    array.push(obj[item])
    }
    return array
}
// NOTE: 根据不同域名来自动选择是本地php路径还是主机php路径
function auto_set_php (){
    //获取域名
    var domain = document.domain;
    console.log("域名"+domain)
    //alert(domain)
    if(domain=="127.0.0.1")
     {
    console.log("本地域名环境")
    return 'php/'
    }
    //虚拟主机
    if(domain=="godotjstest.4uv.top"||domain=="mryj.4uv.top")
    {
      console.log("外网域名环境")
        return 'Truephp/'
    }
    if(domain=="")
    {
      
    }
    // //github主页
    // if(domain=="littlegame.opvs.me")
    // {
    // return 'http://'+'everydayonesentence.biu8.top/Truephp/'
    // }
    else
    {
        alert('未知域名,无法自动设置php路径'+domain)
      }
}
// NOTE: 自动解决http混合问题
function auto_set_http_mix()
{
  $("head").append('<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">')
}
// NOTE: 下面这个是废弃的方法
/*function set_php_path_mode(mode)
{
  if(mode=="local")
  {
    return "php/"
  }
  if(mode=="internet")
  {
    return "Truephp/"
  }
}*/
