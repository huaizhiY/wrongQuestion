###接口文档

#### addwq.php

**发送方式不做限制**

>改接口必填参数有三个;</br>
>*title* => 问题标题;字符串类型</br> 
>*details* => 问题详情; </br>
>*idea* => 问题解析;</br>

>返回值为 
>0 失败;
>1 成功;


#### showlist.php

**数据返回接口**

>返回json数据 => </br>
>数据类型如下 :   </br>
>{"details":[{"wq_id":"1","wq_title":"你好","wq_details":"world","wq_idea":"123","submission_date":"2018-01-30"},{"wq_id":"2","wq_title":"你好","wq_details":"world","wq_idea":"123","submission_date":"2018-01-30"}]}