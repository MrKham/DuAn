@extends('app')

{{-- @section ('sidebar_category')
active
@endsection --}}


@section('content')
    <section id="widget-grid">
        <div class="card bg-light">
            <div class="card-body">
                <div class="container">
                    <h3>Quản lý dự án</h3>
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
            @include("layouts.elements.table", [
                'url' => url('/ajax/project'),
                'columns' => [
                    ['data' => 'name', 'title' => 'Tên dự án'],
                    ['data' => 'category_real_name', 'title' => 'Tên danh mục'],
                    ['data' => 'created_at', 'title' => 'Ngày khởi tạo'],
                    ['data' => 'updated_at', 'title' => 'Ngày cập nhật'],
                    ['data' => 'status', 'title' => 'Trạng thái'],
                    ['data' => 'slide_home', 'title' => 'Slide show', 'hasFilter' => false],
                    ['data' => 'action', 'title' => 'Thao tác', 'hasFilter' => false],
                ],
                'orderColumn' => "[[2, 'desc']]"
                
            ])
        </div>
    </section>

@endsection

@push('script')
	<script>
	  
 	</script>
@endpush
