@extends('app')

@section ('contentheader_title')
   Black list
@endsection

@section ('sidebar_blacklist')
    active
@endsection
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <h3 class="box-title" style="font-weight: bold">
                        {{ isset($user) ? 'Thay đổi thông tin email: '.$user->email : 'Thêm mới danh sách đen'}}
                    </h3>
                </h1>
            </div>
        </div>
    </div>


    <section id="widget-grid" class="">
        {{-- {!! Form::lbAlert() !!} --}}
        @if (!isset($user))
            {!! Form::open(array("url" => "blacklists", "method" => "post", "files" => true)) !!}
        @else
            {!! Form::open(array("url" => "blacklists/$user->id", "method" => "put", "files" => true)) !!}
        @endif
        <div class="container">
            <div class="row">
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div>
                        <div class="widget-body">
                            <fieldset>
                                {!! Form::lbText("email", @$user->email, "Email", "Nhập email") !!}
                            </fieldset>
                            <footer style="text-align: right">
                                <a class="btn btn-light" href="{{ url('blacklists') }}">Quay lại</a>
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
