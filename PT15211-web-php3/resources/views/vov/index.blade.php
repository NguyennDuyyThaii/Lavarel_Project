@extends('layouts.main')
@section('page-title', 'Danh sách Bài viết CRAWL VOV')
    
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
<hr/>

@if(Session::has('vov.deleted'))
<div class="alert alert-success">
    {{Session::get('vov.deleted')}}
</div>
@endif
<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>TITLE</th>
        <th>SUMMARY</th>
        <th>CONTENT</th>
        <th>DATE</th>
        <th>BREADCRUMB</th>
        <th>AUTHOR</th>
        <th>
            <a href="{{route('vov.add')}}">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($vov as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                {{$item->title}} 
            </td>
            <td>
                {{$item->summary}}
            </td>
            <td>
                {{$item->content}} 
            </td>
            <td>
                {{$item->date}} 
            </td>
            <td>
                {{$item->breadcrumb}} 
            </td>
            <td>
                {{$item->author}} 
            </td>
            <td>
                {{-- <a href="{{route('post.edit', ['id' => $item->id])}}" class="btn btn-sm btn-info">Sửa</a>  --}}
                <a href="{{route('vov.delete', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <div class="col-xs-4 offset-xs-8 pull-right">
        {{$vov->links()}}
    </div>

@endsection