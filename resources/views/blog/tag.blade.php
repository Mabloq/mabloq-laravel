@extends('main')

@section('title', 'Blog')
@section('BannerHead', $tag->name)

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<hr/>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		@foreach($posts as $post)

				<div class="post-modal">

						<h3>{{ $post->title }}</h3>
						<h5 class="italics">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
						<p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
						<hr>
							<a href="{{route('blog.single', $post->slug)}}" class="read-more">Read More</a>
					<a href="{{route('blog.single', $post->slug)}}" class="pull-right read-more glyphicon glyphicon-comment"> Comments</a>
					<a href="{{route('blog.single', $post->slug)}}" class="pull-right read-more glyphicon glyphicon-heart">  Likes</a>


				</div>

				<hr>

		@endforeach
	</div>
  	</div>
  	<div class="row">
  		<div class="col-md-12">
  			<div class="text-center">
  			{{ $posts->links()}}
  			</div>
  		<div>
  	<div>
@endsection
