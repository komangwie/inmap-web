<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/bootstrap.min.js'></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"></link>
	<!--styles -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- link fontawesome css from CDN -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<title>My Event</title>
	<style type="text/css">
		body{
		background-color: #F1F1F1;
		margin: 0;
		padding: 0;
	}
	.wrapper{
	    width: 80%;
	    background-color: white;
	    box-shadow: 0 0 8px 0 rgba(0,0,0,0.2);
	    margin-left: auto;
	    margin-right: auto;
	    margin-top: 2px;
	    padding: 10px 10px 10px 10px;
	}
	.input{
		background-color: #F1F1F1;
		height: 40px;
		border-radius: 0px;
		width: 100%;
	}
	.photo{
		height: 50px;
		width: 50px;
		background-color: grey;
		border-radius: 25px;
	}
	.name{
		text-align: center;
		width: 40%;
		height: 50px;
		background-color: red;
		position: relative;
		margin-top: -50px;
		margin-left: 60px;
		
	}
	.email{
		text-align: center;
		width: 40%;
		height: 50px;
		background-color: blue;
		position: relative;
		margin-top: -50px;
		margin-left: 52%;
	}
	.add{
		width: 8%;
		height: 50px;
		background-color: yellow;
		position: relative;
		margin-top: -50px;
		margin-left: 92%;
	}
	/*slider*/
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 40px;
		  height: 24px;
		}

		.switch input {display:none;}

		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 16px;
		  width: 16px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: orange;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(16px);
		  -ms-transform: translateX(16px);
		  transform: translateX(16px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}
		.menu-dot{
			text-align : left; 
			width : 100%; 
			color: gray;
		}
		.menu-dot:hover{
			background-color: rgba(255,255,180,0.8);
			cursor: pointer;
		}
		.menu-btn{
			font-size : 20pt;
		}
		.menu-btn:hover{
			cursor: pointer;
			color: gray;
		}
	@media screen and (max-width:600px){
			.wrapper{
			    width: 100%;
			    background-color: white;
			    box-shadow: 0 0 8px 0 rgba(0,0,0,0.2);
			    margin-left: auto;
			    margin-right: auto;
			    margin-top: 2px;
			    padding: 10px 10px 10px 10px;
			}
			.email-user{
				display: none;
			}
		}
	
	</style>
</head>

<body>
	<div id="header"></div>
	
	<div style="height: 50px;"></div>
	
	<div id="list">
	<?php
	if(count($event) == 0){
		echo '
			<div class="list-all" style="margin-top : 10px;" >
				<div class="wrapper">
				<table border="0px solid black" style="width: 100%; text-align : center;">
					<tr>
						<td style="width: 50px;">
							<div><h4>You have no events right now</h4></div>
						</td>
					</tr>
				</table>
			</div>
			</div>
			<div style="height : 350px;"></div>
		';
	}
	else{
		foreach ($event as $row) {
			$title_parse = strip_tags($row["title"]);
			$description_parse = strip_tags($row["description"]);
			$des = substr($description_parse,0,200) . "...";
			if($row["ticket"] == "yes"){
				$ticket = '<div style="font-size: 9pt; color: orange;">
								Ticket available
							</div>';
			}
			else{
				$ticket = '<div style="font-size: 9pt; color: red;">
								Ticket unvailable
							</div>';
			}
			if($row["status"] == "online"){
				$status_text = "online";
				$status =  '<input type="checkbox" checked disabled>';
			}
			else{
				$status_text = "offline";
				$status =  '<input type="checkbox" disabled>';
			}
			echo '
					<div class="list-all" id="'.$row["event_id"].'" style="margin-top : 10px;" >
						<div class="wrapper">
							'.$ticket.'
						<table border="0px solid black" style="width: 100%;">
							<tr>
								<td style="width: 30%;">
									<b>
										'.$title_parse.'
									</b>
								</td>
								<td style="width: 40%; padding-left: 10px;">
									'.$des.'
								</td>
								<td style="padding-left: 10px; width: 10%;font-size: 10pt;">
									<div>'.$row["dateStart"].'</div>
									<div>-</div>
									<div>'.$row["dateEnd"].'</div>
								</td>
								<td style="text-align: center; width: 5%;">
									<span>'.$status_text.'</span>
									<label class="switch">
							    	 '.$status.'
									 	  <span class="slider round"></span>
									</label>
								</td>
								<td style="width: 10%; text-align: right;">
								<input type="hidden" value="'.$status_text.'" id="'.$row["event_id"].'-input">
									<div >
										<i class="fas fa-ellipsis-v menu-btn" onclick="displayMenu('.$row["event_id"].')"></i>
										<div id="row-'.$row["event_id"].'" style="position : absolute;"></div>
										
									<div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			';
		}
	}
	?>
	<!-- save event id to hide menu as modal -->
	<input type="hidden" id="active-id">

	</div>
	<div style="height: 100px;"></div>
