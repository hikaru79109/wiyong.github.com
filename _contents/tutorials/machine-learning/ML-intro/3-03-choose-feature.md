---
youku_id: XMTcwMjM2MzIxMg
youtube_id: 8HlR4TmfV-w
title: 选择好特征 (Good Features)
description: 我们在这次视频中会分享到怎么选择一个好特征, 和好特征意味着什么. 那什么是好的特征, 你怎么知道它的好或坏呢?
chapter: 3
post-headings:
  - 什么是好特征
  - 避免无意义的信息
  - 避免重复性的信息
  - 避免复杂的信息
---

我们在这次视频中会分享到怎么选择一个好特征, 和好特征意味着什么. 
那什么是好的特征, 你怎么知道它的好或坏呢?

**注: 本文不会涉及数学推导. 大家可以在很多其他地方找到优秀的数学推导文章.**

<h4 class="tut-h4-pad" id="{{ page.post-headings[0] }}">{{ page.post-headings[0] }}</h4>

我们在这次视频中会分享到怎么选择一个好特征, 和好特征意味着什么.

<img class="course-image" src="/static/results/ML_intro/feature1.png">

我们用机器学习的分类器作为贯穿这次视频的例子. 分类器只有在你提供了好特征的时候才能发挥最好的效果. 这也意味着找到好特征, 是机器学习能学好最为重要的前提之一. 那什么是好的特征, 你怎么知道它的好或坏呢?

<img class="course-image" src="/static/results/ML_intro/feature2.png">

我们用特征描述一个物体, 比如在A, B两种类型中, 我们有长度, 颜色两种特征属性. 那么在用这些特征描述类别的时候, 好的特征能够让我们更轻松辨别出相应特征所代表的类别. 而不好的特征, 会混乱我们的感官, 带来些没有用的信息, 浪费了我们的分析,计算资源.

<img class="course-image" src="/static/results/ML_intro/feature3.png">

所以, 我们来谈谈我们最喜欢的可爱狗狗. 金毛和吉娃娃. 他们有很多特征可以对比, 比如眼睛颜色, 毛色, 体重, 身高, 长度等等.

<img class="course-image" src="/static/results/ML_intro/feature4.png">

为了简化接下来的问题, 我们主要会需要观察毛色和身高这两组特征属性. 而且我们假设这两种狗只会存在偏黄色和偏白色两种情况. 那么我们先来对比毛色.

<img class="course-image" src="/static/results/ML_intro/feature5.png">

我们看看,这个虚拟世界上有偏黄色和偏白色的金毛各有多少只? 结果发现偏白和偏黄 的金毛都基本上各占一半. 吉娃娃呢?  同样也发现吉娃娃的颜色也是基本上对半分. 那我们把这点用数据的形式展示出来.




<h4 class="tut-h4-pad" id="{{ page.post-headings[1] }}">{{ page.post-headings[1] }}</h4>

<img class="course-image" src="/static/results/ML_intro/feature6.png">

我们假设世界上的金毛和吉娃娃只有两种颜色, 偏黄, 偏白 . 然后我们用蓝色和红色分别代表吉娃娃和金毛所占的比例 . 如果在偏黄这边, 比例是这样  ,就可以说明, 在偏黄的方面, 吉娃娃和金毛所占的比例基本相同, 同样 , 如果偏白色的吉娃娃和金毛数量也基本相同. 这组数据就说明, 如果给你一个毛色是偏黄色的特征, 你是没有办法大概判断这只狗是吉娃娃还是金毛的. 这意味着. 通过毛色来观察这两种品种, 是不恰当的, 这个特征在区分品种上没有起到作用  . 那我们再换一个特征看看, 吉娃娃和金毛能不能用身高来分类呢? 虽然说身高是一些数字, 不过我们同样可以可视化这些身高和分类的关联. 接下来我们使用 python 来进行可视化的操作

<img class="course-image" src="/static/results/ML_intro/feature7.png">

我们先输入 python 中需要的模块, matplotlib 和 numpy. 然后用两个简称定义金毛和吉娃娃, gold 和 chihh, 定义每种狗都有500个样本. 然后开始生成一些身高的数据. 我们假定金毛的平均升高时40cm, 吉娃娃是25cm, 然后因为每只狗不一定都一样高, 所以我们用 normal distribution 给身高加上一个随机数, 金毛的的随机幅度可能大一点, 吉娃娃的随机幅度可能小一点. 最后我们用柱状图来可视化化这些高度数据. 红色代表金毛的高度的个数, 蓝色代表吉娃娃的高度个数.

<img class="course-image" src="/static/results/ML_intro/feature8.png">

我们拿这张图具体说说, 图里面有很多数据, 我们先举一这条来说明  , 可以看出, 在这组数据中, 如果给出高度50cm, 基本上我们就能够判定这只狗是金毛啦, 同样, 大于50cm 的, 都将是金毛. 当我们看到这一条数据 , 我们也可以有相当大的信心说, 在这个高度范围的, 很可能是只吉娃娃, 不过, 当我们再切换到这组数据  , 我们还能不能那么肯定地说这是那种狗呢? 这个高度范围, 因为两种狗都存在, 而且每种狗的数量都差不多, 所以在这个高度区间的狗狗我们就没办法判断. 所以高度是一个很有用的特征, 但是并不完美, 这就是我们为什么需要整合更多的特征来处理机器学习中的问题.

<img class="course-image" src="/static/results/ML_intro/feature9.png">

如果要收集更多的信息, 我们就需要排除掉那些并不具备区分力的信息. 就像我们刚刚我们提到的颜色可能并不是有用的信息, 而高度比较有用. 然后我们还需要更多的信息来弥补高度不能反映出的问题. 比如说,  两种狗能跑多快?   体重是多少?  耳朵长怎样?




<h4 class="tut-h4-pad" id="{{ page.post-headings[2] }}">{{ page.post-headings[2] }}</h4>

<img class="course-image" src="/static/results/ML_intro/feature10.png">

有时候, 我们会有很多特征信息的数据, 可是, 有一些特征, 虽然他们没有重复, 可是意义却是相近的. 比如说在描述距离的时候, 数据里有  里,和公里两种单位. 虽然他们在数字上并不重复, 可是他们实际上都是同一个意思. 虽然机器学习中, 特征越多越好,  但是把这两种特征信息都放入机器学习, 并不会对他有任何帮助. 所以我们要避免重复性的信息




<h4 class="tut-h4-pad" id="{{ page.post-headings[3] }}">{{ page.post-headings[3] }}</h4>

<img class="course-image" src="/static/results/ML_intro/feature11.png">

同样还是这张图片, 如果我想让机器学习预测从 A  走到 B  的时间, 如果我有两种输入特征信息可以选, 一种是 A, B的经纬度,  另一种是 AB间的距离. 虽然这些信息都属于地理位置的信息, 不过让计算机计算经纬度可能会比计算距离麻烦很多. 所以我们在挑选特征信息的时候也要加上这一条,  避免复杂的信息. 因为在特征与结果之间的关系越简单, 机器学习就能越快的学到东西.

所以, 在选择特征的时候,我们得要时刻回想起这三点.  避免无意义的信息,   避免重复性的信息,   避免复杂的信息. 这就是我们这次机器学习简介中所聊到的如何区分好用的特征. 如果你想了解更多简单易懂, 但是又很有用的机器学习小知识, 欢迎订阅我的频道, 留意我的更新. 也欢迎留言与我讨论你在机器学习中遇到的问题 和 你想知道哪些机器学习的知识. 我们下次见~ 拜拜