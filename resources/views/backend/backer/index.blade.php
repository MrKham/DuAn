@extends('app')

{{-- @section ('sidebar_category')
active
@endsection --}}


@section('content')
    <section id="widget-grid">
        <div class="card bg-light">
            <div class="card-body">
                <div class="container">
                    <h3>Project's Backers</h3>
                </div>
            </div>
        </div>
        <div class="widget-body p-4">
            @if (Session::has('flash_message'))
                <div class="alert alert-{!! Session::get('flash_level') !!}">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
            @include('custom.log.success_log',['name' => 'success'])
            <div style="padding-bottom: 15px;">
                <div style="width: 30%; margin-bottom: 15px;">
                    {!! Form::lbSelect('project_id', '', \App\Models\Project::allOptionOnline(), 'Dự án') !!}
                </div>
                <button type="button" class="btn btn-primary" id="refund123">Refund</button>
                <button type="button" class="btn btn-primary" id="mark-refund123">Mark As Refunded</button>
                <button type="button" class="btn btn-primary" id="export_backer12">Export</button>
            </div>
            @include("layouts.elements.table", [
                'url' => url('/ajax/backer'),
                'columns' => [
                    ['data' => 'name', 'title' => 'Thành viên ủng hộ'],
                    ['data' => 'email', 'title' => 'Email'],
                    ['data' => 'project_name', 'title' => 'Dự án', 'hasFilter' => false],
                    ['data' => 'amount', 'title' => 'Số tiền'],
                    ['data' => 'transaction_no', 'title' => 'Transaction No', 'hasFilter' => true],
                    ['data' => 'transaction_ref', 'title' => 'Transaction Ref', 'hasFilter' => true],
                    ['data' => 'status', 'title' => 'Trạng thái', 'hasFilter' => true],
                    ['data' => 'created_at', 'title' => 'Thời gian'],
                    ['data' => 'address', 'title' => 'Địa điểm nhận quà'],
                    ['data' => 'action', 'title' => 'Thao tác', 'hasFilter' => false],
                ],
                
            ])
        </div>
    </section>

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css"/>
    <style type="text/css">
        .selected {
            background-color: #acbad4 !important;
        }

        tr {
            /*cursor: pointer;*/
        }
    </style>
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#project_id").select2();

            $('tbody').on('click', 'tr', function () {
                // alert(1);
                // var id = this.id;
                // var index = $.inArray(id, selected);

                // if ( index === -1 ) {
                //     selected.push( id );
                // } else {
                //     selected.splice( index, 1 );
                // }

                // $(this).toggleClass('selected');
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $('#project_id').change(function (e) {
                var url = '{{ url('/ajax/backer') }}';
                url += '?project_id=' + $(this).val();
                $('.table.table-striped.table-bordered').DataTable().ajax.url(url).load();
                // $('.table.table-striped.table-bordered').draw();
            });

            $('#export_backer12').click(function (e) {
                var projectId = $("select[name='project_id']").val();
                if (projectId) {
                    window.location.href = '{{ url('export_backers') }}' + '/' + projectId;
                } else {
                    window.location.href = '{{ url('export_backers') }}' + '/all';
                }
            });

            $('#refund123').click(function (e) {
                var projectId = $("select[name='project_id']").val();
                if (projectId) {
                    var check = confirm("Hoàn tiền cho tất cả giao dịch của dự án này");
                    if (check) {
                        JS_Library.showloading();
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/ajax/send-mail-refund-all-transaction-in-project') }}",
                            data: {
                                project_id: projectId,
                            },
                            success: function (res) {
                                if (res.status == 'success') {
                                    JS_Library.notify('Gửi yêu cầu hoàn tiền cho các giao dịch của dự án thành công, kiểm tra email để hoàn thành yêu cầu', 'success');
                                    $('.table.table-striped.table-bordered').DataTable().ajax.reload();
                                } else {
                                    JS_Library.notify(res.message, 'error');
                                }
                            },
                            error: function (xhr) {
                                JS_Library.notify(xhr.statusText, 'error');
                            },
                            complete: function () {
                                JS_Library.hideloading();
                            }
                        });
                    }
                } else {
                    JS_Library.notify('Vui lòng chọn dự án để refund', 'error');
                }
            });

            $('#mark-refund123').click(function (e) {
                var projectId = $("select[name='project_id']").val();
                if (projectId) {
                    var check = confirm("Chuyển trạng thái hoàn tiền cho tất cả giao dịch của dự án này");
                    if (check) {
                        JS_Library.showloading();
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/ajax/mark-refund-all-transaction-in-project') }}",
                            data: {
                                project_id: projectId
                            },
                            success: function (res) {
                                if (res.status == 'success') {
                                    JS_Library.notify('Chuyển trạng thái hoàn tiền cho các giao dịch của dự án thành công', 'success');
                                    $('.table.table-striped.table-bordered').DataTable().ajax.reload();
                                } else {
                                    JS_Library.notify(res.message, 'error');
                                }
                            },
                            error: function (xhr) {
                                JS_Library.notify(xhr.statusText, 'error');
                            },
                            complete: function () {
                                JS_Library.hideloading();
                            }
                        });
                    }
                } else {
                    JS_Library.notify('Vui lòng chọn dự án để mark as refund', 'error');
                }
            });
        });
    </script>
@endpush
