@extends('layouts.main')
@section('page-title', 'Danh sách sản phẩm')
    
@section('content')

<form action="" method="get">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" name="keyword" value="">
            </div>
        </div>
    </div>
</form>
<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Tên danh mục</th>
        <th>Ảnh</th>
        <th>Doanh số bán được</th>
        <th>
            <a href="{{route('cate.add')}}">Tạo mới</a>
        </th> 
    </thead>
    <tbody>
    

        @foreach($products as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                {{$item->name}}
            </td>
            <td>{{$item->price}}</td>
            <td>{{$item->category->name}}</td>
            <td>
                <img src="{{asset($item->image)}}" width="70">
            </td>
           <td>1</td>
            <td>
                <a href="{{route('cate.edit', ['id' => $item->id])}}" class="btn btn-sm btn-info">Sửa</a>
                <a href="{{route('cate.remove', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
     
    </tbody>
</table>

    <div class="col-xs-4 offset-xs-8 pull-right">
        {{-- {{$cates->links()}} --}}
    </div>

@endsection