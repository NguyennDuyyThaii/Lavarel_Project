@extends('layouts.main')
@section('title', "Sửa danh mục")
@section('content')
    <div class="col-md-6 offset-md-3">
        @if(Session::has('category.updated'))
        <div class="alert alert-success">
            {{Session::get('category.updated')}}
        </div>
        @endif
       
      
        <form action="{{route('category.post.edit', ['id' => $model->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                @if ($errors->has('name'))
                <div class="alert alert-danger">{{$errors->first('name')}} </div>
                <input type="text" name="name" style="border:1px solid red;" class="form-control" value="{{ old('name', $model->name) }}">
                @else
                <input type="text" name="name" class="form-control" value="{{ old('name', $model->name) }}">
                @endif
               
            </div>
            <div class="form-group">
                <label for="">Ảnh danh mục</label><br>
                @if ($errors->has('image'))
                <div class="alert alert-danger">{{$errors->first('image')}} </div>
                @endif
                <input type="file" accept="image/*" onchange="loadFile(event)" name="image">
                <img id="output" height="150" width="150" src="{{asset('images/category')}}/{{$model->image}}"/>
                <script>
                  var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                      URL.revokeObjectURL(output.src) // free memory
                    }
                  };
                </script>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-success" type="submit">Sửa danh mục</button>
                <a href="" class="btn btn-sm btn-warning">Hủy</a>
            </div>
        </form>
    </div>
    
@endsection