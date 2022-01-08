//统计网站信息
$(function() {
    var php_path = auto_set_php()
    console.log(php_path)
        //获得注册用户信息
    $.get(php_path + "web_count.php", function(data, status) {
            console.log("web_count.php" + status)
            console.log(data)
            $("#count_users").text(data.split(",")[0])
            $("#count_stns").text(data.split(",")[1])

        })
        //获得收录句子信息
        // $.get(php_path + "web_count.php", function(data, status) {
        //     $("#count_stns").text(data)
        // })
})