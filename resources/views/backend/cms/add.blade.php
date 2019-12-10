@extends('app')


@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <h3 class="box-title" style="font-weight: bold">
                        {{ isset($cms) ? 'Cập nhật nội dung' : 'Thêm mới nội dung'}}
                    </h3>
                </h1>
            </div>
        </div>
    </div>

    <section id="widget-grid">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    @if(isset($cms))
                        {!! Form::open(["url" => "admin/cms/$cms->id", "method" => "PUT", "files" => true, 'name'=>"cms_form"]) !!}
                    @else
                        {!! Form::open(["url" => "admin/cms", "method" => "cms", "files" => true, 'name'=>"cms_form"]) !!}
                    @endif
                    {!! Form::lbText("title", @$cms->title, 'Tiêu đề *', '') !!}
                    @if (isset($cms->avatar_id))
                        @include('custom.file_input', ['name' => 'image', 'title' => 'Ảnh đại diện (kích thước 350 x 200px, tối đa 1M)', 'image_url' => url("/lbmediacenter/$cms->avatar_id")])
                    @else
                        @include('custom.file_input', ['name' => 'image', 'title' => 'Ảnh đại diện (nên để ảnh cùng 1 kích thước)'])
                    @endif
                    {!! Form::lbSelect("type", @$cms->type, \App\Classes\Helper::allOptionCmsType(), 'Loại nội dung') !!}
                    {!! Form::lbSelect("menu_code", @$cms->menu_code, \App\Classes\Helper::$menu_code, 'Vị trí hiển thị') !!}
                    {!! Form::lbCKEditor("content", @$cms->content, 'Nội dung tiếng việt', '') !!}
                    {!! Form::lbCKEditor("content_en", @$cms->content_en, 'Nội dung tiếng anh', '') !!}
                    <div class="widget-footer">
                        {!! Form::lbSubmit('Hoàn thành') !!}
                    </div>
                    {!! Form::close() !!}
                </article>
            </div>
        </div>
    </section>

@endsection

