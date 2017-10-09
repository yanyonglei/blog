<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<link href="public/css/base.css" rel="stylesheet" type="text/css">
<link href="public/css/main.css" rel="stylesheet" type="text/css">
<link href="public/css/main_index.css" rel="stylesheet" type="text/css">


<link href="public/css/diary.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="public/css/calendar.css">
<script type="text/javascript" src="public/js/jquery.js"></script>
</head>
<body>
<div id="wrapper">

  <header>
    <div class="headtop"></div>
    <div class="contenttop">
      <?php if(empty($userInfo)): ?>
      <div class="logo f_l">Welcome to My Blog</div>
      <?php else : ?>
      <div class="logo f_l">Welcome to <?=$userInfo['username'];?>’s Blog</div>
      <?php endif;?>
      <div class="blank"></div>
      <nav>
        <div  class="navigation">
          <ul class="menu">
            <li><a href="index.php">网站首页</a></li>
            <li><a href="index.php?m=mainIndex&a=analyze">关于我</a>
              <ul>
                <li><a href="index.php?m=about&a=show">个人简介</a></li>
                <li><a href="index.php?m=list&a=pictureList" >个人相册</a></li>
              </ul>
            </li>
            <li><a href="#">我的日记</a>
              <ul>
                <li><a href="index.php?m=diary&a=show">个人日记</a></li>
                <li><a href="index.php?m=note&a=show">学习笔记</a></li>
              </ul>
            </li>
            <li><a href="index.php?m=technique&a=show">技术文章</a> </li>
            <li><a href="index.php?m=liuyan&a=show">给我留言</a> </li>
            <li><a href="index.php?m=wangyi&a=show">网易新闻</a></li>
          </ul>
        </div>
      </nav>
      <SCRIPT type=text/javascript>
	// Navigation Menu
	$(function() {
		$(".menu ul").css({display: "none"}); // Opera Fix
		$(".menu li").hover(function(){  
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown("normal");
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	});
</SCRIPT> 
    </div>
  </header>
  <div class="jztop"></div>
  <div class="container">
  	<?php if(empty($arrNews)): ?>
    <div class="bloglist f_l">
      <h3><a href="">【模板】你不知道的技术</a></h3>
      <figure><img src="public/images/php.jpg"></figure>
      <ul>
        <p>  <cite style="font-size:15px; color:#aa1100 ">评语dist</cite></p>
          <a href="" target="_blank" class="readmore">查看全部&gt;&gt;</a>
      </ul>
      <p class="dateview"><span>时间:2017-07-13</span><span>作者：</span><span>来源:[PHP]</span><span></span>
      </p>
      <hr style="border: 2px dashed  #aabbcc"/>
    </div>
    <?php else : ?>
    	<?php foreach($arrNews as $key=>$val) :?>
			<div class="bloglist f_l">
	      <h3><a href=""><?=$val['title'];?></a></h3>
	      <figure><img src="<?=$val['imgsrc'];?>"></figure>
	      <ul>
	        <p>  <cite style="font-size:15px; color:#aa1100 "><?=$val['digest'];?></cite></p>
	        	<?php if(isset($val['url'])): ?>
	         	 <a href="<?=$val['url'];?>" target="_blank" class="readmore">查看全部&gt;&gt;</a>
	            <?php endif;?>
	      </ul>
	      <p class="dateview"><span>时间:<?=$val['ptime'];?></span><span>来源:[<?=$val['source'];?>]</span>
	      <?php if(isset($val['votecount'])): ?>
	      <span>浏览量:[<?=$val['votecount'];?>]</span>
	      <?php endif;?>
	      <?php if(isset($val['replyCount'])): ?>
	      	<span>回复量:[<?=$val['replyCount'];?>]</span>
	      <?php endif;?>

	      </p>
	      <hr style="border: 2px dashed  #aabbcc"/>
	    </div>

    	<?php endforeach;?>
    <?php endif;?>
     
 
      <!-- <div class="pagelist">页次：<?=$currentPage;?>/<?=$countPage;?> 每页<?=$page;?> 总数<?=$countPage;?><a href="<?=$render['first'];?>">首页</a><a href="<?=$render['prev'];?>">上一页</a><a href="<?=$render['next'];?>">下一页</a><a href="<?=$render['last'];?>">尾页</a>
      </div>
       -->

      <div  class="right">

          <div id="calendar" class="calendar"></div>

          <script src="public/js/jquery.min.js"></script>
          <script src="public/js/calendar.js"></script>
            
          <div style="text-align:center;clear:both">
          <script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
          <script src="/follow.js" type="text/javascript"></script>
          </div>


      </div>

   <!--  <div c·lass="r_box f_r">
     <div class="ad"> <img src="public/images/03.jpg"> </div>
   </div>
    -->

  </div>
  <!-- container代码 结束 -->

  <footer>
    <div class="footer">
      <div class="f_l">
        <p>All Rights Reserved 版权所有：<a href="http://www.yangqq.com">杨青个人博客</a> 备案号：蜀ICP备00000000号</p>
      </div>
      <div class="f_r textr">
        <p>Design by DanceSmile</p>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
