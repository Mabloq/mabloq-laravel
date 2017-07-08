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
  <div style="margin-top:20px;">

  </div>
	<div class="col-md-8 col-md-offset-2">
		<div id="app">
			<mabloq-playlist :playlist="playlist">

        <mabloq-pager v-on:pager="nextPage" :tokens="tokens"></mabloq-pager>
			</mabloq-playlist>

		</div>
	</div>
	<div class="col-md-3 col-md-offset-1">

	</div>
</div>





@endsection

@section('scripts')

<script type="text/javascript" src="/js/app.js"></script>



@endsection
