@extends('main')

@section('title', 'New Project')

@section('BannerHead', 'New Project')
@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}
{!! Html::style('css/parsley.css') !!}
<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({
	selector:'textarea',
	plugins: 'link code codesample'
	});
</script>

@section('content')

	<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<h1>Create New Project</h1>
			<hr>

				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						{!! Form::open(array('route' => 'projects.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('featured_image', 'Upload Featured Image:') }}
					{{ Form::file('featured_image')}}

				{{ Form::label('description', "Description:") }}
				{{ Form::textarea('description', null, array('class' => 'form-control')) }}

				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
					</div>
				</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection
