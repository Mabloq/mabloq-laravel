@extends('main')

@section('title', 'Edit Comment')

@section('content')
<div class="row"
<div class="col-md-8 col-md-offset-2">
	<h1>Delete this Comment?</h1>
	
	{{ Form::model($comment, ['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
		{{ Form::label('comment', 'Comment:') }}
		{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5','disabled' => 'disabled']) }}
					
		{{ Form::submit('Delete',['class' => 'btn btn-danger btn-block btn-h1-spacing']) }}
</div>	
</div>
	{{ Form::close() }}
@endsection