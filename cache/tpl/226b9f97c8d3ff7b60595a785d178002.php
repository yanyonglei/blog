<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		div{width:600px;height:300px;background: red;position: absolute;top:50%;left: 50%;margin-left: -300px;margin-top: -300px;text-align: center;line-height: 300px;font-size:20px;font-weight: bold;color: #f90;}
		.span1{float:left;width:300px;height:150px;}
		.span2{float: right;width:300px;height:150px;}

	</style>
	<script type="text/javascript">
		window.onload = function()
		{
			var oT = document.getElementById('time');

			var n = <?=$time;?>;

			oT.innerHTML = n+'秒后跳转<a href="<?=$url;?>">立马跳转</a>';
			setInterval(function(){
				n--;
				if (n == 0) {
					window.location.href="<?=$url;?>";
				} else {
					oT.innerHTML = n+'秒后跳转<a href="<?=$url;?>">立马跳转</a>';
				}
				
			},1000);
		
		}
	</script>
</head>
<body>
	<div>
		<span class="span1" id="time">跳转</span>
		<span class="span2"><?=$msg;?></span>
	</div>
</body>
</html>