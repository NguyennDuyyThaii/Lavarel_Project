@extends('layouts.main')
@section('page-title', 'Danh sách người dùng!')
    
@section('content')


<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Tên người dùng</th>
        <th>Email</th>
        <th>Trạng thái</th>
    </thead>
    <tbody>
        @foreach($users as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                {{$item->name}} 
            </td>
            <td>
                {{$item->email}} 
            </td>
            <td>
                @if($item->is_verified == 0)
                    <b>Chưa xác thực email</b>
                @else
                <b>Đã xác thực email</b>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection