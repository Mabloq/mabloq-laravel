@extends('main')
@section('imagehead', '/images/Optimized-profile2.jpg')
@section('BannerLead', 'Matthew Arcila')
@section('title', 'Contact')

@section('content')
<div class="row"
	<div class="col-md-12">
		<h1>Contact Me</h1>

		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

		<hr>

		<form action="{{ url('contact') }}" method="POST">
			{{ csrf_field()}}
		<div class="form-group">
				<label name="name">Name:</label>
				<input id="name" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label name="email">Email:</label>
				<input id="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label name="subject">Subject:</label>
				<input id="subject" name="subject" class="form-control">
			</div>

			<div class="form-group">
				<label name="message">Message:</label>
				<textarea id="message" name="message" class="form-control">Type your message here...</textarea>
			</div>

			<input type="submit" value="Send Message" class="btn btn-success">

		</form>

	</div>
</div>
@endsection
