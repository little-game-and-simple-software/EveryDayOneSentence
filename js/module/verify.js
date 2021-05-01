//todo 把验证代码写在php防止爬取
var answers=["14","1",'43','27','16','-39','180度','是']
var questions=["1+13=?","5-4=?","6*6+7=?","6^2-3^2=?","2^4=?","x+66-7=20 x=?","三角形内角和=?","代码是编程的一部分吗"]
//同步指针索引
var pointer_index=0
function requestQuestion()
{
    var index=Math.round(Math.random()*questions.length)
    var current_question=questions[index]
    pointer_index=current_question
    return current_question
}
var out=requestQuestion()
console.log(out)
//根据是否正确返回值 验证
function verify(question,user_answer)
{
    //得到问题的索引
    var question_index=questions.indexOf(question)
    var user_index=answers.indexOf(user_answer)
   //当用户的回答和问题的对应索引的答案一致时 应该是判断索引是否一致
    if(question_index==user_index)
    {
        console.warn("验证成功")
        return true
    }
    else
    {
        console.warn("验证失败")
        return false
    }
}