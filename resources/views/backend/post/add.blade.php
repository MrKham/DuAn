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
                        {{ isset($post) ? 'Cập nhật tin tức' : 'Thêm mới tin tức'}}
                    </h3>
                </h1>
            </div>
        </div>
    </div>

    <section id="widget-grid">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    @if(isset($post))
                        {!! Form::open(["url" => "/post/$post->id", "method" => "PUT", "files" => true, 'name'=>"post_form"]) !!}
                    @else
                        {!! Form::open(["url" => "/post", "method" => "POST", "files" => true, 'name'=>"post_form"]) !!}
                    @endif
                    {!! Form::lbText("name", @$post->name, 'Tên bài viết tiếng Việt *', '') !!}
                    {!! Form::lbText("name_en", @$post->name_en, 'Tên bài viết tiếng Anh', '') !!}
                    {!! Form::lbTextarea("description", @$post->description, 'Mô tả tiếng Việt', '') !!}
                    {!! Form::lbTextarea("description_en", @$post->description_en, 'Mô tả tiếng Anh', '') !!}
                    {!! Form::lbCKEditor("content", @$post->content, 'Nội dung tiếng việt', '') !!}
                    {!! Form::lbCKEditor("content_en", @$post->content_en, 'Nội dung tiếng anh', '') !!}
                    {!! Form::lbDatepicker("publish_date", @$post->publish_date, 'Ngày xuất bản', '') !!}
                    {!! Form::lbDatepicker("expiration_date", @$post->expiration_date, 'Ngày hết hạn', '') !!}
                    {!! Form::lbText("seo_title", @$post->seo_title, 'SEO Title', '') !!}
                    {!! Form::lbText("seo_description", @$post->seo_description, 'SEO Description', '') !!}
                    {!! Form::lbText("tags", @$post->tags, 'Tags (cách bởi dấu phẩy)', '') !!}
                    {!! Form::lbCheckbox("is_slide", @$post->is_slide, 'Slideshow') !!}
                    @if (isset($post->image_id))
                        @include('custom.file_input', ['name' => 'image', 'title' => 'Ảnh đại diện (kích thước 350 x 200px, tối đa 1M)', 'image_url' => url("/lbmediacenter/$post->image_id")])
                    @else
                        @include('custom.file_input', ['name' => 'image', 'title' => 'Ảnh đại diện (kích thước 350 x 200px, tối đa 1M)'])
                    @endif
                    <div class="widget-footer">
                        {!! Form::lbSubmit('Hoàn thành') !!}
                        {{-- <button type="submit">dasdas</button> --}}
                    </div>
                    {!! Form::close() !!}
                </article>
            </div>
        </div>
    </section>

@endsection

@push('script')
	<script>
        $(function () {
            setTimeout(function () {
                $('.datepicker').datepicker({
                    format: "yyyy-mm-dd",
                    language: "vi",
                    autoclose: true,
                    todayHighlight: true
                });
            }, 200);
        });

        // $(document).ready(function () {
        //     $('form').submit(function (e) {
        //         e.preventDefault();
        //         $('input[type=submit]').prop('disabled', true);
        //         for (instance in CKEDITOR.instances) {
        //             CKEDITOR.instances[instance].updateElement();
        //         }
        //         $('form').submit();
        //     });
        // });

 	</script>
@endpush
