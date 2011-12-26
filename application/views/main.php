<?php

$url = form_input(array(
		'type'=>'text',
		'name'=>'url',
		'id'=>'url',
		'value'=>'',
		'size'=>'50',
		'placeholder'=>'http://yourlink.here',
	));

echo'<?xml version="1.0" encoding="UTF-8" ?>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.zclip.js');?>"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style.css');?>" />
	<style type="text/css">#content{display:none}</style>
	<title>Urlly - The Urlly bird gets the worm.</title>
</head>
<body>
<div id="container">
	<div id="logo">
		<a href="<?php echo site_url();?>" title="Go back to Urlly homepage">
			<img src="<?php echo base_url('/assets/images/logo.png');?>" alt="Urlly"/>
		</a>
	</div>
	<div id="form">
		<?php echo form_open('main/',array('id'=>'form'));?>
			<p><?php echo $url; ?></p>
		<?php echo form_close();?>
	</div>
	<div id="content"></div>
</div>
<script type="text/javascript">
$(function()
{
	var testTextBox = $('#url');
	var code = null;
	testTextBox.keypress(function(e)
	{
		code= (e.keyCode ? e.keyCode : e.which);
		if (code == 13) 
		{
			var long_url = testTextBox.val().length;
			
			$.ajax({
				type: "POST",
				url: "<?php echo site_url();?>/home/new_url/",
				data: "url="+$('#url').val()
			}).done(function( url ) {
				$('#content')
					.fadeOut(100)
					.empty()
					.append('<div id="fade">http:\/\/'+url+'</div>')
					.fadeIn(500, function(){
						var short_url = $('#content').text().length;
						if(long_url < short_url)
						{
							$('#content').append('<div id="fade">Notice: The URL you\'re trying to shorten is actually '+(short_url-long_url)+' characters shorter than it will be made by Urlly.');
						}
					});
			});			
		}
	});
});
$('#form').submit(function() {
	return false;
});

</script>
</body>
</html>