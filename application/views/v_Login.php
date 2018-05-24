<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js'></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"></link>
	<title>Login</title>
    <style>
    #selectedFiles img {
        max-width: 125px;
        max-height: 125px;
        float: left;
        margin-bottom:10px;
    }
	</style>
</head>
<body class="background-body">
	<div style="background-color: rgba(255,255,255,0.5); overflow: auto; box-shadow: 0 0 8px 0 rgba(0,0,0,0.2); ">
		<div>
			<div class="logo-left">
				<img src="<?php echo base_url(); ?>assets/img/mini.png" class="gb-logo">
			</div>
			<div class="sign-up">
				<button class="butt" id="btn-signup">Sign Up</button>
				<!-- 	 -->
			</div>
		</div>
	</div>
	<div class="signin-header">
			<h1 class="signin-header-text">
				Hello Sign In
			</h1>
	</div>
	
	<div class="flex">
		<div class="text-deskrip ">
			<img src="<?php echo base_url(); ?>assets/img/a2.png" class="logo1">
			<div class="meta-description">
				The right app to share your event with the map based inteface, sell your ticket here and gain more participants
					
			</div>
		</div>
		<div class="bar-image">
			<div class="konten">
				<div class="artikel">
					<form action="#" method="post">
						<div class="grup">
							<label for="email">E-mail Address</label>
							<input type="text" placeholder="Enter your e-mail" id="username">
						</div>
						<div class="grup">
							<label for="password">Password</label>
							<input type="password" placeholder="Enter Your Password" id="password">
						</div>
	
						<div class="grup">
							<input type="submit" value="LogIn" id="login">
						</div>
					</form>
				</div>
			</div>
	
		</div>
	</div>
	</div>

	<!-- <div class="form" align="center">
		<?php echo $map['html']; ?>
		<input class="inputBox" type="text" name="username" id="username"><br>
		<input class="inputBox" type="text" name="password" id="password"><br>
		<button class="button" id="login">login</button><br>

		<button id="tensi">tes tensi</button>

		<a href="<?php echo site_url('c_signup');?>">don't have account? signup</a>
		<a href="<?php echo site_url('c_create_event');?>">create event</a>
	</div> -->
	
	<script type="text/javascript">
		$(function() {
			    // Multiple images preview in browser
			    var imagesPreview = function(input, placeToInsertImagePreview) {

			        if (input.files) {
			            var filesAmount = input.files.length;

			            for (i = 0; i < filesAmount; i++) {
			                var reader = new FileReader();

			                reader.onload = function(event) {
			                	console.log(event.target.result);
			                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
			                }

			                reader.readAsDataURL(input.files[i]);

			            }
			        }

			    };

			    $('#gallery-photo-add').on('change', function() {
			        imagesPreview(this, 'div.gallery');
			    });
			});
    
		//when login button clicked
		$(document).ready(function(){

			$("#login").click(function(){
				var username = $('#username').val();
				var password = $('#password').val();
				
				if(username || password){
					$.ajax({
						type : "POST",
						url : "<?php echo site_url('c_login/login_proses'); ?>",
						data : {'username' : username, 'password' : password},
						dataType : 'json',
						success : function(res){
							if(res=="ok"){
								window.location.replace("<?php echo site_url('c_dashboard'); ?>");
							}
							else{
								alert("Incorect Username or Password!");
							}
							
						},
						error : function(err){
							alert("username atau password salah");
						}
					});
				}
				else{
					alert("pastikan semua data terisi");
				}
			});

			$("#tensi").click(function(){
				var rate = Math.floor((Math.random() * 100) + 1);
				//alert(sistol+"/"+diastol);
					$.ajax({
						type : "POST",
						url : "<?php echo site_url('c_login/catatTensi'); ?>",
						data : {'rate' : rate},
						dataType : 'json',
						success : function(res){
							//alert(res);
						},
						error : function(err){
							alert("username atau password salah");
						}
					});
				
			});
			$("#btn-signup").click(function(){
				document.location.href = "<?php echo site_url('c_signup');?>";
			});
		});
	</script>
</body>
</html>