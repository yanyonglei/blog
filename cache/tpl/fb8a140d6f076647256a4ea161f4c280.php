<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<meta name="keywords" content="个人博客模板古典系列之——江南墨卷" />
<meta name="description" content="个人博客模板古典系列之——江南墨卷" />
<link href="public/css/base.css" rel="stylesheet">
<link href="public/css/main.css" rel="stylesheet">

<!-- <link href="public/css/main_index.css" rel="stylesheet" type="text/css"> -->

<script type="text/javascript" src="public/ckeditor/ckeditor.js" ></script>
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
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
        <h2 class="nh1"><span>您现在的位置是：<a href="/" target="_blank">网站首页</a>>><a href="#" target="_blank">信息浏览</a></span><b>个人简介</b></h2>
        <div class="f_box">
          <p class="a_title">个人简介</p>
          <p class="p_title"></p>
         
        </div>
        <?php if(!empty($currentUser)): ?>
        <ul class="about_content">
          <p>
          <?=$currentUser['content'];?> <!-- 人生就是一个得与失的过程，而我却是一个幸运者，得到的永远比失去的多。生活的压力迫使我放弃了轻松的前台接待，放弃了体面的编辑，换来虽有些蓬头垢面的工作，但是我仍然很享受那些熬得只剩下黑眼圈的日子，因为我在学习使用Photoshop、Flash、Dreamweaver、ASP、PHP、JSP...中激发了兴趣，然后越走越远.... --></p>
          <p><img src="<?=$currentUser['path'];?>"></p>
          <p>“冥冥中该来则来，无处可逃”。 </p>
        </ul>

       

        <div style="font-size:18px;font-weight:bold;color:#0A0606; ">编辑个人信息</div>
        <Hr  style="border:2px dashed #cdcdcd" />
        <form method="post" action="index.php?m=about&a=show" enctype="multipart/form-data">
         <b> 性别</b><select name="sex" style="width:80px; height:30px; font-size:16px;">


            <?php if($currentUser['sex']=="男"): ?>
            <option  selected  value="男">男</option>
            <?php else : ?>
            <option  value="男">男</option>
            <?php endif;?>

            <?php if($currentUser['sex']=="女" ): ?>
            <option  selected value="女">女</option>
            <?php else : ?>
            <option  value="女">女</option>
            <?php endif;?>


            <?php if($currentUser['sex']=="保密" ): ?>
            <option  selected value="保密">保密</option>
            <?php else : ?>
            <option  value="保密">保密</option>
            <?php endif;?>
          </select><br/>
          <?php endif;?>

          <label style="font-size: 15px;">密码</label></label><input type="password" name="password" placeholder="输入修改的密码**********" style="width: 300px;height: 30px; font-size:15px;"><br/>

          <input type="file" name="file"/><b>上传图片</b>
           <br /> 
          <textarea name="info" class="ckeditor" id="TextAreal" ></textarea>
          <br/>
         
          <br/>
          <input style="width: 70px;height: 30px; font-size:15px;" class="save" type="submit"  value="修改信息">
        </form>
       </div>
      
      </div>
    </div>
    <div class="blank"></div>
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
