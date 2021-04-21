<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<meta name="description" content="A responsive, magazine-like website layout with a grid item animation effect when opening the content" />
		<meta name="keywords" content="grid, layout, effect, animated, responsive, magazine, template, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		@include('home.css')
	</head>
	<body>
		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				
				<a href="{{route('homepage')}}"><h1><span>Animated<span> Grid Layout</h1></a><br>
					<form action="" method="get">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="keyword" placeholder="Search keyword..." value="{{$keyword}}">
								</div>
							</div>
						</div>
					</form>
				<nav class="codrops-demos">
					@foreach($cates as $item)
					<a class="current-demo" href="{{route('category.post',['id' => $item->id])}}">{{$item->name}}</a><br><hr>
					@endforeach
				</nav>
			
			</div>
			<div id="theGrid" class="main">
				<section class="grid">
					<header class="top-bar">
						<h2 class="top-bar__headline">All posts</h2>
						<div class="filter">
							<span>Filter by:</span>
							<span class="dropdown"><a href="{{route('topPostView')}}">Top posts in the last 2 days</a></span>
						</div>
					</header>


					@yield('noidung')

				</div>
			</div><!-- /container -->
			@include('home.footer')
			@yield('page-script')
		</body>
	</html>