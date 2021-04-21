@extends('home.sidebar')
@section('noidung')			
					@foreach($posts as $item)
					<a class="grid__item" href="{{route('post.detail', ['id' => $item->id])}}">
						<h2 class="title title--preview">{{$item->title}}</h2>
						<div class="loader"></div>
						<span class="category">{{$item->danhmuc->name}}</span>
						<div class="meta meta--preview">
							<img class="meta__avatar" src="{{asset('images/post')}}/{{$item->image}}" alt="author01" /> 
							<span class="meta__date"><i class="fa fa-calendar-o"></i>{{$item->created_at}}</span>
							<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 
								{{count($item->luotxem)}}
							 views</span>
						</div>
					</a>
					@endforeach
				</section>

@endsection