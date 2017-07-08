@extends('main')

@section('title', 'Login')

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		{!! Form::open() !!}
			{{ Form::label('email', 'Email:')}}
			{{ Form::email('email', null, ['class' => 'form-control'])}}
			
			{{ Form::label('password', 'Password:', ['class' => 'form-spacing-top'])}}
			{{ Form::password('password', ['class' => 'form-control'])}}
			
			{{ Form::checkbox('remember', null, ['class' => 'form-spacing-top'])}} {{ Form::label('remember', 'Remember', ['class' => 'form-spacing-top'])}}
			<br>
			{{ Form::submit('Login', ['class' => 'btn btn-success col-md-offset-5'])}}
			
			<p><a href="{{url('password/reset')}}">Forgot Password</a></p>
	
		</div>
	</div>
	
@endsection