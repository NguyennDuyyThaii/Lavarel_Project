@extends('layouts.main')
@section('title', "Sửa bài viết")
@section('content')
    <div class="col-md-6 offset-md-3">
        @if(Session::has('post.updated'))
        <div class="alert alert-success">
            {{Session::get('post.updated')}}
        </div>
        @endif
       
       
      
       
  
    
        <form action="{{route('post.post.edit', ['id' => $model->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tiêu đề bài viết</label>
                @if ($errors->has('title'))
                <div class="alert alert-danger">{{$errors->first('title')}} </div>
                <input type="text" style="border:1px solid red;"name="title" class="form-control" value="{{ old('title', $model->title) }}">
                @else
                <input type="text" name="title" class="form-control" value="{{ old('title', $model->title) }}">
                @endif
            </div>
            <div class="form-group">
                <label for="">Danh mục bài viết</label>
                @if ($errors->has('danh_muc_id'))
                <div class="alert alert-danger">{{$errors->first('danh_muc_id')}} </div>
                @endif
                <select name="danh_muc_id" id="">
                    @foreach($cates as $item)
                    @if($model->danh_muc_id == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên tác giả</label>
                @if ($errors->has('author'))
                <div class="alert alert-danger">{{$errors->first('author')}} </div>
                <input type="text" style="border:1px solid red;"name="author" class="form-control" value="{{ old('author', $model->author) }}">
                @else
                <input type="text" name="author" class="form-control" value="{{ old('author', $model->author) }}">
                @endif
            </div>
            <div class="form-group">
                <label for="">Ảnh bài viết</label><br>
                @if ($errors->has('image'))
                <div class="alert alert-danger">{{$errors->first('image')}} </div>
                @endif
                <input type="hidden" value="{{$model->image}}" name="logo">
                <input type="file" accept="image/*" onchange="loadFile(event)" name="image">
                <img id="output" height="150" width="150" src="{{asset('images/post')}}/{{$model->image}}"/>
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
            <div class="form-group">
                <label for="">Miêu tả ngắn bài viết</label>
                @if ($errors->has('short_desc'))
                <div class="alert alert-danger">{{$errors->first('short_desc')}} </div>
                @endif
                <textarea name="short_desc">{{ old('short_desc', $model->short_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Nội dung của bài viết</label>
                @if ($errors->has('content'))
                <div class="alert alert-danger">{{$errors->first('content')}} </div>
                @endif
                <textarea name="content">{{ old('content', $model->content) }}</textarea>
            </div>
            <script>
                CKEDITOR.replace( 'short_desc' );
                CKEDITOR.replace( 'content' );

        </script>
            <div class="text-center">
                <button class="btn btn-sm btn-success" type="submit">Update</button>
                <a href="" class="btn btn-sm btn-warning">Hủy</a>
            </div>
        </form>
    </div>
    
@endsection