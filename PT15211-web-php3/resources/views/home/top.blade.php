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
		<link rel="stylesheet" type="text/css" href="{{asset('adminlte/dist/css/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('adminlte/dist/fonts/font-awesome-4.3.0/css/font-awesome.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('adminlte/dist/css/style1.css')}}" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				
				<a href="{{route('homepage')}}"><h1><span>Animated<span> Grid Layout</h1></a><br>
					{{-- <form action="" method="get">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="keyword" placeholder="Search keyword..." value="{{$keyword}}">
								</div>
							</div>
						</div>
					</form> --}}
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
@foreach($postsOfViews as $item)
<a class="grid__item" href="{{route('post.detail', ['id' => $item->bai_viet_id])}}">
    <h2 class="title title--preview">{{$item->title}}</h2>
    <div class="loader"></div>
    <span class="category">
		@foreach($cates as $i)
			@if($i->id == $item->danh_muc_id)
				{{$i->name}}
			@endif
		@endforeach
	</span>
    <div class="meta meta--preview">
        <img class="meta__avatar" src="{{asset('images/post')}}/{{$item->image}}" alt="author01" /> 
        <span class="meta__date"><i class="fa fa-calendar-o"></i>{{$item->created_at}}</span>
        <span class="meta__reading-time"><i class="fa fa-clock-o"></i> 
       {{$item->luot_xem}}
            views</span>
            </div>
</a>
@endforeach
</section>
@include('home.footer')
