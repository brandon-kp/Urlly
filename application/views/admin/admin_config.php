<?php 
$show_ads_input = form_checkbox(array(
	'name'=>'show_ads',
	'onclick'=>"this.checked ? this.value='1' : this.value='0';",
	'id'=>'show_ads',
));
$allow_dupes_input = form_checkbox(array(
	'name'=>'show_ads',
	'onclick'=>"this.checked ? this.value='1' : this.value='0';",
	'id'=>'allow_dupes',
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
	<div id="config">
		<?php echo form_open('admin/config/',array('id'=>'config_form'));?>
		<ul>
			<li class="even"><label for="blacklist">URL Blacklist <span>Seperate with a comma</span></label>
			<textarea name="blacklist" id="blacklist"><?=$blacklist;?></textarea></li>
			
			<li class="even"><label for="url_length">Characters in short URLs:</label>
			<select name="url_length"><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option></select></li>
			
			<li class="even"><label for="show_ads">Show Advertisements?</label>
			<?=$show_ads_input;?></li>
			
			<li class="even"><label for="allow_dupes">Allow Duplicate URLs?</label>
			<?=$allow_dupes_input;?></li>

			<li class="even"><input type="submit" name="submit" id="submit" value="update" />
		</ul>
		<div id="result"><img src="<?php echo base_url("/assets/images/ajax-loader.gif");?>" alt="Loading..." /></div>
		<div id="success">Urlly's settings have been updated. :)</div>
		<?php echo form_close();?>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	//if this is empty it's because I am stupid and wracked my brain 
	//basically trying to figure out why X wasn't == 'Y' and just don't 
	//care about making this cleaner right now 
	<?php if($show_ads == '1'):?>$('#show_ads').attr('checked','true');<?php endif; ?>
	<?php if($allow_dupes == '1'):?>$('#allow_dupes').attr('checked','true');<?php endif; ?>

});

$('#submit').click(function(){
	$('#result').fadeIn(1000);
	var data = $('#config_form').serialize();
	
	$.ajax({
		type: "POST",
		url: "<?php echo site_url();?>/admin/config/",
		data: data
	}).done(function( result ) {
		if(result == '1') {
			$('#result').fadeOut(200,function(){
				$('#success').fadeIn(500).delay(50000).fadeOut(10000);
			});
		}
	});
	return false;
});
</script>
</body>
</html>