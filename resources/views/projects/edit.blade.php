

@extends('main')

@section('title', ' Edit Project')

@section('BannerHead', 'Edit Project')
@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}
{!! Html::style('css/parsley.css') !!}
 <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({
  selector:'textarea',
  plugins: 'link code codesample'
  });</script>
@endsection

@section('content')

{{!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'PUT', 'files' => true]) !!}
{{ Form::label('name', 'Name:') }}
{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

{{ Form::label('featured_image', 'Upload Featured Image:') }}
{{ Form::file('featured_image')}}

{{ Form::label('description', "Description:") }}
{{ Form::textarea('description', null, array('class' => 'form-control')) }}

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($project->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($project->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('projects.show', 'Cancel', array($project->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
					</div>
				</div>

			</div>
		</div>

	</div>	<!-- end of .row (form) -->

@stop
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
		//convert php array in json so and then set it to val
		$('.select2-multi').select2().val({!! json_encode($post->tags->pluck('id')) !!}).trigger('change');
		$
	</script>
@endsection
