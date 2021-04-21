@extends('layouts.main')
@section('page-title', 'Danh sách danh mục')
    
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
@if(Session::has('category.deleted'))
<div class="alert alert-success">
    {{Session::get('category.deleted')}}
</div>
@endif
<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Ảnh danh mục</th>
        <th>Số lượng bài viết của danh mục</th>
        <th>
            <a href="{{route('category.add')}}">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($cates as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                {{$item->name}} 
            </td>
            <td><img src="{{asset('images/category')}}/{{$item->image}}" alt="" height="150" width="150"></td>
         
                 <td>{{count($item->posts)}}</td>
            
            <td>
                <a href="{{route('category.edit', ['id' => $item->id])}}" class="btn btn-sm btn-info">Sửa</a>
                <a href="{{route('category.delete', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <div class="col-xs-4 offset-xs-8 pull-right">
        {{$cates->links()}}
    </div>

@endsection