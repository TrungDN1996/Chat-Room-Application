<div class="content">

	<!-- Chat Room Name -->
	<div class="contact-profile">

		<h1 class="text-center" style="font-weight: bold;">{{ $chatRoomName[0]->name }}</h1>

	</div>
	<!-- End Chat Room Name -->

	<!-- Message Box -->
	<div class="messages">
		<ul id="show-mess">
			@foreach($messages as $message)

				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<div class="meta">
						<span class="name">{{ $message->name }}</span>
					</div>
					<p>{{ $message->message }}</p>
				</li>

			@endforeach
		</ul>
	</div>
	<!-- End Message Box -->
	
	<!-- Message Input -->
	<div class="message-input">
		<div class="wrap">
			<input id="chat_room_id" type="hidden" value="1">
			<input id="user_id" type="hidden" value="1">
			<input id="message" type="text" placeholder="Write your message...">
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button id="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	</div>
	<!-- End Message Input -->

</div>