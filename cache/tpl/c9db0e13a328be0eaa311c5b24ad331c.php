<!DOCTYPE HTML>
<html>
	<head>
	<title>搜索</title>
	<link rel="stylesheet" type="text/css"   href="public/css/styles.css" />
	</head>
	<body >
	<div class="search" style="margin-top: 50px;">
		<font style="font-size:20px;color:#cdcdcd;font-weight: bold;">技术文章搜索</font>
		<div class="s-bar">

		   <form action="index.php?m=search&a=show" method="post">
			<input type="text" name="content" placeholder="输入搜索的技术文章内容" >
			<input type="submit" name="submit"  value="搜索"/>
		  </form>


		</div>
		<p>Search Results: <br /></p>
		 <?php if(!empty($result)): ?>
		<?php foreach($result as $key => $value) :?>
		<p><?=$value['tid'];?>:<?=$value['title'];?></p>
		<p style="display: block; width: 1000px; height:50px; margin: 0 auto; overflow: hidden;"><?=$value['content'];?></p><br/>
		<?php endforeach;?>
		<?php endif;?> 
	</div>

	</body>
</html>