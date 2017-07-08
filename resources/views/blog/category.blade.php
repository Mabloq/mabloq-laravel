@extends('main')

@section('title', 'Blog')
@section('BannerHead', $category->name)
@section('BannerLead', 'Aint it grand?')
@section('content')





	<div class="row form-spacing-top">
			<div class="col-md-8">
				<h1></h1>
				<hr>
		@foreach($posts as $post)

				<div class="post-modal">
					@foreach($post->tags as $tag)
						<a href="{{ route('blog.tag', $tag->id)}}" class="blog-tag">{{$tag->name}}</a>
					@endforeach
						<h3>{{ $post->title }}</h3>
						<h5 class="italics">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
						<p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
						<hr>
							<a href="{{route('blog.single', $post->slug)}}" class="read-more">Read More</a>
					<a href="{{route('blog.single', $post->slug)}}" class="pull-right read-more"> Comments</a>

				</div>

				<hr>

		@endforeach

		<div class="text-center">
		{{ $posts->links()}}
		</div>
	</div>
	@include('partials._sidebar')

</div>


@endsection
