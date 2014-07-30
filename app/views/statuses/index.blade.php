@extends('layouts.default')

@section('content')
	
	<h1>Post a Status</h1>

	@include('layouts.partials.errors')

	{{ Form::open(['route' => 'statuses_path']) }}

		<div class="form-group">
			{{ Form::label('body', 'Status:') }}
			{{ Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Post status', ['class' => 'btn btn-lg btn-primary'])}}
		</div>

	{{ Form::close() }}	

	<h2>Statuses</h2>

	@foreach ($statuses as $status)
		<article>{{ $status->body }}</article>
	@endforeach

@stop