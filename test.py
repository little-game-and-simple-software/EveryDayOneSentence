import requests
url="http://mryj.biu8.top/php/api/register.php"
#获得问题
res=requests.get(url)
print(res.text)
#提交post 注册
def post():
    question=res.text.split("question:")[1]
    answer=input("请输出答案")
    #666用户用于测试  添加新的测试用户 new+数字编号 逐个网上写 方便删除测试用户
    data={"account":"666","pwd":"666","question":question,"answer":answer}
    #data={"account":"new1","pwd":"new1","question":question,"answer":answer}
    post_result=requests.post(url,data)
    print(post_result.text)
post()