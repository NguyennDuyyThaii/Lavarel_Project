@extends('layouts.main')
@section('page-title', 'Danh sách Bài viết')
    
@section('content')

<form action="" method="get">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" name="keyword" value="{{$keyword}}">
            </div>
        </div>
    </div>
</form>
@if(Session::has('post.deleted'))
<div class="alert alert-success">
    {{Session::get('post.deleted')}}
</div>
@endif
<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Tiêu đề bài viết</th>
        <th>Danh mục</th>
        <th>Hình ảnh bài viết</th>
        <th>Tác giả</th>
        <th>
            <a href="{{route('post.add')}}">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($posts as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                {{$item->title}} 
            </td>
            <td>
                {{$item->danhmuc->name}} 
            </td>
            <td><img src="{{asset('images/post')}}/{{$item->image}}" alt="" height="150" width="150"></td>
            {{-- <td>{{count($item->products)}}</td> --}}
            <td>
                {{$item->author}} 
            </td>
            <td>
                <a href="{{route('post.edit', ['id' => $item->id])}}" class="btn btn-sm btn-info">Sửa</a> 
                <a href="{{route('post.delete', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <div class="col-xs-4 offset-xs-8 pull-right">
        {{$posts->links()}}
    </div>

@endsection