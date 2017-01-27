@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center default-h1">
				<h1>
					EVENTS
				</h1>
			</div>
		</div>
	</div>

	{{-- Show the latest two events --}}
	
	<div class="container events-latest-two">
		@foreach($events->chunk(2) as $event)

			<div class="row heighlight">
				@foreach($event as $event)
				<div class="col-md-6 event-latest-container">
					<img src="{{asset('storage/'.$event->image)}}" class="img-responsive" />
				</div>
				@endforeach
			</div>
		
		@endforeach
	</div>


	{{-- Show the rest of the events --}}


@endsection