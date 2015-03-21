<style>
	.main_title_bar { width: 900px; position: absolute; left: 50%; margin-left: -450px; height: 199px; }
	.main_link_box { width: 857px; position: absolute; height: 558px; left: 50%; margin-left: -423px; position: relative; top: 199px; }
	.main_button { width: 193px; height: 558px; cursor: pointer; position: absolute; top: 0; -webkit-transition: top 0.3s; -moz-transition: top 0.3s; transition: top 0.3s; display: block; }
	.main_link_box_margin { height: 757px; clear: both; }
	.main_button_hover { top: -30px; }
	
</style>
<div class="main_title_bar">
	<img src="../images/logo.png" alt="">
</div>
<div class="main_link_box">
	<a class="main_button" style="left: 0; background-image: url('../images/tournaments.png');" href="<?php echo base_url('tournaments'); ?>">
		<div class="main_button_overlay"></div>
	</a>
	<a class="main_button" style="left: 165px; background-image: url('../images/ranking.png');" href="<?php echo base_url(''); ?>">
		<div class="main_button_overlay"></div>
	</a>
	<a class="main_button" style="left: 330px; background-image: url('../images/players.png');" href="<?php echo base_url(''); ?>">
		<div class="main_button_overlay"></div>
	</a>
	<a class="main_button" style="left: 495px; background-image: url('../images/guides.png');" href="<?php echo base_url(''); ?>">
		<div class="main_button_overlay"></div>
	</a>
	<a class="main_button" style="left: 660px; background-image: url('../images/tym.png');" href="<?php echo base_url(''); ?>">
		<div class="main_button_overlay"></div>
	</a>
</div>
<div class="main_link_box_margin"></div>
<script type="text/javascript">
$(document).ready(function(){
	$(".main_button").hover(function(){
		var myself = $(this);
		myself.children(".main_button_overlay").css("display","block").fadeOut(300);
		myself.addClass("main_button_hover");
	}, function(){
		$(this).removeClass("main_button_hover");
	});
});
</script>