//经过搜索匹配处理后的文字数组
var result_array = []
$(function() {
    //全部
    var php_path = "../php/"
    window.search_result = ""
    $.post(php_path + "search.php", { action: "get_all_stn", keyword: "" }, function(data, status) {
            //console.log(data)
            //document.write(data)
            var json = JSON.parse(data)
            console.log(json)
            console.log(typeof(json))
            for (var i = 0; i < json.length; i++) {
                $("#stn_list").append("<li>" + json[i] + "</li>")
            }
        })
        //搜索按钮
    $(".button-toysworld:eq(1)").click(function() {
            //获取搜索框的值
            keyword_value = $("#InputSearch").val()
            alert("待搜索的关键词" + keyword_value)
            $("#result_list_stn").empty()
            $.post(php_path + "search.php", { action: "search_stn", keyword: keyword_value }, function(data, status) {
                var result = JSON.parse(data)
                console.log("搜索结果>" + result)
                window.search_result = result
                if (window.search_result.length > 1) {
                    console.log("添加")
                    for (var index = 0; index < window.search_result.length; index++) {
                        $("#result_list_stn").append("<li>" + window.search_result[index] + "</li>")
                    }
                }
                if (window.search_result.length == 1) {
                    console.log("只有一个结果")
                    $("#result_list_stn").append("<li>" + window.search_result + "</li>")
                }
            })
            console.log("Window>" + window.search_result)
        })
        //跳转按钮
    $(".button-toysworld:eq(2)").click(function() {
            alert("功能未开发")
        })
        //显示语句的按钮
    $(".button-toysworld:eq(3)").click(function() {
            $(".testDiv:eq(1)").css("display", "none")
            $(".testDiv:eq(0)").css("display", "block")
        })
        //显示用户的按钮
    $(".button-toysworld:eq(4)").click(function() {
            $(".testDiv:eq(0)").css("display", "none")
            $(".testDiv:eq(1)").css("display", "block")
            var k = $("#InputSearch").val()
            $("#result_list_usr").empty()
            $.post(php_path + "search.php", { action: "search_user", keyword: k }, function(data, status) {
                var result = JSON.parse(data)
                console.log("搜索结果>" + result)
                window.search_result = result
                if (window.search_result.length > 1) {
                    console.log("添加")
                    for (var index = 0; index < window.search_result.length; index++) {
                        $("#result_list_usr").append("<li>" + window.search_result[index] + "</li>")
                    }
                }
                if (window.search_result.length == 1) {
                    console.log("只有一个结果")
                    $("#result_list_usr").append("<li>" + window.search_result + "</li>")
                }
            })

            console.log("Window>" + window.search_result)
        })
        //显示全部
    $(".button-toysworld:eq(5)").click(function() {
        $(".testDiv:eq(0)").css("display", "block")
        $(".testDiv:eq(1)").css("display", "block")
    })

    function search_with_keyword(keyword, action) {
        $.post(php_path + "search.php", { action: action, keyword: keyword }, function(data, status) {
            var result = JSON.parse(data)
            console.log("搜索结果>" + result)
            window.search_result = result
        })
    }
})