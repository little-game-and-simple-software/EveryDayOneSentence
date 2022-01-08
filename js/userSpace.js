//设置php的路径模式
var php_path = "../php/"
console.log(php_path)
$(function() {
    var usr = $.cookie("account")
        //获得cookie
    if ($.cookie('login')) {
        $("#username").text("用户名称(暂时使用账户名称)：" + $.cookie("account"))
        $("#uid").text("uid:" + $.cookie("uid"))
    } else {
        alert("错误，你未登录，没有cookie记录！")
            // TODO: 正式上线 需要添加参数"_self"
        window.open("../index.html", "_self")
    }
    get_user_upload_juzi(usr);
    //更换用户头像功能
    $("#change_head_img").click(function() {
        alert("感谢轻图床提供免费图片存储服务！")
        $.post("https://img.52hyjs.com/api/token")
        alert("为了确保隐私，这里不使用站长的公用轻图床账号，请各位用户自己注册账号，并在弹出的框内输入参数")
        var account = prompt("请输入账号")
        var pwd = prompt("请输入密码")
        alert("正在获取token？")
        alert("测试账号->" + account)
        alert("测试密码->" + pwd)
    })
    $("#change_user_pwd").click(function() {
            var c = confirm("确定要更改你的密码吗？")
            if (c) {
                window.open("user/change_user_pwd.html")
            } else {}
        })
        //退出登录
    $('#logout').click(function() {

            $.removeCookie('login', { path: '/' })
            $.removeCookie('account', { path: '/' })
            $.removeCookie('pwd', { path: '/' })
            alert("退出登录！")
            window.open("../index.html", "_self")
        })
        //NOTE: 获得用户的句子
    function get_user_upload_juzi(usr) {
        $.post(php_path + "get_user_upload_juzi.php", { usr: usr }, function(data, status) {
            console.log(data)
            console.log(status)
                //  document.write(data)
            var splited = data.split("<br>")
            console.log(splited)
            for (var i = 0; i < splited.length; i++) {
                console.log("执行了" + i + "次")
                $("#stn-root").append("<li><a href='userSpace.html'>" + splited[i] + "</a></li>")
            }
        })
    }
})