@extends('app')

@section ('contentheader_title')
    Black list
@endsection

@section ('sidebar_blacklist')
    active
@endsection


@section('content')
    <section id="widget-grid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-light">
                    <div class="card-body">
                        <a href="{!! url('blacklists/create') !!}" class="btn btn-info">
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
                            'url' => url('/ajax/blacklist'),
                            'columns' => [
                                ['data' => 'email', 'title' => trans('Email')],
                                ['data' => 'created_at', 'title' => trans('Ngày tạo')],
                                ['data' => 'updated_at', 'title' => trans('Ngày cập nhật')],
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
