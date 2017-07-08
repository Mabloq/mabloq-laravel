@extends('main')

@section('title', ' Porfolio')
@section('BannerHead', 'Portfolio')
@section('BannerLead', 'What Ive done so far')

@section('content')

	<!-- <div class="row">
		<div class="col-md-12"> -->
<div class="grid">
    @foreach($projects as $project)

				<div class="cell" data-modal="#modal2" data-toggle="modal" data-project="{{$project->id}}">
					<img class="responsive-img" src="/images/{{$project->image}}" data-project="{{$project->id}}" alt="{{$project->name}}">

					<p class="cell-desc" data-project="{{$project->id}}">{{$project->tech_stack}} </p>

				</div>


<!--
      <a id="{{$project->id}}" href="#" class="toggle-portfolio" data-target="#myModal" data-toggle="modal" data-project="{{$project->id}}">
        <div  class="portfolio-container" style="background: url(/images/{{$project->image}});">
            <h2 class="portfolio-title" data-project="{{$project->id}}">{{$project->name}}</h2>

        </div>
        <p class="tech-stack" data-project="{{$project->id}}">{{$project->tech_stack}}</p>
      </a> -->
    @endforeach
		<div id="modal2" >
							<!-- modal close button -->

				    <div class="modal-top">
		         <i class="modal-close material-icons">close</i>
		        <h1 id="modal-head"></h1>
		      </div>
		      <div class="modal-bot">
		         <p class="modal-dialouge"></p>
						 <div class="modal-feet">
			         <a id="project-visit"href="#"class="btn orange">Visit</a>
			         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			       </div>
		      </div>
		  </div>
				</div>
    <!-- </div>
	</div> -->
	<!--  MODAL NUMBER 2 ==============================================  -->




  <!-- ================== MODAL MODAL MODAL ================================= -->
  <div id="myModal" class="modal fade" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: ;height:300px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 id="project-title"class="modal-title">name</h5>

      </div>
      <div class="modal-body">
        <p id="project-desc"></p>
      </div>
      <div class="modal-footer">
        <a id="project-visit"href="#"class="btn orange">Visit</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

</div>
  <!-- ================== END MODAL END MODAL END MODAL ================== -->
@stop

@section('scripts')
{{ Html::script('js/modal.js') }}

@endsection
