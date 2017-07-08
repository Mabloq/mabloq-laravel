@extends('main')

@section('title', 'Blog')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>BLOG</h1>
			<hr />
		</div>
		<div class="col-md-8 ">
		@foreach($posts as $post)
			<h2>{{ $post->title }}</h2>
			<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
			<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : ''}}</p>
			<a class="btn btn-orange"href="{{ route('blog.single', $post->id) }}">Read More</a>
			<hr>
			@endforeach
			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>

		<div class="col-md-3 col-md-offset-1">
			<h1>Categories</h1>
			@foreach($categories as $category)
			<a href="{{ route('blog.category', $category->id) }}">{{$category->name}}</a>
			@endforeach

		</div>
	</div>

@endsection
