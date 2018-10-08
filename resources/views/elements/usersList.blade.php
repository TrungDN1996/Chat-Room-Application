@if(count($searchs) > 0)
	
	@foreach($searchs as $search)
		
		<a href="#" id="name-input" class="list-group-item list-group-item-action">{{ $search->name }}</a>

	@endforeach

@else 

	<a href="#" class="list-group-item list-group-item-action">No Result</a>

@endif