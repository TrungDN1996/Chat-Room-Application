@extends('layouts.master')

@section('content')

	<!-- Logout-->
	<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="col-md-3">
			<a href="{{ route('home.logout') }}"><button type="button" class="btn btn-primary">Logout</button></a>
		</div>
	</div>
	<!-- End Logout -->

    <div id="frame">
		
        <!-- Side Bar -->
        @include('elements.friendsList')
        <!-- End Side Bar -->
        
        <!-- Message Box -->
        @include('elements.roomsList')
        <!-- End Message Box -->

    </div>

@endsection

@section('js')
	<Script>
		$(document).ready(function() {

			// Search user
			$("#name").change(function() {
				var name = $(this).val();

				$.get('/home/search', {name: name}, function(data) {
					$("#contacts").html(data);
				});
			});

			// Create a chat room
			$("#getCreate").click(function() {
				$.get('/home/create', function(data) {
					$("#input").html(data);

					$("#create_input").click(function() {
						var name_input = $("#name_input").val();
						var id = $("#id").val();
						$.ajax({
							 headers: {
							    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							 },
							url: "/home/create",
							method: "POST",
							data: {name_input: name_input, id: id},
							success:function(data) {
								$("#room").append(data);
							$("#input").hide();
							}
						});
					});
				});
			});
		});
	</Script>
@endsection
