<header class="home-head">
	<div class="container header inner">
	<nav class="navbar">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Mabloq</a>
			</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav wrap">

					<li class="dropdown">
					<a  href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/blog/categories/1">Business</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/blog/categories/2">Projects</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/blog/categories/3">Lifestyle</a></li>

					</ul>
					</li>
					<li  class="{{ Request::is('about') ? "active" : "" }}"><a href="/portfolio">Portfolio</a></li>
					<li  class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>

					<li  class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
				</ul>

			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
				<li class="dropdown">
				<a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{ route('posts.index') }}">Posts</a></li>
					<li><a href="{{ route('categories.index') }}">Categories</a></li>
					<li><a href="{{ route('tags.index') }}">Tags</a></li>
					<li><a href="{{ route('projects.index') }}">Projects</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="{{ route('logout') }} ">Logout</a></li>
				</ul>
				</li>

				@else
					<a href="{{ route('login')}}" type="button" class="btn btn-default navbar-btn">Login</a>

				@endif
			</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="site-banner" style="margin-top:100px;">
		<img class="imagehead" src="@yield('imagehead')" alt="">
		<h1 class="banner-heading">@yield('BannerHead')</h1>
		<p class="banner-lead">@yield('BannerLead')</p>

	</div>
</header>