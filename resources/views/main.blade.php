<!DOCTYPE html>
<html lang="en">
  <head>
@include('partials._head')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
  </head>
  <body>

	@include('partials._nav')

	<div class="container">

		@include('partials._messages')



		@yield('content')


	</div> <!-- end of container-->

  <hr/>
  @include('partials._footer')



    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  @yield('scripts')
  </body>
</html>
