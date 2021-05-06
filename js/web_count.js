//统计网站信息
$(function() {
    var php_path = auto_set_php()
    console.log(php_path)
    $.get(php_path + "web_count.php", function(data, status) {
        console.log("web_count.php" + status)
        console.log(data)
    })
})