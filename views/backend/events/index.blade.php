@extends('layouts.backend')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<p>
					<a href="/backend/event/create">
						<button class="btn btn-default">
							Create Event
						</button>
					</a>
				</p>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-responsive text-center">
					<thead>
						<tr>
							<td>ID</td>
							<td>Title</td>
							<td>Date</td>
							<td>Image</td>
							<td>Manage</td>
						</tr>
					</thead>
					<tbody>
						@foreach($events as $event)
							<tr>
								<td>{{$event->id}}</td>
								<td>{{$event->title}}</td>
								<td>{{$event->date}}</td>
								<td><img src="{{asset('storage/'.$event->image)}}" width="40" /> </td>
								<td>
									<button type="button" class="btn btn-danger remove-event" data-remove-event="{{$event->id}}">
										<i class="glyphicon glyphicon-remove"></i>
									</button>
									<a href="/backend/event/edit/{{$event->id}}">
										<button type="button" class="btn btn-default">
											<i class="glyphicon glyphicon-pencil"></i>
										</button>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{-- <example events='{{$events}}'></example> --}}
			</div>
		</div>
	</div>

@endsection