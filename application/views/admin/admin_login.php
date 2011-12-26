<?php

$username = form_input(array(
		'type'=>'text',
		'name'=>'username',
		'id'=>'username',
		'value'=>'',
		'size'=>'50',
		'placeholder'=>'username...',
	));
$password = form_input(array(
		'type'=>'password',
		'name'=>'password',
		'id'=>'password',
		'value'=>'',
		'size'=>'50',
		'placeholder'=>'password...',
	));
$submit = form_submit(array(
		'name'=>'submit',
		'id'=>'submit',
		'value'=>'Login',
	));

echo'<?xml version="1.0" encoding="UTF-8" ?>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style.css');?>" />
	<title>Urlly - The Urlly bird gets the worm.</title>
</head>
<body>
<div id="container">
	<div id="logo">
		<a href="<?php echo site_url();?>" title="Go back to Urlly homepage">
			<img src="<?php echo base_url('/assets/images/logo.png');?>" alt="Urlly"/>
		</a>
	</div>
	<div id="login">
		<?php echo form_open('admin/login/',array('id'=>'login_form'));?>
			<p><?php echo $username; ?></p>
			<p><?php echo $password; ?></p>
			<p><?php echo $submit;   ?></p>
		<?php echo form_close();?>
	</div>
	<div id="content"></div>
</div>
<script type="text/javascript">
$('#submit').click(function(){
	var username = $('#username').val();
	var password = $('#password').val();
	/*$.ajax({
		type: "POST",
		url: "<?php echo site_url();?>/admin/login/",
		data: "username="+username+"&password="+password
	}).done(function( result ) {
		if(result == '1')
		{
			window.location.href='<?php echo site_url();?>/admin/config/';
		}
	});
	return false;*/
});
</script>
</body>
</html>