<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Projeto - Teste</title>
		<link href="{$urlbase}public/css/style.css" type="text/css" rel="stylesheet" />
		<link href="{$urlbase}public/css/main.css" type="text/css" rel="stylesheet" />
		
	</head>
	<body>
		<div class="total">
			<div class="container_12 clearfix">{include file=defult/common_menu.tpl} {include file=defult/main_login.tpl}</div>
		</div>
		<div class="total">
			<div id="main_home" class="container_12 clearfix">{include file=defult/main_home.tpl}</div>
		</div>
		<div class="total">
			<div id="vicinity"class="container_12 clearfix">{include file=defult/main_vicinity.tpl}</div>
		</div>
		<div class="footer_100">
			<div id="footer" class="container_12 clearfix">{include file=defult/footer.tpl}</div>
		</div>
	</body>
</html>