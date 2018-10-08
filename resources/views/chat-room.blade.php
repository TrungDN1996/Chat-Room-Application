@extends('layouts.master')

@section('content')
	
	<!-- Back to Home page -->
	<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="col-md-3">
			<a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Back To Home</button></a>
		</div>
	</div>
	<!-- End Back to Homw page -->

	<div id="frame">

		<!-- Side Bar -->
		@include('elements.side-bar')
		<!-- End Side Bar -->
		
		<!-- Message Box -->
		@include('elements.message-box')
		<!-- End Message Box -->

	</div>
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {

			// Load message (realTime)
			setInterval(function() {
				var chat_room_id = $("#chat_room_id").val();

				$.ajax({
					headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
					url: '/room/message/load',
					method: 'POST',
					data: {
						chat_room_id: chat_room_id,
					},
					success:function(data) {
						$(".messages").html(data);
					}
				});
			}, 200);

			// Hide search box
			$("#search").hide();

			// Show search box
			$("#show").click(function() {
				$("#search").show();
			});

			// Add contact
			$(document).keyup(function() {
				var name = $("#name").val();
				if (name != '') 
				{
					$.get('/room/search/show', {name: name}, function(data) {
						$(".list-group").html(data);
						$("#name-input").click(function() {
							$("#name").val($(this).text());
							$(".list-group").fadeOut();

							$("#add").click(function() {
								var name = $("#name").val();
					 			var chat_room_id = $("#chat_room_id").val();
								$.ajax({
									headers: {
								        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								    },
									url: '/room/contact/add',
									method: 'POST',
									data: {
										name: name, 
										chat_room_id: chat_room_id,
									},
									success:function(data) {
										$("#contacts ul").append(data);
										$("#search").hide();
									}
								});
								// $.get('/room/contact/add', {name: name, chat_room_id: chat_room_id}, function(data) {
								// 	$("#contact ul").append(data);
								// });
							});
						});
					});
				}
			});

			// Send message
			$("#submit").click(function() {
				var message = $("#message").val();
				var chat_room_id = $("#chat_room_id").val();
				var user_id = $("#user_id").val();
				$.ajax({
					headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
					url: '/room/message/send',
					method: 'POST',
					data: {
						message: message, 
						chat_room_id: chat_room_id,
						user_id: user_id
					},
					success:function(data) {
						$("#message").val('');
						$("#show-mess").append(data);
					}
				});
			});

			// function realTime() {
			// 	var chat_room_id = $("#chat_room_id").val();

			// 	$.ajax({
			// 		headers: {
			// 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 	    },
			// 		url: '/room/message/load',
			// 		method: 'POST',
			// 		data: {
			// 			chat_room_id: chat_room_id,
			// 		},
			// 		success:function(data) {
			// 			$(".messages").html(data);
			// 		}
			// 	});
			// 	$.get('/room/message/load', {chat_room_id: chat_room_id}, function(data) {
			// 		$(".messages").html(data);
			// 	});
			// }
		});
	</script>
@endsection