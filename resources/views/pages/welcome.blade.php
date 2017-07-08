
@extends('main')

@section('title', ' Homepage')
@section('BannerHead', 'Mabloq')
@section('BannerLead', 'Full Stack Developer')
@section('content')

        <div class="row form-spacing-top">
            <div class="col-md-8">
              <h2>Recent Posts</h2>
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
                          <a href="{{route('blog.single', $post->slug)}}" class="pull-right read-more"> Comments {{ $post->comments()->count() }}</a>



                    </div>


                    <hr>

                @endforeach

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
            </div>



            @include('partials._sidebar')
        </div>

@stop

@section('scripts')


@endsection
