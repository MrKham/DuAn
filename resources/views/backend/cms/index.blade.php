@extends('app')

{{-- @section ('sidebar_category')
active
@endsection --}}


@section('content')
    <section id="widget-grid">
        <div class="card bg-light p-4">
            <h3>Admin CMS</h3>
            <a href="{{ url('/admin/cms/create') }}" class="btn btn-info" style="width: 150px;">
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm nội dung
            </a>
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
                'url' => url('/ajax/cms'),
                'columns' => [
                    ['data' => 'image', 'title' => 'Ảnh đại diện', 'hasFilter' => false],
                    ['data' => 'title', 'title' => 'Tiêu đề'],
                    ['data' => 'type_cms', 'title' => 'Loại nội dung', 'hasFilter' => false],
                    ['data' => 'location', 'title' => 'Vị trí hiển thị', 'hasFilter' => false],
                    ['data' => 'action', 'title' => 'Thao tác', 'hasFilter' => false],
                ],
                
            ])
        </div>
    </section>

@endsection

@push('script')
	<script>
	  
 	</script>
@endpush
