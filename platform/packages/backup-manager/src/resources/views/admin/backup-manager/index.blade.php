@extends('admin.layouts.app')
@section('titel','Home Admin')
@section('css_global')

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
                    <form action="{{ route('backup.create') }}" method="post">
                    @csrf <!-- Đây là một directive của Laravel để thêm CSRF token. Nếu bạn không sử dụng Laravel, bạn có thể bỏ qua dòng này -->

                        <!-- Các input fields khác nếu bạn cần -->

                        <button class="btn btn-info" type="submit">Chạy backup</button>
                    </form>
{{--                    <button type="button" href="{{ route('backup.create') }}"--}}
{{--                            class="btn btn-info" >Chạy backup</button>--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>File size</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i= 1; @endphp
                            @foreach ($data['backups'] as $backup)
                            <tr>
                                <th scope="row" style="width:20px">{{ $i }}</th>
                                <td style="width:10%">
                                    {{ $backup->diskName }}
                                </td>
                                <td>{{ $backup->lastModified }}</td>
                                <td>{{ $backup->fileSize }}</td>
                                <td>
                                    @if ($backup->downloadLink)
                                        <a class="btn btn-sm btn-link" data-button-type="download" href="{{ $backup->downloadLink }}">
                                            <i class="la la-cloud-download"></i> Download
                                        </a>
                                    @endif
                                    <a class="btn btn-sm btn-link" data-button-type="delete" href="{{ $backup->deleteLink }}">
                                        <i class="la la-trash-o"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">

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
        $(function () {
            $('#example1').DataTable({
                "bPaginate": false,
                'searching'   : false
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
