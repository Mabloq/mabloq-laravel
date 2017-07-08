@extends('main')

@section('title', 'View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			@if( isset($post->image))
			<img class="post-image" src="{{ asset('images/' . $post->image) }}" />

			@endif

			<h1> {{ $post->title }} </h1>
			<p class="lead"> {!! $post->body !!} </p>
			<hr>
			<div class="tags">
			<h3>Tags:</h3>
				@foreach($post->tags as $tag)
					 <span class="label label-default" name=""> {{ $tag->name }} </span>

				@endforeach
			</div>
			<div id="backend-comments">
				<h3>Comments</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name}}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a class="btn pull-right btn-small btn-primary glyphicon glyphicon-pencil" href="{{route('comments.edit', $comment->id)}}"></a>
									<a class="btn pull-right btn-small btn-danger glyphicon glyphicon-trash" href="{{route('comments.delete', $comment->id)}}"></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	<div class="col-md-4">
			<div class="well">
			<dl class="dl-horizontal">
					<label>Url: </label>
					<p><a>{{ url($post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Categroy:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', ' Edit', array($post->id), array('class' => 'btn btn-orange btn-block glyphicon glyphicon-pencil')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit(' Delete', ['class' => 'btn btn-danger btn-block glyphicon glyphicon-trash']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
