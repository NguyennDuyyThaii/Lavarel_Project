@extends('layouts.main')
@section('page-title', 'Danh sách tổng hợp')
    
@section('content')
@if(Session::has('login.success'))
<div class="alert alert-success">
    {{Session::get('login.success')}}
</div>
@endif
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fas fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Người dùng đăng  kí</span>
          <span class="info-box-number">{{count($u)}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa  fas fa-newspaper"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Bài viết</span>
          <span class="info-box-number">{{count($p)}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Danh mục</span>
          <span class="info-box-number">{{count($dm)}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
</div>

<div class="row">
  <canvas id="barChart"></canvas>
</div>
@endsection

@section('chart')
<script>
  $(function(){
    var datas = <?php echo json_encode($datas); ?>;
    var barCanvas = $("#barChart");
    var barChart = new Chart(barCanvas, {
      type: "bar",
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [
          {
            label: 'TỔNG LƯỢT XEM THEO TỪNG THÁNG - 2021', 
            data:datas,
            backgroundColor: ['red', 'green', 'blue', 'magenta', 'yellow','violet','purple','orange','pink','silver','gold','brown']
          }
        ]
      }, 
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  })
  </script>
@endsection

