import json
import requests
import urllib.request as ur
import urllib.parse as up
import time

print("每日一句审核工具(Version - 0.2)内部版本。Powered By ToysWorld&Little SandBox Studio。timestamp->"+str(time.time()))
#向网页get数据
response = requests.get("http://mryj.biu8.top/php/get_posted_juzi.php")
tmp_result=response.text
#先判断有没有句子要审核
print(tmp_result)
if tmp_result=="暂时没有需要审核的句子[]":
    print("没有句子要审核")
#需要审核
else:
    geted_data_array = response.json()
    sentences = [] #句子数组
    sentences_status = [] #状态数组
    user_names=[]#用户数组
    #循环读取句子
    for i in range(0,len(geted_data_array)):
        sentences.append(geted_data_array[i]['juzi']) #塞到句子列表里头
        sentences_status.append(geted_data_array[i]['state'])
        #调试
        print(geted_data_array)
        user_names.append(geted_data_array[i]['user'])
        #print(sentences,sentences_status)

    #审核句子
    for i in range(0,len(geted_data_array)):
        print(f"当前已审核{i}个句子，还剩{len(geted_data_array)-i}个句子")
        print(f"请问句子:{sentences[i]}是否可以通过？(Y/N)：")
        state = input("")
        if (state == "Y"):
            print(f"{sentences[i]}已经通过！\n")
            #具体方法...
            path = "http://mryj.biu8.top/php/shenhe.php"
            data ={"status":1,"user":user_names[i],"juzi":sentences[i],"key":"fu96diflza"}
            headers = {'Content-Type': 'application/json'}
            #data = up.urlencode(data).encode('UTF-8')
            #response = requests.post(path,data=json.dumps(data),headers=headers)
            response = requests.post(path,data)
            html = response.text
            print(html)
        else:
            print(f"{sentences[i]}不能通过... \n")
            #具体方法...
            path = "http://mryj.biu8.top/php/shenhe.php"
            data ={"status":0,"user":user_names[i],"juzi":sentences[i],"key":"fu96diflza"}
            headers = {'Content-Type': 'application/json'}
            #data = up.urlencode(data).encode('UTF-8')
            #response = requests.post(path,data=json.dumps(data),headers=headers)
            response = requests.post(path,data)
            html = response.text
            print(html)
print("审核完毕，感谢使用！")
