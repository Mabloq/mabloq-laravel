@extends('blog')

@section('title', htmlspecialchars($post->title))

@section('content')
	<div class="row" style="padding-top: 100px;">
		<div class="col-md-8 col-md-offset-2 form-spacing-top">

			@foreach($post->tags as $tag)
				<a class="blog-tag" href="{{ route('blog.tag', $tag->id) }}">{{$tag->name}}</a>

			@endforeach

			@if( isset($post->image))
				<img class="post-image" src="{{ asset('images/' . $post->image) }}" height="400" width="800" />

			@endif
			<h1> {{ $post->title}} </h1>
			<hr/>
			<p class="lead"> {!! $post->body !!} </p>
			<p>Posted In: {{$post->category->name}}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3> <span class="glyphicon glyphicon-comment"></span> Comments <small>{{ $post->comments()->count() }} comments</small> </h3>
			<hr/>
			<!-- loop and display comments -->
			@foreach($post->comments as $comment)
				<div class="comment">
					<img src="{{  'https://www.gravatar.com/avatar/' . md5(strtolower(trim ($comment->email))) . '?d=mm'  }}" class="author-image">
					<div class="author-info">
						<h4>{{$comment->name }}</h4>
						<p class="author-time">{{ date('F n, Y - g:i',strtotime($comment->created_at)) }}<p>
					</div>
					<div class="comment-content">
						{{$comment->comment}}
					</div>



				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2 comment-form-spacing">
		{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

					{{ Form::submit('Add Comment',['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
				</div>
			</div>
		{{ Form::close() }}
		</div>
	</div>

@endsection
