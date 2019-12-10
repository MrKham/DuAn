@extends('app')
@section ('contentheader_title')
    Product management
@endsection

@section ('sidebar_user')
    active
@endsection


@section('content')
    <section id="widget-grid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-light">
                    <div class="card-body">
                        <a href="{!! url('user/create') !!}" class="btn btn-info">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
                    </div>
                </div>
                @include('custom.log.err_log',['name' => 'delete'])
                @include('custom.log.success_log',['name' => 'success'])
            </div>
            <article class="col-lg-12">
                <div>
                    <div class="widget-body no-padding">
                        @include("layouts.elements.table", [
                            'url' => url('/ajax/user'),
                            'columns' => [
                                ['data' => 'name', 'title' => trans('Tên người dùng')],
                                ['data' => 'avatar', 'title' => trans('Ảnh đại diện'), 'hasFilter' => false, 'css' => 'min-width: 120px'],
                                ['data' => 'email', 'title' => trans('Email')],
                                ['data' => 'address', 'title' => trans('Địa chỉ')],
                                ['data' => 'telephone', 'title' => trans('Số điện thoại')],
                                ['data' => 'company', 'title' => trans('Công ty')],
                                ['data' => 'website', 'title' => trans('Website')],
                                ['data' => 'status', 'title' => trans('Trạng thái')],
                                ['data' => 'created_at', 'title' => trans('Ngày tạo')],
                                ['data' => 'action', 'title' => trans('Hành động'), 'hasFilter' => false],
                            ],
                        ])
                    </div>
                </div>
            </article>
        </div>
    </section>

@endsection

@push('script')
<script>

</script>
@endpush
