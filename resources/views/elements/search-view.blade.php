@if(count($searchs) > 0)
	<ul>
		@foreach($searchs as $search)

		<li class="contact">
			<div class="wrap">
				<span class="contact-status online"></span>
				<img src="{{ asset('images/louislitt.png') }}" alt="" />
				<div class="meta">
					<p class="name">{{ $search->name }}</p>
				</div>
			</div>
		</li>

		@endforeach
	</ul>

@else 
	<ul>
		<li class="text-center">No result</li>
	</ul>

@endif