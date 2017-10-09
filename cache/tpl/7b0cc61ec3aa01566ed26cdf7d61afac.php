<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="public/css/pintuer.css">
    <link rel="stylesheet" href="public/css/admin.css">
    <script src="public/js/jquery.js"></script>
    <script src="public/js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="index.php?m=adminuser&a=show">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">用户管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <input type="submit" class="button border-red" value="删除" /><span class="icon-trash-o"></span>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th> 
        <th>性别</th>   
        <th>个人简介</th>   
        <th>头像图片路径</th>
       
        <th width="120">注册时间</th>   
       </tr>  
       <?php if(!empty($resUserInfo)): ?>
       <?php foreach($resUserInfo as $key =>$val) :?>    
        <tr>
          <td>
            <?php if($val['username']=='admin'): ?>
            <?=$val['id'];?>
            <?php else : ?>
          	<input type="checkbox" name="id[]" value="<?=$val['id'];?>" /><?=$val['id'];?>
            <?php endif;?>
            </td> 
          <td><?=$val['username'];?></td>
          <td><?=$val['sex'];?></td>
          <td><?=$val['content'];?></td>
          <td><?=$val['path'];?></td>  
        
          <td><?php echo date('Y-m-d H:i:s',$val['rtime']);;?></td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
      <tr>
        <td colspan="8"><div class="pagelist"><a href="<?=$render['first'];?>">首页</a><a>共 <?=$countPage;?>页</a><a>每页 <?=$page;?>条</a> <a href="<?=$render['prev'];?>">上一页</a><a>当前第<?=$currentPage;?>页</a> <a href="<?=$render['next'];?>">下一页</a><a href="<?=$render['last'];?>">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>