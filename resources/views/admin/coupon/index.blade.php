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
                    <button data-toggle="modal" data-target="#modal-default" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('common.add')</button>
                    <button class="btn btn-primary delete_all_checkbox" data-url="{{ route('coupon.delete_all') }}">Delete All Selected</button>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="master_checkbox" /></th>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Duration</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i= 1; @endphp
                        @foreach ($coupons as $coupon)
                            <tr>
                                <th><input type="checkbox" class="sub_chk" id="sub_chk_rm" name="checkRemoveAll[]" data-id="{{$coupon->id}}" /></th>
                                <th>{{ $i++ }}</th>
                                <th scope="row">{{$coupon->name}}</th>
                                <td>{{$coupon->discount_code}}</td>
                                <td>{{ number_format($coupon->discount, 2, '.', '') }}</td>
                                <td>{{$coupon->duration}}</td>
                                <td>{{$coupon->total_code}}</td>
                                <td>
                                    <a href="#" data-url="{{ route('coupon.destroy', $coupon->id) }}" class="removeRecord"
                                       id="{{ $coupon->id }}"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">
                        {{ $coupons->appends(request()->all())->links() }}
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
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="productForm" data-url="{{ route('coupon.store') }}">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="discount_name" name="name" placeholder="">

                                    <i class="error_validate text-danger" id="erorr_name"></i>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Duration</label>
                                <input type="date" timezone="[Asia/Ho_Chi_Minh]" class="form-control" id="discount_duration" name="duration" placeholder="">

                                    <i class="error_validate text-danger" id="error_duration"></i>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount</label>
                                <input type="text" class="form-control amount_money" id="amount_money" name="discount" placeholder="">

                                    <i class="error_validate text-danger" id="erorr_discount"></i>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Total</label>
                                <input type="text" class="form-control amount_money" id="total_code"  name="total_code" placeholder="">

                                    <i class="error_validate text-danger"></i>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea  class="form-control" id="description_discount" rows="5"  name="description" placeholder=""></textarea>

                                    <i class="error_validate text-danger"></i>

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
    {!! \Html::script('js/format_mony.js') !!}
    {!! \Html::script('js/checkbox_remove_all.js') !!}
    <script>
        $(function () {
            $('#example1').DataTable({
                "bPaginate": false,
                'searching'   : false,
                'ordering'    : false,
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

    <script>
        $(document).ready(function (){
            $('#btn_add_form').click(function (e){
                e.preventDefault();
                let url     = $("#productForm").data('url');
                console.log(url)
                let name    = $("#discount_name").val();
                let duration    = $("#discount_duration").val();
                let discount_html    = $("#amount_money").val();
                let discount = discount_html.replace(/,/g , '');
                let total_code = $("#total_code").val();
                let description_discount = $("#description_discount").val();

                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        _method: 'POST',
                        name : name,
                        duration : duration,
                        discount : discount,
                        total_code: total_code,
                        description: description_discount,
                        "_token": "{{ csrf_token() }}"
                    },
                    url,
                    success: function (data) {
                        window.location.reload();
                    }, error: function(data){
                        // console.log(typeof data.responseJSON.errors);
                        let messages = data.responseJSON.errors;
                    //    console.log(messages);
                    //    console.log(messages.duration);
                    //    console.log(messages.discount[0]);
                        if (typeof messages.duration !== 'undefined') {
                            let duration_error    = $("#erorr_duration").text(messages.duration[0]);
                        }
                        if (typeof messages.name !== 'undefined') {
                            let name_error    = $("#erorr_name").text(messages.name[0]);
                        }
                        if (typeof messages.discount !== 'undefined') {
                            let discount_error = $("#error_discount").text(messages.discount[0]);
                        }
                    }
                });
            });
        });
    </script>


@endsection
