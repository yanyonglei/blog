<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<meta name="keywords" content="个人博客模板古典系列之――江南墨卷" />
<meta name="description" content="个人博客模板古典系列之――江南墨卷" />
<link href="public/css/base.css" rel="stylesheet" type="text/css">
<link href="public/css/main.css" rel="stylesheet" type="text/css">
<!--  <link href="public/css/main_index.css" rel="stylesheet" type="text/css">
--><script type="text/javascript" src="public/js/jquery.js"></script>
</head>
<body>
 <div  class="top">
 <!--    <div class="f_r clearFix">
   <span><a href="index.php?m=user&a=register">注册</a></span>&nbsp;&nbsp; <span><a href="index.php?m=user&a=login">登录</a></span>
 </div>  -->
   </div> 
<div id="wrapper">

  <header>
    <div class="headtop"></div>
    <div class="contenttop">
      <?php if(empty($userInfo)): ?>
      <div class="logo f_l">Welcome to My Blog</div>
      <?php else : ?>
      <div class="logo f_l">Welcome to <?=$userInfo['username'];?>’s Blog</div>
      <?php endif;?>
      <div class="search f_r">
        <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
          <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
          <input name="show" value="title" type="hidden">
          <input name="tempid" value="1" type="hidden">
          <input name="tbname" value="news" type="hidden">
          <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
      </div>
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
<div class="container">
  <div class="con_content">
    <div class="about_box">
      <h2 class="nh1"><span>您现在的位置是：<a href="/" target="_blank">网站首页</a>>><a href="#" target="_blank">个人相册</a></span><b>个人相册</b></h2>
      <div class="lispic">
        <ul>
          <?php if(empty($resPic)): ?>
                  <li><a href="/"><img src="public/images/01.jpg"><span>图片展示</span></a></li>
                  <li><a href="/"><img src="public/images/02.jpg"><span>图片展示</span></a></li>
                 <li><a href="/"><img src="public/images/03.jpg"><span>图片展示</span></a></li>
                 <li><a href="/"><img src="public/images/04.jpg"><span>图片展示</span></a></li>
                 <li><a href="/"><img src="public/images/03.jpg"><span>图片展示</span></a></li>
                 <li><a href="/"><img src="public/images/06.jpg"><span>图片展示</span></a></li>
                 <li><a href="/"><img src="public/images/01.jpg"><span>图片展示</span></a></li>
                 <li><a href="/"><img src="public/images/02.jpg"><span>图片展示</span></a></li> 
          <?php else : ?>
            <?php foreach($resPic as $key =>$val) :?>
          <li><a href="/"><img src="<?=$val['path'];?>"><span><?php echo date('Y-m-d H:i:s',$val['time']);;?></span></a></li>
            <?php endforeach;?>
          <?php endif;?>
        </ul>
      </div>
      <form action="index.php?m=file&a=upPic" method="post" enctype="multipart/form-data">
        <input  type="file" name="file"/><br/>
        <input type="submit" value="图片上传">
      </form>
    
      <div class="pagelist">页次：<?=$currentPage;?>/<?=$countPage;?> 每页<?=$page;?> 总数<?=$countPage;?><a href="<?=$render['first'];?>">首页</a><a href="<?=$render['prev'];?>">上一页</a><a href="<?=$render['next'];?>">下一页</a><a href="<?=$render['last'];?>">尾页</a>
      </div>

    </div>
    
  </div>
  <div class="blank"></div>
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