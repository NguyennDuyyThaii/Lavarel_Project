@extends('home.sidebar')
@section('noidung')
<section class="">
    <div class="">
        <article class="" style="padding: 2.5rem;">
            <span class="category" style="color:green">{{$posts->danhmuc->name}} </span>
            <h2 class="title">{{$posts->title}}</h2>
            <div class="meta">
                <img class="meta__avatar" src="{{asset('images/post')}}/{{$posts->image}}" alt="author01" />
                <span class="meta__author" style="color:red;" >{{$posts->author}}</span><br>
                <span class="meta__date"><i class="fa fa-calendar-o"></i>{{$posts->created_at}}</span>
                <span class="meta__reading-time" id="viewNumber"><i class="fa fa-clock-o"></i> {{count($posts->luotxem)}} views</span>
            </div>
            <p>{!!$posts->content!!}</p>
        </article>
    </div>
    <button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
</section>
<div class="" style="width: 100%; padding:2rem">
    <h2 style="color: red;">Các bài viết liên quan cùng danh mục: </h2>
    @foreach($postRelative as $item)
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
</div>
@endsection
@section('page-script')
<script type="text/javascript">
    let increaseViewUrl = "{{route('increase.view')}}";
    const data = {
        id: "{{$posts->id}}",
        _token: "{{csrf_token()}}"
    };
    setTimeout(() => {
        fetch(increaseViewUrl, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(responseData => responseData.json())
        .then(productObj => {
            document.getElementById("viewNumber").innerHTML =`<i class="fa fa-clock-o"></i> ${productObj} views`
        })
    }, 3000);
    // setTimeout(function(){
    //     $.ajax({
    //         url: "{{route('increase.view')}}",
    //         type: "POST",
    //         dataType: "html",
    //         data: {
    //             id: "{{$posts->id}}",
    //             _token: "{{csrf_token()}}"
    //         }
    //     }).done(function() {

    //     });
    // },3000)
</script>
    
@endsection