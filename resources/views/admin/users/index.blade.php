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
          <button type="button" onclick="window.location='{{ route('user.create') }}'" class="btn btn-info">@lang('common.add')</button>
          <button class="btn btn-primary delete_all_checkbox" data-url="{{ route('user.delete_all') }}">Delete All Selected</button>

          <div class="dropdown btn-outline export-dropdown float-right d-inline-block mr-2">
              <a class="btn btn-white btn-sm btn-pill-export dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cloud-download"></i> <span>Export</span> <i class="las la-angle-down pl-2"></i></a>
              <ul class="dropdown-menu dropdown-menu-right export-button">
                  <li><a href="{{ route('export.users') }}" class="excel"><i class="las la-file-excel pr-2"></i>Excel</a></li>
                {{--   <li><a href="#" class="csv"><i class="las la-file-csv pr-2"></i>CSV</a></li>--}}
              </ul>
          </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th><input type="checkbox" id="master_checkbox" /></th>
            <th>STT</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @php $i= 1; @endphp
            @foreach ($users as $user)
              <tr>
                <th><input type="checkbox" class="sub_chk" id="sub_chk_rm" name="checkRemoveAll[]" data-id="{{$user->id}}" /></th>
                <th>{{ $i++ }}</th>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.show', $user->id) }}"><i class="fa fa-fw fa-user"></i></a>
                    <a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a>
                    <a href="#" data-url="{{ route('user.destroy', $user->id) }}" class="removeRecord"
                      id="{{ $user->id }}"><i class="fa fa-fw fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
          <div class="col-sm-12 text-right">
            {{ $users->appends(request()->all())->links('pagination::bootstrap-4') }}
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
{!! \Html::script('js/checkbox_remove_all.js') !!}
<script>
    $(function () {
      $('#example1').DataTable({
        "bPaginate": false,
        "searching"   : false,
        "ordering"    : false,
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
