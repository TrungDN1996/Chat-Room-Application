<div id="sidepanel">

	<!-- Auth -->
	<div id="profile">
		<div class="wrap">
			<img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
			<p>Loker</p>

			<div id="status-options">
				<ul>
					<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
					<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
					<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
					<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Auth -->

	<!-- Search User-->
	<div id="search">
	</div>
	<!-- End Search User -->

	<!-- Members List -->
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
	<!-- End Members List -->
	
	<!-- Option -->
	<div id="bottom-bar">
		<button id="show"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
		<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
	</div>
	<!-- End Option -->

</div>