@extends('app')

@section ('sidebar_category')
active
@endsection


@section('content')
    <section id="widget-grid">
        <div class="card bg-light">
            <div class="card-body">
                <div class="container">
                    <a href="{{ url('/post/create') }}" class="btn btn-info">
                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm bài viết
                    </a>
                </div>
            </div>
        </div>
        <div class="widget-body p-4">
            <div class="row">
                <article class="col-lg-12">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                    <div>   
                        <div class="widget-body no-padding">
                            @include("layouts.elements.table", [
                                'url' => url('/ajax/post'),
                                'columns' => [
                                    ['data' => 'image', 'title' => 'Ảnh đại diện'],
                                    ['data' => 'name', 'title' => 'Tên bài viết'],
                                    ['data' => 'description', 'title' => 'Mô tả'],
                                    ['data' => 'created_at', 'title' => 'Ngày tạo'],
                                    ['data' => 'slide_home', 'title' => 'Slide show', 'hasFilter' => false],
                                    ['data' => 'action', 'title' => 'Thao tác', 'hasFilter' => false],
                                ],
                                'orderColumn' => "[[3, 'desc']]"
                                
                            ])
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection

@push('script')
	<script>
	  
 	</script>
@endpush
