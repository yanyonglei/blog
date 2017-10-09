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
<form method="post" action="index.php?m=techrecycle&a=show">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <input type="submit" class="button border-red" name="nodel" value="还原"><span class="icon-trash-o"></span>
          <input type="submit" class="button border-red" name="del" value="删除"><span class="icon-trash-o"></span>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th> 
        <th>板块</th>
        <th>标题</th>          
        <th width="25%">内容</th>
         <th width="120">发表时间</th> 
      </tr>    

        <?php if(!empty($resTechnique)): ?>
        <?php foreach($resTechnique as $key =>$val) :?>
        <tr>
          <td><input type="checkbox" name="id[]" value="<?=$val['tid'];?>" />
            <?=$val['id'];?></td>
          <td><?=$val['username'];?></td> 
          <td><?=$val['classname'];?> </td>
          <td><?=$val['title'];?></td>
          <td><?=$val['content'];?></td>
          <td><?php echo date('Y-m-d H:i:s',$val['ttime']);?></td>
        </tr>
        <?php endforeach;?>
      <?php endif;?>

   <tr>
     <td colspan="8"><div class="pagelist"><a href="<?=$render['first'];?>">首页</a><a>共 <?=$countPage;?>页</a><a>每页 <?=$page;?>条</a> <a href="<?=$render['prev'];?>">上一页</a><a>当前第<?=$currentPage;?>页</a> <a href="<?=$render['next'];?>">下一页</a><a href="<?=$render['last'];?>">尾页</a> </div></td>
   </tr>


    </table>
  </div>
</form>
</body>
</html>