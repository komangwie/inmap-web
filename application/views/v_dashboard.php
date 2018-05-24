<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Create Event</title>

	<script src='<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js'></script>
	<!--styles -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
	<!-- link fontawesome css from CDN -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>swiper-4.1.6/dist/css/swiper.min.css"></link>
	<style type="text/css">
		.header-image{
			margin-top: -60px;
			width: 100%;
			height: 500px;
			background: url('<?php echo base_url(); ?>assets/img/header_bck.png') no-repeat;
			background-size: cover;
			background-position: bottom;
			padding-top: 200px;
		}
		.body{
			background-color: #F1F1F1;
			margin: 0;
			padding: 0;
			height: 100%;
			width: 100%;
		}
		.wrapper{
		    width: 90%;
		    overflow: auto;
		    box-shadow: 0 0 8px 0 rgba(0,0,0,0.2);
		    margin-left: auto;
		    margin-right: auto;
		    margin-top: 2%;
		    margin-bottom: auto;
		    z-index: 0;
		}
		.map{
		    height: 500px;
		    width: 100%;
		}
		::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
		    color: white;
		    opacity: 1; /* Firefox */
		}
		.swiper-event{
			width: 100%; 
			height: 550px;
			background-color: white;
			z-index: 5;  
			box-shadow: 0 0 8px 0 rgba(0,0,0,0.2); 
			left: 20%;
		}

		#search {
		  /* Put this on top of the blurred layer */
		  position: relative;
		  z-index: 100;
		  padding: 20px;
		  background: rgb(34,34,34); /* for IE */
		  background: rgba(34,34,34,0.75);
		  height: 550px;
		}

		@media (max-width: 600px ) {
		  #bg { padding: 10px; }
		  #search-bg { background-position: center -10px; }
		}

		#search h4, #search h5, #search h5 a { text-align: left; color: #fefefe; font-weight: normal; }
		#search h4 { margin-bottom: 50px }
		#search h5 { margin-top: 70px }

		.swiper-slide:hover{
			cursor: pointer;
		}
		.event-grid-content:hover{
			cursor: pointer;
		}
		.wave1, .wave2{height: 30px; margin-top: -100px; width: 100%;z-index: 12;left: 0;bottom: 0;}

		.wave1 {
		  -webkit-animation: wave-animation1 8.7s infinite linear; /* Safari 4+ */
		  -moz-animation:    wave-animation1 8.7s infinite linear; /* Fx 5+ */
		  -o-animation:      wave-animation1 8.7s infinite linear; /* Opera 12+ */
		  animation:         wave-animation1 8.7s infinite linear; /* IE 10+ */
		}
		.wave2 {
		  -webkit-animation: wave-animation1 6.3s infinite linear; /* Safari 4+ */
		  -moz-animation:    wave-animation1 6.3s infinite linear; /* Fx 5+ */
		  -o-animation:      wave-animation1 6.3s infinite linear; /* Opera 12+ */
		  animation:         wave-animation1 6.3s infinite linear; /* IE 10+ */
		}

		@-webkit-keyframes wave-animation1 {
		  0%   { background-position: 0 0; }
		  100% { background-position: 1601px 0; }
		}
		@-moz-keyframes wave-animation1 {
		  0%   { background-position: 0 0; }
		  100% { background-position: 1601px 0; }
		}
		@-o-keyframes wave-animation1 {
		  0%   { background-position: 0 0; }
		  100% { background-position: 1601px 0; }
		}
		@keyframes wave-animation1 {
		  0%   { background-position: 0 0; }
		  100% {background-position: 1601px 0;}
		}

		.wave1 {
		    background: url('http://www.templates-preview.com/bootstrap-templates/300111854/images/wave1.png') 0 0 repeat-x;
		}
		.wave2 {
		    background: url('http://www.templates-preview.com/bootstrap-templates/300111854/images/wave2.png') 0 0 repeat-x;
		}
	</style>
