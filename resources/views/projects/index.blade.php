@extends('main')

@section('title', ' All Projects')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Projects</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('projects.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Project</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Description</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>

					@foreach ($projects as $project)

						<tr>
							<th>{{ $project->id }}</th>
							<td>{{ $project->name }}</td>
							<td>{{ substr(strip_tags($project->descirption), 0, 25) }}{{ strlen(strip_tags($project->description)) > 25 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($project->created_at)) }}</td>
							<td><a href="{{ route('projects.show', $project->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $projects->links(); !!}
			</div>
		</div>
	</div>

@stop
