@extends('admin.layouts.app')

@section('titel','Home Admin')
@section('css_global')
{!! \Html::style('adminlte/bower_components/select2/dist/css/select2.min.css') !!}
{!! \Html::style('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
<style>
    .form-group {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }
</style>
@endsection

@section('breadcrumb')
<section class="content-header">
    @include('admin.partials.breadcrumbs')
</section>
@endsection()

@section('content')
{!! Form::open(['route' => 'langcustom.store', 'method' => 'POST', 'class' => 'form-horizontal', 'langcustom' => 'form'])
!!}
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{Translate('home')}}</h3>
                </div>
                <div class="box-body changeas">
                    <div class="wrap-content">
                        <div class="form-group col-md-6">
                            <label>{{translate('Key')}}</label>
                            <textarea class="form-control" name="key" rows="3" placeholder="Enter ..."></textarea>
                            @error('key')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{translate('Select one or mutiple language')}}</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" name="option[]">
                                <option value="vi">VietNam</option>
                                <option value="en">English</option>
                                <option value="ja">Nhật Bản</option>
                                <option value="ka">Georgian</option>
                                <option value="ko">Hàn quốc</option>
                                <option value="zh">Trung quốc phồn thể</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"> {{ translate('submit') }}</button>
                </div>
            </div>
        </div><!--End Row-->
        {!! Form::close() !!}
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách dịch</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Key</th>
                                <th>En</th>
                                <th>Vi</th>
                                <th>ja</th>
                                <th>ka</th>
                                <th>ko-KR</th>
                                <th>zh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i= 1; @endphp
                            @foreach ($langcustoms as $langcustom)
                            <tr>
                                <th scope="row" style="width:20px">{{$langcustom->id}}</th>
                                <td>{{$langcustom->key}}</td>
                                <td>{{$langcustom->en}}</td>
                                <td>{{$langcustom->vi}}</td>
                                <td>{{$langcustom->ja}}</td>
                                <td>{{$langcustom->ka}}</td>
                                <td>{{$langcustom->ko}}</td>
                                <td>{{$langcustom->zh}}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#changeKey{{$langcustom->id}}"><i class="fa fa-fw fa-pencil-square-o"></i></a>
                                    <a data-url="{{ route('langcustom.destroy', $langcustom->id) }}" class="removeRecord" id="{{ $langcustom->id }}"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade in" id="changeKey{{$langcustom->id}}" style="display: none; padding-right: 15px;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        {!! Form::open(['route' => ['langcustom.update', $langcustom->id] , 'method' => 'PUT', 'class' => 'form-horizontal', 'langcustom' => 'form'])
                                        !!}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">{{ translate('Change key translate')}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body ">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label for="Key">Key</label>
                                                        <textarea type="text" name="key" value="" class="form-control" id="key" placeholder="key" disabled>{{isset($langcustom->key) ? $langcustom->key : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="en">En</label>
                                                        <textarea type="text" name="en" value="" class="form-control" id="en" placeholder="en">{{isset($langcustom->en) ? $langcustom->en : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="vi">Vi</label>
                                                        <textarea type="text" name="vi" value="" class="form-control" id="vi" placeholder="vi">{{isset($langcustom->vi) ? $langcustom->vi : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ja">ja</label>
                                                        <textarea type="text" name="ja" value="" class="form-control" id="ja" placeholder="vi">{{isset($langcustom->ja) ? $langcustom->ja : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ka">ka</label>
                                                        <textarea type="text" name="ka" value="" class="form-control" id="ka" placeholder="vi">{{isset($langcustom->ka) ? $langcustom->ka : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ko">ko</label>
                                                        <textarea type="text" name="ko" value="" class="form-control" id="ko" placeholder="vi">{{isset($langcustom->ko) ? $langcustom->ko : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="zh">zh</label>
                                                        <textarea type="text" name="zh" value="" class="form-control" id="zh" placeholder="vi">{{isset($langcustom->zh) ? $langcustom->zh : ''}}</textarea>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">
                        {{ $langcustoms->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</section>
@endsection()

@section('script')
{!! \Html::script('adminlte/bower_components/select2/dist/js/select2.full.min.js') !!}
<script type="text/javascript">
    $('.btn-reset-form').on('click', '', function() {
        //$('.form-horizontal').trigger("reset");
        $('.form-horizontal').on('form-horizontal', function() {
            $(this).find('form')[0].reset();
        });
    });
</script>
{!! \Html::script('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
{!! \Html::script('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
<script>
    var editor = CKEDITOR.replace("ckeditor");
    CKFinder.setupCKEditor(editor);
    $(document).ready(function() {
        $('.select2').select2();
    });
    $('#example1').DataTable({
        "bPaginate": false
    })
</script>
@endsection