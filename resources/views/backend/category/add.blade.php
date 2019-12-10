@extends('app')

@section ('sidebar_category')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <h3 class="box-title" style="font-weight: bold">
                        {{ isset($data) ? 'Chỉnh sửa danh mục '.$data->name  : 'Thêm mới danh mục'}}
                    </h3>
                </h1>
            </div>
        </div>
    </div>

    <section id="widget-grid">
        <div class="container">

            <div class="row">
                <article class="col-lg-12">
                    <div class="widget-body">
                        @if(isset($data))
                            {!! Form::open(["url" => "/category/$data->id", "method" => "PUT", "files" => true]) !!}
                        @else
                            {!! Form::open(["url" => "/category", "method" => "POST", "files" => true]) !!}
                        @endif
                        {!! Form::lbText("name_vi", @$data->name_vi, 'Tên danh mục tiếng việt', '') !!}
                        {!! Form::lbText("name_en", @$data->name_en, 'Tên danh mục tiếng anh', '') !!}
                        {!! Form::lbTextarea("description", @$data->description, 'Mô tả', '') !!}
                        {!! Form::lbSelect("parent", @$data->parent_id, \App\Models\Category::allOption(1), 'danh mục cha') !!}
                        @if (isset($data->image_id))
                            @include('custom.file_input', ['name' => 'image', 'title' => 'Ảnh đại diện', 'image_url' => url("/lbmediacenter/$data->image_id")])
                        @else
                            @include('custom.file_input', ['name' => 'image', 'title' => 'Ảnh đại diện'])
                        @endif
                        <footer style="text-align: right; margin-bottom: 20px">
                            <a class="btn btn-light" href="{{ url('category') }}">Quay lại</a>
                            {!! Form::lbSubmit() !!}
                        </footer>
                        {!! Form::close() !!}
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection

@push('script')
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
@endpush
