@extends('admin.layouts.app')
@section('titel', 'Home Admin')
@section('css_global')
    {!! \Html::style('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('breadcrumb')
    <section class="content-header">
        @include('admin.partials.breadcrumbs')
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-striped table-bordered nowrap table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Ip</th>
                                <th style="width:15%">Trình duyệt</th>
                                <th>Phương thức</th>
                                <th>Hành động</th>
                                <th>Dữ liệu</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i= 1; @endphp
                            @foreach ($logs as $log)
                                <tr>
                                    <th scope="row" style="width:20px">{{ $log->id }}</th>
                                    <td>{{ isset($log->properties['actor_email']) ?? $log->properties['actor_email'] }}</td>
                                    <td>{{ $log->properties['agent']['ip'] }}</td>
                                    <td>{{ $log->properties['agent']['browser'] }}</td>
                                    <td>{{ $log->properties['agent']['method'] }}</td>
                                    <td>
                                         <div>{{ $log->description }}</div>
                                       <a href="{{ $log->properties['agent']['url']}}"> {{ $log->properties['agent']['url'] }}</a>
                                    </td>
                                    <td>{{ json_encode($log->properties['agent']['body'], JSON_UNESCAPED_UNICODE) }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">
                        {{ $logs->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection()

@section('script')
    {!! \Html::script('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! \Html::script('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    <script>
        $(function() {
            $('#example1').DataTable({
                "bPaginate": false,
                'searching'   : false,
                'ordering'    : false,
                'scrollX' : true
            })
            // $('#example2').DataTable({
            //   'paging'      : true,
            //   'lengthChange': false,
            //   'searching'   : false,
            //   'ordering'    : true,
            //   'info'        : true,
            //   'autoWidth'   : false
            // })
        });
    </script>

@endsection
