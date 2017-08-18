{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('is_profe', 'Is_profe:') !!}
			{!! Form::text('is_profe') !!}
		</li>
		<li>
			{!! Form::label('is_admin', 'Is_admin:') !!}
			{!! Form::text('is_admin') !!}
		</li>
		<li>
			{!! Form::label('remember_token', 'Remember_token:') !!}
			{!! Form::text('remember_token') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}