<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>In Map See oround yours</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js'></script>
	<script src='<?php echo base_url(); ?>assets/js/jquery-ui-1.10.0.custom.min.js'></script>
	<!--styles -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"></link>
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>swiper-4.1.6/dist/css/swiper.min.css">
	<?php 
	echo $map['js'];
	?>
</head>
<body class="background-dashboard">
	<ul>
		<li>
			<a class="activ" href="#Home">Home</a>
		</li>
		<li>
			<a class="activ" href="#Notif">Notification</a>
		</li>
		<li>
			<a class="activ" href="#c_event" id="btn-create-event">Create Event</a>
		</li>
	</ul>
	<div class="btn-grup">
		<button class="logo-button"></button>
		<div class="dropdown-content">
			<a href="#">Profil</a>
			<a href="#" id="my-event">My Event</a>
			<a href="#">Log out</a>
		</div>
	</div>
	
	
	<div class="kategori">
		<!-- <img src="<?php echo base_url();?>assets/img/slider.jpg" class="swiper"> -->
		<!-- event image -->
		<div class="swiper">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div id="slide1" class="swiper-slide" style="background-image:url('<?php echo base_url(); ?>assets/img/event1.jpg')">
							<!-- style="background-image:url('<?php echo base_url(); ?>assets/img/event2.jpg')" -->
						</div>
						<div id="slide2" class="swiper-slide" style="background-image:url('<?php echo base_url(); ?>assets/img/event2.jpg')">

						</div> -->
						<!-- Add Pagination -->
						<div class="swiper-pagination swiper-pagination-white"></div>
						<!-- Add Arrows -->
						<div class="swiper-button-next swiper-button-white"></div>
						<div class="swiper-button-prev swiper-button-white"></div>
					</div>
				</div>
			</div>
	<div class="map" style="margin-top : 350px;">
		<?php 
			echo $map['html'];
		?>
		<input type="hidden" id="latitude">
		<input type="hidden" id="longitude">
	</div>
	</div>
	<script>
		// var swiper = new Swiper('.swiper-container', {
		// 	spaceBetween: 30,
		// 	effect: 'fade',
		// 	pagination: {
		// 		el: '.swiper-pagination',
		// 		clickable: true,
		// 	},
		// 	navigation: {
		// 		nextEl: '.swiper-button-next',
		// 		prevEl: '.swiper-button-prev',
		// 	},
		// });
		$(document).ready(function(){
			$("#btn-create-event").click(function(){
				document.location.href = "<?php echo site_url('c_create_event');?>";
			});

			$("#my-event").click(function(){
				document.location.href = "<?php echo site_url('c_my_event');?>";
			});
		});
	</script>
</body>
</html>