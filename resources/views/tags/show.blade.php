@extends('main')

@section('title', " $tag->name Tag")

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1> {{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small> </h1>
	</div>
	<div class="col-md-2">
		<a class="btn btn-primary pull-right btn-h1-spacing" href="{{route('tags.edit', $tag->id)}}">Edit</a>
	</div>
	<div class="col-md-2">
	{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
	{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-h1-spacing']) }}
		{{ Form::close()}}
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Tags</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post) 
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>@foreach($post->tags as $tag) 
									<span class="label label-default" name="">{{ $tag->name}}</span>
								@endforeach 
							</td>
							<td><a class="btn btn-default pull-right btn-small" href="{{route('posts.show', $post->id)}}">View</a></td>
						</tr>
					@endforeach
				</tbody>
		</table>
	</div>
	
	
	
</div>

@endsection