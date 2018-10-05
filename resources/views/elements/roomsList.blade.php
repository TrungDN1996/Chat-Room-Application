<div id="sidepanel" style="margin-left: 208px;">

	<!-- Label -->
	<div id="profile" style="background-color: #61E4F0">
		<div class="wrap">
			<h1 class="text-center" style="font-weight: bold; color: black;">Room(s) List</h1>
		</div>
	</div>
	<!-- End Label -->
	
	<!-- Get Create  -->
	<div class="row">
		<div class="col-md-3" style="margin-left: 200px;">
			<button id="getCreate"type="button" class="btn btn-primary">New Room</button>
		</div>
	</div>
	<!-- End Get Create -->

	<!-- Input-Create -->
	<div id="input" style="margin-top: 10px;">
	</div>
	<!-- End Input Create -->
	<!-- Rooms List -->
	<div id="contacts">
		<ul id="room">
			@foreach($rooms as $room)

				<li class="contact">
					<div class="wrap">
						<div class="meta">
							<a href="{{ route('room', $room->id) }}" style="text-decoration: none;">
								<p class="name">{{ $room->name }}</p>
							</a>
						</div>
					</div>
				</li>

			@endforeach
		</ul>
	</div>
	<!-- End Rooms List -->
	
</div>