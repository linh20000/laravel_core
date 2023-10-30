@extends('admin.layouts.app')

@section('titel','Home Admin')
@section('css_global')
    {!! \Html::style('adminlte/plugins/iCheck/all.css') !!}
@endsection

@section('breadcrumb')
    <section class="content-header">
        @include('admin.partials.breadcrumbs')
    </section>
@endsection()

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         @if (!empty($user->avatar))
                            src="{{ asset('storage/' . $user->avatar) }}"
                         @else
                            src="{{ asset('storage/adminlte/dist/img/avatar5.png') }}"
                         @endif
                         alt="User profile picture">
                    <div class="text-center"><i>Kích thước tiêu chuẩn 50 x 50</i></div>
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->email }}</p>
                    <form action="{{ route('profile.user', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="imgAvatar" name="avatar"  class="btn btn-primary btn-block" type="file">
                        @if ($errors->has('avatar'))
                            <i class="text-danger">{{ $errors->first('avatar') }}</i>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block"><b>Upload</b></button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#userprofile" data-toggle="tab">Thông tin</a></li>
                    <li><a href="#changePassword" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="userprofile">
                        <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="isProfile" value="true">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="name" name="name" value="{{ $user->name }}" class="form-control" id="inputName" placeholder="Name">
                                    @if ($errors->has('name'))
                                        <i class="text-danger">{{ $errors->first('name') }}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <i class="text-danger">{{ $errors->first('email') }}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone" class="col-sm-2 control-label">Phone Number</label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" name="phone_number" id="inputPhone" value="{{ $user->phone_number }}" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                        @if ($errors->has('phone_number'))
                                            <i class="text-danger">{{ $errors->first('phone_number') }}</i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="col-sm-2 control-label">Địa chỉ</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address" id="inputAddress" placeholder="Address">{{ $user->address }}</textarea>
                                    @if ($errors->has('address'))
                                        <i class="text-danger">{{ $errors->first('address') }}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBirthday" class="col-sm-2 control-label">
                                    Ngày sinh
                                </label>

                                <div class="col-sm-10">
                                    <input type="date" name="birth_day" value="{{ date('Y-m-d', strtotime($user->birth_day)) }}" class="form-control" id="inputBirthday" placeholder="=Birth day">
                                    @if ($errors->has('birth_day'))
                                        <i class="text-danger">{{ $errors->first('birth_day') }}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="changePassword">
                        <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="isProfile" value="true">
                            <input type="hidden" name="name" value="{{ $user->name }}" class="form-control" id="inputName" placeholder="Name">
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <i class="text-danger">{{ $errors->first('password') }}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                                    @if ($errors->has('password_confirmation'))
                                        <i class="text-danger">{{ $errors->first('password_confirmation') }}</i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>

@endsection()

@section('script')
    {!! \Html::script('adminlte/plugins/iCheck/icheck.min.js') !!}
    {!! \Html::script('adminlte/plugins/input-mask/jquery.inputmask.js') !!}
    {!! \Html::script('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') !!}
    <script>
        $('[data-mask]').inputmask();
    </script>
@endsection


