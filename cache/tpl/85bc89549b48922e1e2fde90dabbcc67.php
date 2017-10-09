<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人博客模板古典系列之——江南墨卷</title>
<meta name="keywords" content="个人博客模板古典系列之——江南墨卷" />
<meta name="description" content="个人博客模板古典系列之——江南墨卷" />
<link href="public/css/base.css" rel="stylesheet" type="text/css">
<link href="public/css/main.css" rel="stylesheet" type="text/css">
<link href="public/css/diary.css" rel="stylesheet" type="text/css">
<link href="public/css/tec.css" rel="stylesheet" type="text/css">

<!-- <link href="public/css/main_index.css" rel="stylesheet" type="text/css">
 -->
<script type="text/javascript" src="public/ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="public/js/jquery.js"></script>
</head>
<body>
 <div  class="top">
    <!-- <div class="f_r clearFix">
      <span><a href="index.php?m=user&a=register">注册</a></span>&nbsp;&nbsp; <span><a href="index.php?m=user&a=login">登录</a></span>
    </div>   -->
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
      <!-- <div class="search f_r">
        <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
          <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
          <input name="show" value="title" type="hidden">
          <input name="tempid" value="1" type="hidden">
          <input name="tbname" value="news" type="hidden">
          <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
      </div> -->
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
      <h2 class="nh1"><span>您现在的位置是：<a href="/" target="_blank">网站首页</a>>><a href="#" target="_blank">技术文章</a></span><b>技术文章</b></h2>
  </div>

    <form action="index.php?m=technique&a=save" method="post" enctype="multipart/form-data">

     <div class="biaoti"> 
          <b>文章标题</b><input type="text"  placeholder="输入日记的标题" name="title" />
     </div>

     <div class="biaoti">
        <b>选择板块</b>
            <select name="classname">
              <option value="PHP" checked>PHP</option>
              <option value="HTML">HTML</option>
              <option value="JAVA">JAVA</option>
              <option value="CSS">CSS</option>
              <option value="JavaScript">JavaScript</option>
              <option value="C#">C#</option>
              <option value="C++">C++</option>
              <option value="PYTHON">PYTHON</option>
        </select>
      </div>
      <br />  
      <textarea name="info" class="ckeditor" id="TextAreal"  ></textarea>
      <br/>
      <input  class="save" type="submit" value="发表文章">

    </form>

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