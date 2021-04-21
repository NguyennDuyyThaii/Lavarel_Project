@extends('layouts.main')
@section('content')
    <table class="table table-stripped">
        <thead>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Tổng giá trị</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($orders as $item) 
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->customer_name}}</td>
                    <td>{{$item->customer_phone_number}}</td>
                    <td>{{number_format($item->total_price, 0, '.', '.') . " vnđ"}}</td>
                    <td>
                        <div class="modal fade" id="orderDetail-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                <table class="table table-hovered">
                                    <thead>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá sản phẩm</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->products as $key => $pro)
                                            @php
                                                $orderDetailInfo = $item->order_details[$key];
                                            @endphp
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$pro->name}}</td>
                                                <td>
                                                    <img src="{{asset($pro->image)}}" width="70">
                                                </td>
                                                <td>{{$orderDetailInfo->quantity}}</td>
                                                <td>
                                                    {{number_format($orderDetailInfo->unit_price, 0, '.', '.') . " vnđ"}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">Tổng giá:</td>
                                            <td>
                                                {{number_format($item->total_price, 0, '.', '.') . " vnđ"}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#orderDetail-{{$item->id}}">Chi tiết</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection