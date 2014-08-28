@extends('layouts.default')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<h1>Need to reset your password?</h1>

			{{ Form::open() }}

				<div class="form-group">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Reset password!', ['class' => 'btn btn-lg btn-primary'])}}
				</div>

			{{ Form::close() }}			
		</div>
	</div>


@stop