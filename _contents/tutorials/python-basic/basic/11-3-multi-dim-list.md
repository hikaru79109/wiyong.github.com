---
youku_id: XMTU4NzMxNDI5Ng
youtube_id: N1FlO-JNiPY
description: 
chapter: 11
title: 多维列表
date: 2016-11-3
comments: true
author: Hao
post-headings:
  - 创建二维列表
  - 索引
---
{% assign post-heading-count = -1 %}


{% assign post-heading-count = post-heading-count | plus: 1 %}
<h4 class="tut-h4-pad" id="{{ page.post-headings[post-heading-count] }}">{{ page.post-headings[post-heading-count] }}</h4>

一个一维的List是线性的List，多维List是一个平面的List：

```python
a = [1,2,3,4,5] # 一行五列

multi_dim_a = [[1,2,3],
			   [2,3,4],
			   [3,4,5]] # 三行三列
```


{% assign post-heading-count = post-heading-count | plus: 1 %}
<h4 class="tut-h4-pad" id="{{ page.post-headings[post-heading-count] }}">{{ page.post-headings[post-heading-count] }}</h4>

在上面定义的List中进行搜索：

```python
print(a[1])
# 2

print(multi_dim_a[0][1])
# 2
```

用行数和列数来定位list中的值。这里用的是二维的列表，但可以有更多的维度。


