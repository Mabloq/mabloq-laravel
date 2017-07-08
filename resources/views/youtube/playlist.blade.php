@extends('main')


@section('stylesheet')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>



@endsection


@section('title', 'About me')
@section('imagehead', '/images/Optimized-profile2.jpg')s
@section('BannerLead', 'Matthew Arcila')



@section('content')


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


<script type="text/javascript" src="/js/app.js">
$(document).ready(function() {
  $("[data-fancybox]").fancybox();

})
</script>


@endsection
