@extends('layouts.main')
@section('title', "Tạo mới danh mục")
@section('content')
    <div class="col-md-6 offset-md-3">
        <form action="{{route('cate.add')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="detail" class="form-control">{{ old('detail') }}</textarea>
                @if ($errors->has('detail'))
                    <span class="text-danger">{{$errors->first('detail')}}</span>
                @endif
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-success" type="submit">Tạo mới</button>
                <a href="" class="btn btn-sm btn-warning">Hủy</a>
            </div>
        </form>
    </div>
    
@endsection