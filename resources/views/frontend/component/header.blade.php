<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
			<title>{{ MetaTag::get('title') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        {!! MetaTag::tag('description') !!}
        {{--Set default share picture after custom section pictures--}}
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="{{ url('/') }}">DUMET CMS</a></h1>
						<nav class="links">
							<ul>
								@foreach ($categories as $rows)
								<li><a href="{{ url('news/categories') }}/{{ str_slug($rows->category_name,'-') }}">{{ $rows->category_name }}</a></li>	
								@endforeach
								
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="GET" action="{{ url('search') }}">
										<input type="text" name="keyword" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>
