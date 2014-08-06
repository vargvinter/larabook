@if($user->isFollowedBy($currentUser))
	<p>You are following {{ $user->username }}</p>
@else

	{{ Form::open(['route' => 'follows_path']) }}

		{{ Form::hidden('userIdToFollow', $user->id) }}
		<button class="btn btn-primary" type="submit">Follow {{ $user->username }}</button>

	{{ Form::close() }}

@endif