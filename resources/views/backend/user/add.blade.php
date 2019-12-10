@extends('app')

@section ('contentheader_title')
    Role &amp; Permission Management
@endsection

@section ('sidebar_user')
    active
@endsection
@push('css')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload {
        width: 100%;
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <h3 class="box-title" style="font-weight: bold">
                        {{ isset($user) ? 'Thay đổi thông tin tài khoản: '.$user->name : 'Thêm mới tài khoản người dùng'}}
                    </h3>
                </h1>
            </div>
        </div>
    </div>


    <section id="widget-grid" class="">
        {{-- {!! Form::lbAlert() !!} --}}
        @if (!isset($user))
            {!! Form::open(array("url" => "user", "method" => "post", "files" => true)) !!}
        @else
            {!! Form::open(array("url" => "user/$user->id", "method" => "put", "files" => true)) !!}
        @endif
        <div class="container">
            <div class="row">

                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div>
                        <div class="widget-body no-padding smart-form">
                            <fieldset>
                                <input id="username" style="display:none" type="text" name="telephone">
                                <input id="password" style="display:none" type="password" name="fakepasswordremembered">
                                {!! Form::lbText("name", @$user->name, "Tên đầy đủ", "Nhập họ và tên") !!}
                                {!! Form::lbText("address", @$user->address, "Địa chỉ", "Nhập địa chỉ") !!}
                                {!! Form::lbText("telephone_o", @$user->telephone, "Số điện thoại", "Nhập số điện thoại") !!}
                                @if(\Auth::user()->hasRole('admin'))
                                <div class="form-group ">
                                    <label for="role" class="control-label">Vai trò người dùng</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach(\App\Models\Role::all() as $role)
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="role[]" type="checkbox" value="{{ $role->id }}"
                                                        <?php
                                                            if (isset($user)){
                                                                foreach (@$user->roles as $user_role)
                                                                {
                                                                    if ($user_role->id === $role->id)
                                                                    {
                                                                        echo "checked"; break;
                                                                    }
                                                                }
                                                            }
                                                            ?>>
                                                        {{ $role->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endIf
                                <div class="form-group">
                                    <label>Tải hình ảnh</label>
                                    <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span style="height: 100%; background: rgba(82, 54, 70, 0.47); color: #fff" class="btn btn-default btn-file">
                                                        Thư mục… <input type="file" name="avatar" id="imgInp">
                                                    </span>
                                                </span>
                                        <input id="filename" type="text" class="form-control" readonly>
                                        <input type="hidden" name="old_image" value="{!! @$user->avatar_id !!}"
                                               id="oldInputFile">

                                    </div>
                                    <img id='img-upload'/>
                                    @if ($errors->has('avatar'))
                                        @foreach ($errors->get('avatar') as $error)
                                            <p style="color: red">{!! $error !!}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </article>
                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div>
                        <div class="widget-body">
                            <fieldset>
                                {!! Form::lbText("email", @$user->email, "Email", "Nhập email") !!}
                                @include('custom.password', ['name' => 'password', 'title' => 'Mật khẩu'])
                                @include('custom.password', ['name' => 'cf-password', 'title' => 'Xác nhận mật khẩu'])
                                {!! Form::lbText("company", @$user->company, "Công ty", "Nhập tên doanh nghiệp") !!}
                                {!! Form::lbText("website", @$user->website, "Trang web", "Nhập trang web cá nhân hoặc doanh nghiệp") !!}
                                @include('custom.textarea', ['name' => 'info', 'title' => 'Giới thiệu bản thân', 'value' => @$user->info])
                            </fieldset>
                            <footer style="text-align: right">
                                <a class="btn btn-light" href="{{ url('user') }}">Quay lại</a>
                                {!! Form::lbSubmit() !!}
                            </footer>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection
@push('script')
<script>
    //preview image
    //show old file
    $('#img-upload').hide();
    if ($('#oldInputFile').val()) {
        $('#img-upload').attr('src', '{!! url('/lbmedia') !!}/' + $('#oldInputFile').val());
        $('#filename').val('{!! url('/lbmedia') !!}/' + $('#oldInputFile').val());
        $('#img-upload').show();
    }
    //add file name to textbox
    $('.btn-file :file').change(function () {
        var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {
        var input = $(this).parents('.input-group').find(':text'),
                log = label;

        if (input.length) {
            $('#filename').val(log);
        } else {
            if (log) alert(log);
        }

    });

    function readURL(input) {
        $('#img-upload').hide();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
        $('#img-upload').show();
    });
    //end preview
</script>
@endpush

