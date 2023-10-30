@extends('admin.layouts.app')
@section('titel','Home Admin')
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
{{--                    <button type="button" onclick="window.location='{{ route('rolepermission.create') }}'" class="btn btn-info">@lang('common.add')</button>--}}
                    <button data-toggle="modal" data-target="#modal-default" class="btn btn-info"><i class="fa fa-plus"></i>@lang('common.add')</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i= 1; @endphp
                        @foreach ($roles as $role)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>

                                <td>
                                    <a href="{{ route('rolepermission.edit', $role->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a>
                                    <a href="#" data-url="{{ route('rolepermission.destroy', $role->id) }}" class="removeRecord"
                                       id="{{ $role->id }}"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">
                        {{ $roles->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thêm nhóm quyền</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="productForm" method="post" action="{{ route('rolepermission.store') }}" data-url="{{ route('rolepermission.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Role</label>
                                <input type="text" class="form-control" id="roleName" name="roleName" placeholder="Enter role name" required>
                                <i class="error_validate text-danger" id="erorr_name"></i>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" id="btn_add_form" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


@endsection()

@section('script')
    {!! \Html::script('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! \Html::script('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    <script>
        $(function () {
            $('#example1').DataTable({
                "bPaginate": false,
                'searching'   : false,
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
