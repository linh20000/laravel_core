@extends('admin.layouts.app')

@section('titel', 'Home Admin')
@section('css')
@endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            {{--      Dashboard --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Staff</span>
                        <span class="info-box-number">{{ $totalUser }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Customers</span>
                        <span class="info-box-number"></span>
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
                        <span class="info-box-text">Discount Code</span>
                        <span class="info-box-number"></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            {{--    <div class="col-md-3 col-sm-6 col-xs-12"> --}}
            {{--      <div class="info-box"> --}}
            {{--        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span> --}}

            {{--        <div class="info-box-content"> --}}
            {{--          <span class="info-box-text">New Members</span> --}}
            {{--          <span class="info-box-number">2,000</span> --}}
            {{--        </div> --}}
            {{--        <!-- /.info-box-content --> --}}
            {{--      </div> --}}
            {{--      <!-- /.info-box --> --}}
            {{--    </div> --}}
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Biểu đồ thu nhập</h3>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                @if (auth()->user()->hasRole('super-admin'))
                  <div class="box box-info">
                      <div class="box-header">
                          <i class="fa fa-envelope"></i>
                          <h3 class="box-title">Gửi mail tới toàn bộ nhân viên</h3>
                          <!-- tools box -->
                          <div class="pull-right box-tools">
                              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                  title="Remove">
                                  <i class="fa fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                      </div>
                      <div class="box-body">
                          <form action="" method="post" id="sendMail">
                            @csrf
                              <div class="form-group">
                                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                                  <span class="error error_subject"></span>
                              </div>
                              <div>
                                  <textarea class="textarea" placeholder="Message" name="message"
                                      style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                      <span class="error error_message"></span>
                              </div>
                          </form>
                      </div>
                      <div class="box-footer clearfix">
                          <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                              <i class="fa fa-arrow-circle-right"></i></button>
                      </div>
                  </div>
                @endif
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
@endsection
{{-- end content --}}

@section('script')

    {!! \Html::script('adminlte/dist/js/demo.js') !!}
    {!! \Html::script('js/chart.js') !!}

    <script>
        $(document).ready(function() {
          $('#sendEmail').on('click', function() {
            if ($('input[name=subject]').val() == '') {
              $('.error_subject').text('Vui lòng nhập tên chủ thể').css({'color':'red'});
            }
            if ($('textarea[name=message]').val() == '' ) {
              $('.error_message').text('Vui lòng nhập nội dung' ).css({'color':'red'})  ;
            } 
            if ($('input[name=subject]').val() != '' && $('textarea[name=message]').val() != '' ) {
              $('#sendMail').submit();
            }
          })
            $(".removeRecord").click(function() {
                let url = $(this).data('url');
                console.log(url);
                swal({
                        title: "Bạn có chắc chắn không?",
                        text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp tưởng tượng này!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'DELETE',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    _method: 'DELETE',
                                    "_token": "{{ csrf_token() }}"
                                },
                                url,
                                success: function(data) {
                                    window.location.reload();
                                }
                            });
                        }
                    });
            });
        });
        var data = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9',
                'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],
            datasets: [{
                label: 'Số lượng đặt hàng qua từng tháng',
                data: [
                    {{ isset($January) ? $January : 0 }},
                    {{ isset($February) ? $February : 0 }},
                    {{ isset($March) ? $March : 0 }},
                    {{ isset($April) ? $April : 0 }},
                    {{ isset($May) ? $May : 0 }},
                    {{ isset($June) ? $June : 0 }},
                    {{ isset($July) ? $July : 0 }},
                    {{ isset($August) ? $August : 0 }},
                    {{ isset($September) ? $September : 0 }},
                    {{ isset($October) ? $October : 0 }},
                    {{ isset($November) ? $November : 0 }},
                    {{ isset($December) ? $December : 0 }},
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.6)', // Màu nền cột
                borderColor: 'rgba(54, 162, 235, 1)', // Màu viền cột
                borderWidth: 1 // Độ rộng viền cột
            }]
        };
        var areaChartData = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9',
                'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],
            datasets: [{
                    label: 'Lượt đặt hàng',
                    fillColor: 'rgba(0, 0, 0, 1)',
                    strokeColor: 'rgba(0, 0, 0, 1)',
                    pointColor: 'rgba(0, 0, 0, 1)',
                    pointStrokeColor: 'rgba(0, 0, 0, 1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(0, 0, 0, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    data: [
                        {{ isset($January) ? $January : 20 }},
                        {{ isset($February) ? $February : 20 }},
                        {{ isset($March) ? $March : 20 }},
                        {{ isset($April) ? $April : 20 }},
                        {{ isset($May) ? $May : 20 }},
                        {{ isset($June) ? $June : 20 }},
                        {{ isset($July) ? $July : 20 }},
                        {{ isset($August) ? $August : 20 }},
                        {{ isset($September) ? $September : 20 }},
                        {{ isset($October) ? $October : 20 }},
                        {{ isset($November) ? $November : 20 }},
                        {{ isset($December) ? $December : 20 }},
                    ],
                },
                {
                    label: 'Thu nhập',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    backgroundColor: 'rgba(0, 166, 90, 0.6)',
                    data: [
                        {{ isset($January) ? $January : 30 }},
                        {{ isset($February) ? $February : 30 }},
                        {{ isset($March) ? $March : 30 }},
                        {{ isset($April) ? $April : 30 }},
                        {{ isset($May) ? $May : 30 }},
                        {{ isset($June) ? $June : 30 }},
                        {{ isset($July) ? $July : 30 }},
                        {{ isset($August) ? $August : 30 }},
                        {{ isset($September) ? $September : 30 }},
                        {{ isset($October) ? $October : 30 }},
                        {{ isset($November) ? $November : 30 }},
                        {{ isset($December) ? $December : 30 }},
                    ],
                }
            ]
        }
        // Cấu hình biểu đồ
        var options = {
            scales: {
                y: {
                    beginAtZero: true // Bắt đầu từ 0 trên trục y
                }
            }
        };

        // Lấy thẻ canvas và vẽ biểu đồ
        var ctx = document.getElementById('lineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Loại biểu đồ cột
            data: areaChartData,
            options: options
        });
    </script>

@endsection
