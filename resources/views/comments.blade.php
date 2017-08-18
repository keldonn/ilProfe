{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('stars', 'Stars:') !!}
			{!! Form::text('stars') !!}
		</li>
		<li>
			{!! Form::label('text', 'Text:') !!}
			{!! Form::text('text') !!}
		</li>
		<li>
			{!! Form::label('post_id', 'Post_id:') !!}
			{!! Form::text('post_id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}