<div id="sidepanel">

	<!-- Label -->
	<div id="profile" style="background-color: #61E4F0">
		<div class="wrap">
			<h1 class="text-center" style="font-weight: bold; color: black;">Friend(s) List</h1>
		</div>
	</div>
	<!-- End Label -->

	<!-- Search User-->
	<div id="search">
		@include('elements.search-box')
	</div>
	<!-- End Search User -->

	<!-- User List -->
	<div id="contacts">
		<ul>
			@foreach($users as $user)

				<li class="contact">
					<div class="wrap">
						<span class="contact-status online"></span>
						<img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
						<div class="meta">
							<p class="name">{{ $user->name }}</p>
						</div>
					</div>
				</li>
			
			@endforeach
		</ul>
	</div>
	<!-- End Users List -->
	
</div>