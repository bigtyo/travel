

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Inti Buana Travel Agent Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/themes.css">


	<!-- jQuery -->
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="<?php echo base_url();?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="<?php echo base_url();?>js/plugins/validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo base_url();?>js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/eakroko.js"></script>
        
        <?php foreach ($scripts as $script) { ?>
        <script src="<?php echo base_url()."js/".$script; ?>.js"></script>
        
        <?php }?>
	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

<body class='login theme-orange'>
	<div class="wrapper">
		<h1><a href="index.html"><img src="img/logo-big.png" alt="" class='retina-ready' width="59" height="49">Agent Login</a></h1>
                
		<div class="login-body">
			<h2>SIGN IN</h2>
			<form action="login/signin" method='post' class='form-validate' id="test">
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='username' id="userid" placeholder="Username" class='input-block-level' data-rule-required="true" >
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="password" id="password" placeholder="Password" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
					</div>
                                    <input type="submit"  value="Sign Me In" class='btn btn-primary'/>
<!--                                    <a href="#" style="float: right" id="btnLogin"><span class='btn btn-primary'>Sign Me In</span>-->
				</div>
                            <?php if(isset($success)){
                                if(!$success)
                                {?>
                                    <span>Login gagal : user / password tidak dikenali</span>

                                <?php }
                            } ?>
			</form>
			<div class="forget">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
</body>

</html>