</head>
<body class="body">
	<!-- header -->
	<nav class="navbar navbar-expand-lg navbar-light  navbar-fixed-top" style="background-color: rgba(225,225,225,0.2); box-shadow: 0 0 8px 0 rgba(0,0,0,0.2);">
	  <a class="navbar-brand" href="<?php echo site_url('c_dashboard'); ?>" style="color: white;">In Map</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	    	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
		          Menu
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="<?php echo site_url('c_user_profile');?>">Profile</a>
		          <a class="dropdown-item" href="<?php echo site_url('c_my_event');?>">My Event</a>
		           <a class="dropdown-item" href="<?php echo site_url('c_my_event/my_transaction');?>">Transaction</a>
		          <a class="dropdown-item" href="<?php echo site_url('c_infriend');?>">Infriend</a>
		          <a class="dropdown-item" id="logout-btn">Logout</a>
		          <!-- <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a> -->
		        </div>
		     </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo site_url('c_create_event');?>" style="color: white;"> Create Event <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo site_url('c_user_profile/goto_notofications');?>" style="color: white;">Notifications</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<!-- header image and search bar -->
	<div class="header-image">
		<div style="width: 60%; color: white; margin-left: auto; margin-right: auto; text-align: center;  font-family: 'Arial'; font-size: 30pt;">
			Feel boring or confused ? Let's go and find <b>events</b> around you with <b>In map</b>
			<div style="overflow: auto;">
				<div style="float: left; width: 100%;">
				<input placeholder="Type event category or event name" type="text" style="width: 100%; height: 50px; border-radius: 30px; font-size: 18pt;padding-left: 30px; background-color: rgba(1,1,1,0); color: white; padding-right: 70px;">
				</div>
				<div style="height: 40px; width: 40px;float: right; margin-top: -45px; margin-right: 20px; font-size: 22pt;"><i class="fas fa-search" style="cursor: pointer;"></i></div>
			</div>
		</div>

		<div style="width: 40%; color: white; margin-left: auto; margin-right: auto; text-align: center;  font-family: 'Arial'; font-size: 12pt; margin-top: 20px;">
			<div style="overflow: auto;">
				<div style="float: left; width: 100%;">
				<input id="searchTextField" placeholder="Type a place" type="text" style="width: 100%; height: 30px; border-radius: 30px; font-size: 12pt;padding-left: 40px; background-color: rgba(1,1,1,0); color: white; padding-right: 30px;">
				</div>
				<div style="height: 40px; width: 40px;float: left; margin-top: -40px; font-size: 22pt;"><i class="fas fa-map-marker-alt" style="cursor: pointer; font-size: 12pt;"></i></div>
			</div>
		</div>
		<input type="hidden" id="latitude">
		<input type="hidden" id="longitude">
		<input type="hidden" id="formatted_address">
		<input type="hidden" id="administrative_area_level_1">
		
	</div>
	<!-- display map -->
	<div class="wrapper">
		<!-- info -->
		<div style="float: left; height: 550px; width: 50%; background-color: red;">
			<div class="swiper-event">
			<div class="swiper-container">
			    <div class="swiper-wrapper" id="slide-event">
			    </div>
			 </div>
		</div>
		</div>
		<!-- map -->
		<div id="map" style="float: left; height: 550px; width: 50%; background-color: green;">
			
		</div>
	</div>
	
	<div style="height: 50px;"></div>
	<hr>
	<!-- grid view -->
	<div id="grid-event" style="overflow: auto;width: 90%; margin-left: auto; margin-right: auto; padding-bottom: 3%; align-content: center;">

	</div>

	<!-- footer -->
	<div id="footer" style="margin-top: 100px;">
		
	</div>

	<!-- bootstrap js file -->
	<script src='<?php echo base_url(); ?>assets/js/bootstrap.min.js'></script>
	<!-- swiper js -->
	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
	<!-- google map and google place auto complete, done by using 1 url (no duplicate api key) -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi8pAFaNLoQPDgUaeH9tg4sN1G3jRc50o&libraries=places&callback=initMap"
    async defer></script>
    <!-- google map script -->
  	<script type="text/javascript">
		var map, infoWindow, user_potition, markerer;
		//save latitude and longitude to the array markers and add it to goole maps
		var markers = [];
		var componentForm = {
		  locality: 'long_name',
		  administrative_area_level_1: 'long_name',
		  country: 'long_name',
		};
		var swiper = new Swiper('.swiper-container', {
	      slidesPerView: 1,
	      spaceBetween: 30,
		    navigation: {
	        nextEl: '.swiper-button-next',
	        prevEl: '.swiper-button-prev',
	      },
	    });
	 	swiper.on('slideChange', function(){
	 		var index = swiper.activeIndex;
	 		console.log($("#"+index+"-lat").val());
	 		console.log("panjang array = "+markers[0].latitude);
	 		map.panTo({
	        	lat : parseFloat(markers[index].latitude),
	        	lng : parseFloat(markers[index].longitude)
	        });
			map.setZoom(15);

	 	});
		function initMap() {
			
			//auto complete
			var input = document.getElementById('searchTextField');
			var autocomplete =  new google.maps.places.Autocomplete(input);
			//get lat long and move the marker
			google.maps.event.addListener(autocomplete, 'place_changed', function () {
				
	      		var place = autocomplete.getPlace();
	      		//move marker
	      		user_potition.setPosition( new google.maps.LatLng( place.geometry.location.lat(), place.geometry.location.lng() ) );
	      		$("#latitude").val(place.geometry.location.lat());
	    		$("#longitude").val(place.geometry.location.lng());
	           
	            $("#formatted_address").val(place.formatted_address);

	            for(var i=0; i<place.address_components.length;i++){
	            	var addressType = place.address_components[i].types[0];
	            	if(addressType == "administrative_area_level_1"){
	            		//alert(place.address_components[i]['long_name']);
	            		$("#administrative_area_level_1").val(place.address_components[i]['long_name']);
	            		break;
	            	}
	            }
	           
	            user_potition.addListener('dragend', handleEvent);
	            //set focus to the marker
	            map.setCenter({
	            	lat : place.geometry.location.lat(),
	            	lng : place.geometry.location.lng()
	            });
	           map.setZoom(12);
	           codeAddress(place.geometry.location.lat(), place.geometry.location.lng(),map);
	      	});

	        var uluru = {lat: -25.363, lng: 131.044};
	        map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 4,
	          center: uluru
	        });

	        // Try HTML5 geolocation.
	        if (navigator.geolocation) {
	          navigator.geolocation.getCurrentPosition(function(position) {
	            this.user_potition = new google.maps.Marker({
	            	position : {lat : position.coords.latitude, lng : position.coords.longitude},
	            	map : map,
	            	draggable : true
	            });
	            codeAddress(position.coords.latitude, position.coords.longitude,map);
	            //set focus to the marker
	            map.setCenter({
	            	lat : position.coords.latitude,
	            	lng : position.coords.longitude
	            });
	           map.setZoom(12);
	          }, function() {
	            handleLocationError(true, infoWindow, map.getCenter());
	          });
	        } else {
	          alert("An Error occured, maybe your browser is not support geolocation!");
	        }
	     }

	    function handleEvent(event) {
	    	$("#latitude").val(event.latLng.lat());
	    	$("#longitude").val(event.latLng.lng());
	    	codeAddress(event.latLng.lat(), event.latLng.lng());
		}

		function codeAddress(lat, lng, map){
		  var geocoder = new google.maps.Geocoder();
		  var latLng = {lat : lat, lng : lng};
		   geocoder.geocode({'location': latLng}, function(results, status) {
	          if (status === 'OK') {
	            if (results[1]) {
	             	$("#formatted_address").val(results[1].formatted_address);
	             	$("#searchTextField").val(results[1].formatted_address);
	              	for(var i=0; i<results[1].address_components.length;i++){
		            	var addressType = results[1].address_components[i].types[0];
		            	if(addressType == "administrative_area_level_1"){
		            		//alert(place.address_components[i]['long_name']);
		            		$("#administrative_area_level_1").val(results[1].address_components[i]['long_name']);
		            		get_event_by_adminArea(results[1].address_components[i]['long_name'], map);

		            		break;
		            	}
	           		}
	            } else {
	              alert('No results found');
	            }
	          } else {
	            window.alert('Geocoder failed due to: ' + status);
	          }
	        });
		}

		function get_event_by_adminArea(area, map){
			$.ajax({
				type : "POST",
				url : "<?php echo site_url("c_dashboard/get_event_by_adminArea"); ?>",
				data : {"area" : area},
				dataType : 'json',
				beforeSend : function(){

				},
				success : function(res){
					console.table(res);
					$('#slide-event').html("");
					$("#grid-event").html("");
					markers = [];
					markerer = null;
					for(var i=0; i< res.length;i++){
						var url = "<?php echo base_url(); ?>"+res[i].photo_url;
						var title = res[i].title.replace(/<(?:.|\n)*?>/gm, '');
						var contentString = '<div>'+title+'</div>';
						var infowindow = new google.maps.InfoWindow({
				          content: contentString
				        });
						markers.push({latitude : res[i].latitude, longitude : res[i].longitude});
						markerer =  new google.maps.Marker({
			            	position : {lat : parseFloat(res[i].latitude), lng : parseFloat(res[i].longitude)},
			            	map : map,
			            	animation: google.maps.Animation.DROP,
			            	title : title
			            });
			         //    markerer.addListener('click', function() {
				        //   infowindow.open(map, markerer);
				        // });

						
						if(res[i].total_like == null){
							var likes = 0;
						}
						else{
							var likes = res[i].total_like;
						}

						
							$("#slide-event").append(''+
							'<div id="slide-'+res[i].event_id+'" class="swiper-slide" style=" background-image: url('+url+');background-repeat: no-repeat;background-position: center top;background-size : cover;height : 550px;">'+
							  '<div style="position: relative;">'+
							    '<div ></div>'+
							    '<div id="search">'+
							    	'<div style="color: white; font-size: 10pt;"><i class="far fa-clock"></i> '+res[i].dateStart+' '+res[i].timeStart+' - '+res[i].dateEnd+' '+res[i].timeEnd+' <i class="fas fa-hashtag"></i>'+res[i].kategori_name+'</div>'+
							    	'<div style="height: 10px;"></div>'+
							      '<h4>'+title+'</h4>'+
							      '<input id="'+i+'-lat" type="hidden" value="'+res[i].latitude+'">'+
							      '<input id="'+i+'-lng" type="hidden" value="'+res[i].longitude+'">'+
							      '<div style="color: white;"> <i class="fas fa-map-marker-alt"></i> '+res[i].address+'</div>'+
							        '<div style="width : 90%; position : absolute; bottom : 0; padding-left : 10px;">'+
							    		'<button onclick="viewEvent('+res[i].event_id+')" class="btn btn-success" style="border-radius : 0px; width : 100%;">view event</button>'+
							    	'</div>'+
							    '</div>'+
							  '</div>'+
							'</div>'+
						'');
						// append on grid-event to display grid view event
						if(res[i].price == null){
							var price = "no ticket";
						}
						else if(res[i].price == 0){
							var price = "Free ticket"
						}
						else{
							var	reverse = res[i].price.toString().split('').reverse().join(''),
							ribuan 	= reverse.match(/\d{1,3}/g);
							ribuan	= ribuan.join('.').split('').reverse().join('');
							var price = 'Rp'+ribuan+',00';	
						}
						$("#grid-event").append(''+
							'<div onclick="viewEvent('+res[i].event_id+')" class="event-grid-content" style=" box-shadow: 0 0 8px 0 rgba(0,0,0,0.2); width: 30%; min-width: 350px; height: 310px; background-color: white; margin-left: 2.5%; float: left; margin-top: 3%;">'+
							'<div style="height : 30px; padding : 5px;background-color : rgba(0,0,0,0.5); position : absolute; color : white; display : inline-block;">'+price+'</div>'+
							'<img src="'+url+'" style="height: 150px; width: 100%;">'+

							'<div style="padding: 10px; height: 100px;">'+
								'<div style="font-size: 10pt;"><i class="far fa-clock"></i> '+res[i].dateStart+' '+res[i].timeStart+' - '+res[i].dateEnd+' '+res[i].timeEnd+' <br>'+
								'</div>'+
								'<div style="margin-top : 5px;"><h6>'+title+'</h6></div>'+
							'</div>'+
							'<div style="height: 50px; width: 100%; padding-left: 10px;">'+
								'<div style="font-size: 10pt;">'+
									'<i class="fas fa-map-marker-alt"></i> '+res[i].address+'</div>'+
								'<div style="font-size: 10pt; display: inline-block; float: right; margin-right: 10px; ">'+
									'<i class="fas fa-hashtag"></i>'+res[i].kategori_name+' &emsp; <i class="fas fa-heart" style="color:#DD2E44;"></i> '+likes+''+
								'</div>'+
							'</div>'+
						'</div>'+
							'');
					}
					$("#slide-event").append(''+
							'<div class="swiper-button-next swiper-button-white"></div>'+
						    '<div class="swiper-button-prev swiper-button-white"></div>'
						    +'');
					swiper.update();
					 map.setCenter({
		            	lat : parseFloat(markers[0].latitude),
		            	lng : parseFloat(markers[0].longitude)
		            });
					map.setZoom(20);

					
				},
				error : function(err){

				}
			});
		}
	</script>

	<script>
		$("#footer").load('<?php echo site_url("c_create_event/footer_load"); ?>');
		
		function viewEvent(id){
			$.ajax({
				method : "post",
				url : '<?php echo site_url("c_create_event/add_event_views"); ?>',
				data : {"id" : id},
				dataType : 'json',
				success : function(res){
					document.location.href = "<?php echo site_url('c_create_event/view_event/')?>"+id;
				},
				error : function(err){

				}
			});
		}

		$(document).ready(function(){
			  console.log ($('.swiper-slide-active input').val());
			$("#btn-create-event").click(function(){
				document.location.href = "<?php echo site_url('c_create_event');?>";
			});

			$("#my-event").click(function(){
				document.location.href = "<?php echo site_url('c_my_event');?>";
			});
			$("#profile").click(function(){
				document.location.href = "<?php echo site_url('c_user_profile');?>";
			});

				//logout button on header
	  		$("#logout-btn").click(function(){
	  			if(confirm("Are you sure want to loguot from inmap ?")==true){
		  				$.ajax({
			  				method : "POST",
			  				url : "<?php echo site_url('c_user_profile/logout'); ?>",
			  				data : {"data" : "true"},
			  				dataType : 'json',
			  				success : function(res){
			  					window.location.replace("<?php echo site_url('c_dashboard');?>");
			  				},
			  				error : function(err){
			  					alert("Ups, Error occured when try to logout\nplease try again latter!");
			  				}
			  			});
	  			}
	  		});
		});
	</script>
</body>
</html>