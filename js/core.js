//核心js
//设置php路径模式
function set_php_path_mode(mode)
{
  if(mode=="local")
  {
    return "php/"
  }
  if(mode=="internet")
  {
    return "Truephp/"
  }
}
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
