var global_action = "" //login或则register注册
    //设置php的路径模式
var php_path = "../php/"
    //全局变量 验证结果 状态
var global_verify_result = false
    //全局变量 账号密码
var global_account
var global_pwd
    //登录页面
$(function() {
    //在加载时就获取验证信息
    var question = requestQuestion()
    console.log("问题>" + question)
    $("#timu").text("题目:" + question)
        //进行验证 按钮事件
    $("#request_verify").click(function() {
            var usr_answer = $("#usr_answer").val()
            console.warn(usr_answer)
            var verify_result = verify(question, usr_answer)
                //同步验证结果到全局变量
            global_verify_result = verify_result
                //验证成功 立刻执行注册代码post
            if (verify_result) {
                console.warn("验证成功")
                register()
            } else {
                alert("错误，验证失败")
            }
        })
        //更换题目 按钮事件
    $("#change_question").click(function() {
        question = requestQuestion()
        console.log("更换后的问题>" + question)
        $("#timu").text("题目:" + question)
    })
    $("#showPwd").click(function() {
        $("#pwd").attr('type', 'text')
    })
    $("#hidePwd").click(function() {
            $("#pwd").attr('type', 'password')
        })
        //登录或者注册
        //登录
    $("#Mylogin").click(function() {
            action = "login"
            var value1 = $("#account").val()
            var value2 = $("#pwd").val();
            if (value1 != '' && value2 != '') {
                alert("登录中")
                $.post(php_path + "register.php", { to_action: action, account: value1, pwd: value2 }, function(data, status) {
                    //alert('http->'+status)
                    //alert(data)
                    //document.write(data)
                    console.log(data)
                    if (data) {
                        $("body").append(data);
                        $.cookie("login", "true", { path: '/' })
                        $.cookie("account", value1, { path: '/' })
                        $.cookie("pwd", value2, { path: '/' })
                        alert("登录成功")
                            //用户信息保存完成后回到主页
                        window.open("../index.html", "_self")
                    } else if (data == "") {
                        alert("错误,账号或密码不正确")
                    }
                })
            } else {
                alert("不可以登录")
            }
        })
        //注册 点击后弹出注册按钮
    $("#register").click(function() {
            //显示验证div
            $("#verify_human").show()
                //注册
            action = "register"
            var value1 = $("#account").val()
            var value2 = $("#pwd").val();
            //同步信息到全局
            global_account = value1
            global_pwd = value2
            global_action = action
            if (value1 != '' && value2 != '') {
                alert("请按照要求完成人机身份验证")
                    //
            } else {
                alert("不可以注册")
            }
        })
        //注册代码移动到这里 post部分
    function register() {
        $.post(php_path + "register.php", { to_action: global_action, account: global_account, pwd: global_pwd }, function(data, status) {
            alert('http状态' + status)
                //alert(data)
                //document.write(data)
            console.log(data)
            if (data == true) {
                alert("注册成功，请牢记你的账号密码")
            } else {
                alert("注册失败，账号已存在")
            }
            //alert(data)
        })
    }
})