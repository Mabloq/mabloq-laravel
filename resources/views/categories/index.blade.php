@extends('main')
@section('title', 'Categories')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of col-md-8 -->


	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2> New Category </h2>
		{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}


			{{ Form::label('name', 'Name:')}}
			{{ Form::text('name', null, ['class' => 'form-control'])}}

			{{ Form::submit('Create New Category', ['class' => 'btn btn-primary form-spacing-top'])}}

		{!! Form::close() !!}
		</div>
	</div><!-- end of col-md-8 -->

	</div>

@endsection
