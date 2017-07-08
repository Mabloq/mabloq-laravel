@extends('main')

@section('title', 'View Project')

@section('content')
	<div class="row">
		<div class="col-md-8">
			@if( isset($project->image))
			<img class="post-image" src="{{ asset('images/' . $project->image) }}" />

			@endif

			<h1> {{ $project->name }} </h1>
			<p class="lead"> {!! $project->description !!} </p>
			<hr>



		</div>

	<div class="col-md-4">
			<div class="well">



				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($project->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($project->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('projects.edit', ' Edit', array($project->id), array('class' => 'btn btn-orange btn-block glyphicon glyphicon-pencil')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'DELETE']) !!}

						{!! Form::submit(' Delete', ['class' => 'btn btn-danger btn-block glyphicon glyphicon-trash']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('projects.index', '<< See All Projects', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
