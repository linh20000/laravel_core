@extends('admin.layouts.app')

@section('titel','Home Admin')
@section('css_global')
    {!! \Html::style('adminlte/bower_components/select2/dist/css/select2.min.css') !!}
@endsection

@section('breadcrumb')
    <section class="content-header">
        @include('admin.partials.breadcrumbs')
    </section>
@endsection

@section('content')
    <div class="">

        <div class="col-lg-12">
            <div class="box">
                <div class="box-footer">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="check_checkbox  btn btn-info pull-left">Chọn tất cả</button>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    @php
                        $route = empty($role) ? 'rolepermission.store' : ['rolepermission.update', $role->id];
                        $method = empty($role) ? 'POST' : 'PUT';
                    @endphp
                    {!! Form::open(['route' => $route, 'method' => $method, 'class' => 'form-horizontal', 'rolepermission' => 'form']) !!}


                    <div class="form-group">
                        <label for="input-1" class="col-sm-1 col-form-label">Role</label>
                        <div class="col-sm-11">
                            {{ Form::text('name', $role->name  ?? '', ['class' => 'form-control']) }}
                            @if ($errors->has('name'))
                              <i class="error_validate">{{ $errors->first('name') }}</i>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ $role->id }}" name="roleId">
                    </div>


                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">

                                @foreach($permissionGroupName as $groupName)
                                    <div class="col-sm-3">
                                        <h4>
                                            <label>
                                                {{ ucfirst($groupName) }}
                                            </label>
                                        </h4>

                                        @foreach($permissionsAll[$groupName] as $permissionGroup => $permission)

                                                <div class="checkbox small">
                                                    <label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <input name="permission[]"
                                                               value="{{ $permission['id'] }}"
                                                               type="checkbox"
                                                               {{ isset($rolePermissionByUser['web'][$groupName][$permission['id']]['id']) == $permission['id'] ? 'checked' : '' }}
                                                        >
                                                        {{ $permission['name'] }}
                                                    </label>
                                                </div>

                                        @endforeach
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                        <div class="box-footer">
                            <div class="form-group row">
                                <label for="input01" class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary"> Save</button>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div><!--End Row-->
    @endsection()

    @section('script')
    <script>
        $(document).ready(function() {
            $(".check_checkbox").click(function() {
                var isChecked = $(this).hasClass("checked");
                $("input[type='checkbox'][name='permission[]']").prop("checked", !isChecked);
                if ($(this).hasClass("checked")) {
                $(this).text("Chọn tất cả");
                } else {
                    $(this).text("Bỏ chọn");
                }
                $(this).toggleClass("checked", !isChecked);

            });
        });
    </script>
    @endsection
