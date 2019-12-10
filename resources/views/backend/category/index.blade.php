@extends('app')

@section ('sidebar_category')
active
@endsection


@section('content')
    <section id="widget-grid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-light">
                    <div class="card-body">
                        <a href="{!! url('category/create') !!}" class="btn btn-info">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
                    </div>
                </div>
                @include('custom.log.err_log',['name' => 'delete'])
                @include('custom.log.success_log',['name' => 'success'])
                @include('custom.log.new_warning_log',['name' => 'warning'])
            </div>
            <article class="col-lg-12">
                <div>
                    <div class="widget-body no-padding">
                        @include("layouts.elements.table", [
                             'url' => url('/ajax/category'),
                             'columns' => [
                                 ['data' => 'image', 'title' => 'Ảnh đại diện', 'hasFilter' => false],
                                 ['data' => 'name_vi', 'title' => 'Tên tiếng việt'],
                                 ['data' => 'name_en', 'title' => 'Tên tiếng anh'],
                                 ['data' => 'description', 'title' => 'Mô tả'],
                                 ['data' => 'parent_name', 'title' => 'Danh mục cha'],
                                 ['data' => 'action', 'title' => 'Thao tác', 'hasFilter' => false],
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
