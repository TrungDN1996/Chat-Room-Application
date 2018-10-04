@extends('layouts.master')

@section('content')
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
		$(document).ready(function () {

			setInterval(function () {
				realTime();
			}, 200);

			$("#show").click(function () {
				$.get('/search/show', function (data) {
					$("#search").html(data);
					$("#hide").click(function () {
						$("#search").hide();
					});
					$("#show").click(function () {
						$("#search").show();
					});
				});
			});

			$("#submit").click(function () {
				var message = $("#message").val();
				var chat_room_id = $("#chat_room_id").val();
				var user_id = $("#user_id").val();
				// $.ajax({
				// 	type: 'POST',
				// 	url: '/message/send',
				// 	data: {
				// 		message: message, 
				// 		chat_room_id: chat_room_id,
				// 		user_id: user_id
				// 	},
				// 	dataType: 'json',
				// 	success: function (data) {
				// 		$("#message").val('');
				// 		$("#show-mess").append(data);
				// 	}
				// });
				$.get('/message/send', {message: message, chat_room_id: chat_room_id, user_id: user_id}, function (data) {
					$("#message").val('');
					$("#show-mess").append(data);
				});
			});

			function realTime() {
				// $.ajax({
				// 	type: 'POST',
				// 	url: '/message/update',
				// 	data: {roomID: 1, },
				// 	dataType: 'json',
				// 	success: function (data) {
				// 		$(".messages").html(data);
				// 	}
				// });
				$.get('/message/update', {roomID: 1}, function (data) {
					$(".messages").html(data);
				});
			}
		});

		$(".messages").animate({ scrollTop: $(document).height() }, "fast");

		$("#profile-img").click(function() {
			$("#status-options").toggleClass("active");
		});

		$(".expand-button").click(function() {
			$("#profile").toggleClass("expanded");
			$("#contacts").toggleClass("expanded");
		});

		$("#status-options ul li").click(function() {
			$("#profile-img").removeClass();
			$("#status-online").removeClass("active");
			$("#status-away").removeClass("active");
			$("#status-busy").removeClass("active");
			$("#status-offline").removeClass("active");
			$(this).addClass("active");
			
			if($("#status-online").hasClass("active")) {
				$("#profile-img").addClass("online");
			} else if ($("#status-away").hasClass("active")) {
				$("#profile-img").addClass("away");
			} else if ($("#status-busy").hasClass("active")) {
				$("#profile-img").addClass("busy");
			} else if ($("#status-offline").hasClass("active")) {
				$("#profile-img").addClass("offline");
			} else {
				$("#profile-img").removeClass();
			};
			
			$("#status-options").removeClass("active");
		});

		function newMessage() {
			message = $(".message-input input").val();
			if($.trim(message) == '') {
				return false;
			}
			$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
			$('.message-input input').val(null);
			$('.contact.active .preview').html('<span>You: </span>' + message);
			$(".messages").animate({ scrollTop: $(document).height() }, "fast");
		};

		$('.submit').click(function() {
			newMessage();
		});

		$(window).on('keydown', function(e) {
			if (e.which == 13) {
				newMessage();
				return false;
			}
		});
</script>
@endsection