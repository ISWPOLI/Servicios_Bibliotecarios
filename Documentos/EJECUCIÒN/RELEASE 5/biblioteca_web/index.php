<?php
	session_start();
		
	# VALIDACIÓN DE DATOS PARA LOGIN
	if(	isset($_POST['username']) && isset($_POST['password'])){
		include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/login.php");
	}	
	
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>BiblioGame</title>
<link rel="stylesheet" href="php/css/style.default.css" type="text/css" />
<script type="text/javascript" src="php/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="php/js/jquery-migrate-1.1.1.min.js"></script>
</head>

<body class="loginbody">

<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span> LOGIN <span class="subtitle">Inicia sesión para ingresar.</span></h1>
        <div class="loginwrapperinner">
            <form id="loginform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" value="" placeholder="Codigo" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Contraseña" value="" /></p>
                <input type="hidden" id="validar" name="validar" value="rdt">
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block">INGRESAR</button></p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.loginwrap').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	
	jQuery('#username,#password').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	jQuery('#loginform button').click(function(){
		if(!jQuery.browser.msie) {
			if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
				if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
				if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
				jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
			} else {
				jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
					jQuery('#loginform').submit();
				});
			}
			return false;
		}
	});
});

</script>
</body>
</html>
