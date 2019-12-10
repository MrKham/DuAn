<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        @include("layouts.partials.htmlheader")
    </head>
    
    <body class="animated fadeInDown">

        <header id="header">

            <div id="logo-group">
                <a href="{{ url('homepage') }}"><span id="logo"><b>HandmadeWatch</b></span></a>
            </div>

            <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">{{ trans('auth.login.needanaccount')}}</span> <a href="{{ url('register')}}" class="btn btn-danger">{{ trans('auth.login.createaccount')}}</a> </span>
            

        </header>

        <div id="main" role="main" style="background-color: #f7c842; height:720px;">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    {{-- <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                        <h1 class="txt-color-red login-header-big">{{ trans('auth.login.info.tis_info.name')}}</h1>
                        <div class="hero">

                            <div class="pull-left login-desc-box-l">
                                <h4 class="paragraph-header">{{ trans('auth.login.info.tis_info.description')}}</h4>
                                <div class="login-app-icons">
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm">{{ trans('auth.login.info.tis_info.link1')}}</a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm">{{ trans('auth.login.info.tis_info.link2')}}</a>
                                </div>
                            </div>
                            
                            <img src="{{ asset('sa/img/demo/iphoneview.png') }}" class="pull-right display-image" alt="" style="width:210px">

                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="about-heading">{{ trans('auth.login.info.tis_info.info1.text')}}</h5>
                                
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="about-heading">{{ trans('auth.login.info.tis_info.info2.text')}}</h5>
                                <p>
                                    {{ trans('auth.login.info.tis_info.info2.description')}}
                                </p>
                            </div>
                        </div>

                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-md-offset-4">
                        <div class="well no-padding">
                            <form method="POST" action="{{ url('/login') }}" id="login-form" class="smart-form client-form">
                                <header>
                                    {{ trans('auth.login.login_box.title')}}
                                </header>

                                <fieldset>
                                    {{ csrf_field() }}
                                    <section>
                                        <label class="label">{{ trans('auth.login.login_box.email')}}</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> {{ trans('auth.login.login_box.email_hint')}}</b></label>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </section>

                                    <section>
                                        <label class="label">{{ trans('auth.login.login_box.password')}}</label>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="password" required>
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> {{ trans('auth.login.login_box.password_hint')}}</b> </label>
                                            <div class="note">
                                                <a href="{{ url('password/reset') }}">Forgot password</a>
                                            </div>
                                    </section>

                                    <section>
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember" checked="">
                                            <i></i>{{ trans('auth.login.login_box.remember_me')}}</label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <!-- facebook -->
                                    <span> <a href="{{ url('/redirect') }}" class="btn btn-primary">Facebook</a> </span>
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('auth.login.login_box.login_button')}}
                                    </button>
                                </footer>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>