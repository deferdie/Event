@extends('layouts.backend')

@section('content')

	<div class="container">
		<div class="row">
			<form action="/backend/event/patch/{{$event->id}}" method="post" enctype="multipart/form-data">
				
				{{  csrf_field() }}

				<div class="col-md-12">
					<div class="form-group">
						<label for="eventTitle">Event Title</label>
						<input type="text" name="eventTitle" id="eventTitle" value="{{$event->title}}" class="form-control" placeholder="The event title" required>
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="eventDate">Event Date</label>
						<input type="date" name="eventDate" id="eventDate" value="{{$event->date}}" class="form-control" placeholder="Select the event date" required>
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="eventImage">Hero Image</label>
						<input type="file" name="eventImage" id="eventImage" class="form-control">
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="description">Event Description</label>
						<textarea name="description" id="description" class="form-control">{!!$event->description!!}</textarea>
					</div>
				</div>

				<div class="col-md-12">
					<button class="btn btn-success" type="submit" role="button">
						Update Event
					</button>
				</div>

			</form>
		</div>
	</div>

@endsection