@extends('main')
@section('title', 'Tags')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags as $tag) 
						<tr>
							<td>{{ $tag->id }}</td>
							<td>{{ $tag->name }}</td>
							<td><a class="btn btn-default pull-right btn-small" href="{{route('tags.show', $tag->id)}}">View</a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of col-md-8 -->
	
	
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
		{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
			<h2> New Category </h2>
		
			{{ Form::label('name', 'Name:')}}
			{{ Form::text('name', null, ['class' => 'form-control'])}}
			
			{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary form-spacing-top'])}}
			
		{!! Form::close() !!}
		</div>
	</div><!-- end of col-md-8 -->
	
	</div>

@endsection