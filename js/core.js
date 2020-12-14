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
