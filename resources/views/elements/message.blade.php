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