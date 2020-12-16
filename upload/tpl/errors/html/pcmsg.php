<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=L('login_title')?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="robots" content="noindex,nofollow">
		<link rel="stylesheet" href="<?=Web_Path?>packs/layui/css/layui.css">
		<script src="<?=Web_Path?>packs/js/jquery.min.js"></script>
		<script src="<?=Web_Path?>packs/layui/layui.js"></script>
	</head>
	<body>
	</body>
	<script>
		var url = '<?=$url?>';
		if(url=='javascript:history.back();'){
			var icon = 2;
		}else{
			var icon = 1;
		}
		layui.use('layer', function(){
		  	layer.confirm('<div id="msgt" style="margin:20px 0px;position:relative;overflow:hidden"><script>$("#msgt").prev(".layui-layer-ico").css(\'top\', \'36px\');<\/script><?=$title?></div>', {
				btn: ['继续跳转', '返回主页']
				,title:'温馨提示'
				,area: '450px'
				,icon:icon
				,shade:0.01
				,btnAlign: 'c'
			}, function() {
			    location.href = url;
			}, function() {
			    location.href = '<?=is_ssl().Web_Url.Web_Path?>';
			});
			if(url=='javascript:window.close();' ||　url=='close'){
				setTimeout(function (){
					window.opener=null;
					window.open('','_self');
					window.close();
				},2000);
			}else{
				setTimeout(function (){
					location.href = url;
				},<?=$time?>);
			}
		});
	</script>
</html>

