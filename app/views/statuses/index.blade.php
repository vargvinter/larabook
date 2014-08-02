@extends('layouts.default')

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			@include('layouts.partials.errors')

			<div class="status-post">				

				{{ Form::open(['route' => 'statuses_path']) }}

					<div class="form-group">
						{{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'required' => 'required', 'placeholder' => 'What\'s on your mind? ']) }}
					</div>

					<div class="form-group status-post-submit">
						{{ Form::submit('Post status', ['class' => 'btn btn-xs btn-default'])}}
					</div>

				{{ Form::close() }}	
			
			</div>

			@foreach ($statuses as $status)
				@include('statuses.partials.status')
			@endforeach

		</div>		
	</div>

@stop