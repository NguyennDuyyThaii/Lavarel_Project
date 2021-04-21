@extends('layouts.main')
@section('title', "Tạo mới bài viết")
@section('content')
    <div class="col-md-6 offset-md-3">
        @if(Session::has('vov.added'))
        <div class="alert alert-success">
            {{Session::get('vov.added')}}
        </div>
        @endif
         
        <form action="{{route('vov.add')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Link Bài Viết</label>
                @if ($errors->has('link'))
                <div class="alert alert-danger">{{$errors->first('link')}} </div>
                <input type="text" style="border:1px solid red;" name="link"  class="form-control" value="">
                @else
                <input type="text" name="link"  class="form-control" value="">
                @endif
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-success" type="submit">Tạo mới</button>
            </div>
        </form>
    </div>
    
@endsection