<!-- footer -->
		<div id="footer" style="margin-top: 40px;">

		</div>
	<script type="text/javascript">
		$("#header").load('<?php echo site_url("c_create_event/header_load"); ?>');
		$("#footer").load('<?php echo site_url("c_create_event/footer_load"); ?>');
		$("#btn-create-event").click(function(){
				document.location.href = "<?php echo site_url('c_create_event');?>";
			});
		function displayMenu(id){
			if($("#menu-"+id).length == 0){
				$("#active-id").val(id);
				$("#row-"+id).append(''+
					'<div id="menu-'+id+'" style="background-color : white; width : 150px; box-shadow: 0 0 8px 0 rgba(0,0,0,0.2); padding : 5px;">'+
							'<table style="width : 100%; text-align : left;" border="0px solid black;">'+
								'<tr class= "menu-dot" onclick="viewEvent('+id+')" >'+
									'<td><i class="fas fa-eye"></i></td>'+
									'<td>View</td>'+
								'</tr>'+
								'<tr class= "menu-dot" onclick="deleteEvent('+id+')">'+
									'<td><i class="fas fa-trash-alt"></i></td>'+
									'<td>Delete</td>'+
								'</tr>'+
								'<tr class= "menu-dot"  onclick="editEvent('+id+')">'+
									'<td><i class="fas fa-pencil-alt"></i> </td>'+
									'<td>Edit</td>'+
								'</tr>'+
								'<tr class= "menu-dot"  onclick="viewStats('+id+')">'+
									'<td><i class="fas fa-chart-line"></i> </td>'+
									'<td>Stats</td>'+
								'</tr>'+
							'</table>'+
						'</div>'+
					'');
			}
			else{
				$("#menu-"+id).remove();
			}
			
		}

		function editEvent(id){
			if($("#"+id+"-input").val() == "online"){
				alert("Sorry you cannot edit online event");
			}
			else{
			document.location.href = "<?php echo site_url('c_create_event/edit_event/')?>"+id;
			}
		}
		
		//vuew statistic of event
		function viewStats(id){
			document.location.href = "<?php echo site_url('c_create_event/view_event_stats/')?>"+id;
		}

		function viewEvent(id){
			document.location.href = "<?php echo site_url('c_create_event/view_event/')?>"+id;
		}
		function deleteEvent(id) {
			if(confirm("Are you sure want to delete this event ?") == true){
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('c_my_event/delete_event'); ?>",
					data: {
						'id': id
					},
					dataType: 'json',
					success: function (res) {
						$("#"+id).remove();
					},
					error: function (err) {
						alert("failed");
					}
				});
			}
		}

		$(document).ready(function(){
			$(document).mouseup(function(event) 
			{
				var id = $("#active-id").val();
			    var container = $("#menu-"+id);

			    // if the target of the click isn't the container nor a descendant of the container
			    if (!container.is(event.target) && container.has(event.target).length === 0) 
			    {
			        container.remove();
			    }
			});
		});
	</script>
</body>

</html>
