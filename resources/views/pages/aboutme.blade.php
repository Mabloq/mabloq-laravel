@extends('main')


@section('stylesheet')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

		<script type="text/javascript">
		      $(document).ready(function() {
		        $("[data-fancybox]").fancybox();
						getPlayList();
		      })
		</script>
@endsection


@section('title', 'About me')
@section('imagehead', '/images/Optimized-profile2.jpg')
@section('BannerLead', 'Matthew Arcila')



@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>My Skills</h1>

		<div class="skillbar clearfix " data-percent="100%">
			<div class="skillbar-title" style="background: #d35400;"><span>HTML5</span></div>
			<div class="skillbar-bar" style="background: #e67e22;"></div>
			<div class="skill-bar-percent">100%</div>
		</div> <!-- End Skill Bar -->

		<div class="skillbar clearfix " data-percent="100%">
			<div class="skillbar-title" style="background: #2980b9;"><span>CSS3</span></div>
			<div class="skillbar-bar" style="background: #3498db;"></div>
			<div class="skill-bar-percent">100%</div>
		</div> <!-- End Skill Bar -->

		<div class="skillbar clearfix " data-percent="85%">
			<div class="skillbar-title" style="background: #2c3e50;"><span>Javascript</span></div>
			<div class="skillbar-bar" style="background: #2c3e50;"></div>
			<div class="skill-bar-percent">85%</div>
		</div> <!-- End Skill Bar -->

		<div class="skillbar clearfix " data-percent="80%">
			<div class="skillbar-title" style="background: #46465e;"><span>PHP</span></div>
			<div class="skillbar-bar" style="background: #5a68a5;"></div>
			<div class="skill-bar-percent">80%</div>
		</div> <!-- End Skill Bar -->

		<div class="skillbar clearfix " data-percent="75%">
			<div class="skillbar-title" style="background: #333333;"><span>Wordpress</span></div>
			<div class="skillbar-bar" style="background: #525252;"></div>
			<div class="skill-bar-percent">75%</div>
		</div> <!-- End Skill Bar -->

		<div class="skillbar clearfix " data-percent="80%">
			<div class="skillbar-title" style="background: #27ae60;"><span>Laravel</span></div>
			<div class="skillbar-bar" style="background: #2ecc71;"></div>
			<div class="skill-bar-percent">80%</div>
		</div> <!-- End Skill Bar -->

		<div class="skillbar clearfix " data-percent="60%">
			<div class="skillbar-title" style="background: #124e8c;"><span>Photoshop</span></div>
			<div class="skillbar-bar" style="background: #4288d0;"></div>
			<div class="skill-bar-percent">60%</div>
		</div> <!-- End Skill Bar -->


	</div>
	<div class="col-md-3 col-md-offset-1">
		<h1>About me</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div id="app">
			<mabloq-playlist :playlist="playlist">



			</mabloq-playlist>
			<mabloq-pager v-on:pager="nextPage" :tokens="tokens"></mabloq-pager>
		</div>
	</div>
	<div class="col-md-3 col-md-offset-1">

	</div>
</div>





@endsection

@section('scripts')

<script type="text/javascript">
$(document).ready(function(){
$('.skillbar').each(function(){
	$(this).find('.skillbar-bar').animate({
		width:$(this).attr('data-percent')
	},2000);
});
});
</script>
<script type="text/javascript" src="/js/app.js"></script>



@endsection
