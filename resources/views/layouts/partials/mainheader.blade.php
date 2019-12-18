<style>
    @media (max-width: 780px) {
        #main {
            padding-top: 50px;
        }

        .web {
            display: none !important;
        }

        .navbar-content {
            background: white !important;
        }

        .navbar-toggler {
            padding: 0 !important;
        }

        .nav-item a {
            color: black;
        }

        .navbar-collapse {
            max-height: 400px !important;
            overflow-y: auto !important;
        }

        .notifi-list p {
            font-size: 0.9rem;
        }

        .dang-du-an {
            width: 100%;
            background: #0ED1B1;
            border: 1px solid #0ED1B1;
            color: white !important;
        }

        #login-modal .modal-content {
            width: auto !important;
        }
        #login-modal .modal-content p{
            font-size: 0.9rem !important;
        }
        #login-modal .modal-content a{
            font-size: 0.9rem !important;
        }
    }

    @media (min-width: 780px) {
        .mobile {
            display: none !important;
        }
    }

    .label-warning {
        border-radius: 5px;
        position: absolute;
        top: 0;
        right: 6px;
        text-align: center;
        font-size: 12px;
        padding: 3px 4px;
        line-height: .9;
        background-color: #f39c12 !important;
    }

    .notifi-list {
        max-height: 500px;
        margin-left: -115px;
        padding: 0;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 18rem;
        /* margin: 0rem 0 0; */
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
        overflow: hidden;
        overflow-y: scroll;

    }

    .notifi-list::-webkit-scrollbar {
        width: 3px;
        background-color: #F5F5F5;
    }

    .notifi-list::-webkit-scrollbar-thumb {
        background-color: #3A7BD5;
    }

    .notifi-item {
        min-height: 60px;
        height: auto;
        padding: 0 5px;
        border-bottom: 1px solid #c2c2c2;
    }

    .notifi-item a {
        text-decoration: none;
        padding: 0 !important;
    }

    .notifi-item p {
        padding: 10px !important;
    }

    .notifi-active {
        background-color: #f2f2f2;
    }

    .notifi-active a {
        text-decoration: none;
        padding: 0 !important;
    }

    .notifi-active p {
        padding: 10px !important;
    }

    .user-infor .dropdown-toggle::after {
        display: none;
    }

    .right-drop .dropdown-menu {
        width: 400px;
        margin: 10px 0 0 -200px;
        padding: 10px;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .search ::placeholder {
        color: #d3d3d3;
    }

</style>
<header id="header" class="web">
    <div class="row">
        <div class="col-md-4 col-2">
            <nav class="navbar navbar-expand-lg first-nav">
                <div class="dropdown">
                    <span class="discover-expand" id="menuDiscoverDropdown" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false" style="cursor: pointer;">
                        <img src="{{ asset("/uploads/icons/menu.png") }}">
                    </span>
                    <section class="discover-content dropdown-menu" role="button"
                             aria-labelledby="menuDiscoverDropdown">
                        <div class="container">
                            <div class="row">
                                @foreach(\App\Models\Category::getListCatAndChild() as $cat)
                                    <div class="col-lg-2 col-md-4">
                                        <a href="{{ url("the-loai/$cat->id/all/all") }}"
                                           class="menuft-title">{{ $cat->name }}</a>
                                        <ul class="menuft">
                                            @foreach($cat->list_child as $child)
                                                <li class="menu-item">
                                                    <a href="{{ url("the-loai/$child->id/all/all") }}">{{ $child->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto menu-ul">
                        <li class="nav-item @yield('sidebar_discover')">
                            <a class="nav-link" href="{{url('discover')}}">@lang('menu.KHAM_PHA')</a>
                        </li>
                        <!-- <li class="nav-item @yield('sidebar_me')">
                            <a class="nav-link" href="{{ route('ve-chung-toi') }}">@lang('menu.TIM_HIEU')</a>
                        </li> -->
                        <li class="nav-item @yield('sidebar_post')">
                            <a class="nav-link" href="{{ url('tin-tuc') }}">@lang('menu.TIN_TUC')</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-md-2 col-8" style="text-align: center">
            <a class="nav-link" href="{{ url('/') }}"><h2><font color="white">InvestStartup</font></h2></a>
        </div>
        <div class="col-md-6 col-2">
            <nav class="navbar navbar-expand-lg pull-right user-infor">
                <div class="search">
                    <form name="form-search" action="{{url('main-search/web')}}" method="get">
                        {!! Form::materialText("key_search", '', " ", trans('menu.NHAP_KY_TU_TIM_KIEM'), '', '', ['style' => 'border-bottom: 1px solid #fff;height:auto; width 100%; color: #fff']) !!}
                    </form>
                </div>
                <a href="#" onclick="mainSearch()" class="search-header"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="collapse navbar-collapse">
                    @if (Auth::user())
                        <ul class="navbar-nav mr-10 user-logged">
                            <li class="nav-item">
                                <img src="@avatarIfExist(Auth::user()->avatar_id)" alt="">
                            </li>
                            <li class="nav-item dropdown right-drop">
                                <a class="nav-link dropdown-toggle username-header" href="#" id="navbarDropdown"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if(\Auth::user()->hasRole('admin'))
                                                <p style="font-weight: bold">@lang('menu.QUAN_LY_DU_AN')</p>
                                                <a class="dropdown-item"
                                                   href="{{ url('/category') }}">@lang('menu.QUAN_LY_DANH_MUC')</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                   href="{{ url('/admin/cms') }}">@lang('menu.QUAN_LY_NOI_DUNG_THONG_TIN')</a>
                                                <div class="dropdown-divider"></div>
                                            @endif
                                            @if(\Auth::user()->hasRole('admin')|| \Auth::user()->hasRole('project_mod'))
                                                <!-- <a class="dropdown-item"
                                                   href="{{ url('/admin/project') }}">@lang('menu.DANH_SACH_DU_AN')</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                   href="{{ url('/admin/backer') }}">@lang('menu.QUAN_LY_BACKERS')</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                   href="{{ route('export_projects') }}">@lang('menu.EXPORT_PROJECTS')</a>
                                                <div class="dropdown-divider"></div> -->
                                            @endif
                                            @if(\Auth::user()->hasRole('admin')|| \Auth::user()->hasRole('post_mod'))
                                                <!-- <a class="dropdown-item"
                                                   href="{{ url('/post') }}">@lang('menu.QUAN_LY_TIN_TUC')</a>
                                                <div class="dropdown-divider"></div> -->
                                            @endif
                                            @if(\Auth::user()->hasRole('admin'))
                                                <!-- <a class="dropdown-item" href="{{ url('/translations') }}">@lang('menu.DICH')</a>
                                                <div class="dropdown-divider"></div> -->
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <p style="font-weight: bold">@lang('menu.QUAN_LY_NGUOI_DUNG')</p>
                                            <a class="dropdown-item"
                                               href="{{ url('user/profile/'.Auth::user()->id) }}">@lang('menu.THONG_TIN_CA_NHAN_THANH_VIEN')</a>
                                            <div class="dropdown-divider"></div>
                                            @if(\Auth::user()->hasRole('admin'))
                                                <a class="dropdown-item"
                                                   href="{{ url('/user') }}">@lang('menu.QUAN_LY_NGUOI_DUNG')</a>
                                                <div class="dropdown-divider"></div>
                                                <!-- <a class="dropdown-item"
                                                   href="{{ url('/blacklists') }}">@lang('menu.QUAN_LY_BLACK_LISTS')</a>
                                                <div class="dropdown-divider"></div> -->
                                                <!-- <a class="dropdown-item"
                                                   href="{{ route('export_users') }}">@lang('menu.EXPORT_USERS')</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                   href="{{ route('export_subcribers') }}">@lang('menu.EXPORT_SUBCRIBERS')</a>
                                                <div class="dropdown-divider"></div> -->
                                            @endif
                                            <a class="dropdown-item"
                                               href="{{ url('logout') }}">@lang('menu.DANG_XUAT')</a>
                                        </div>
                                    </div>


                                </div>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning"></span>
                                </a>
                                <ul class="notifi-list dropdown-menu">
                                    {{--<li class="notifi-item">
                                        <p><b>Dự án đã được gọi vốn</b> <br/>
                                            Dự án Dự án đầu tiên đã được gọi vốn</>
                                    </li>
                                    <li class="notifi-item notifi-active">
                                        <p><b>Dự án đã được gọi vốn</b> <br/>
                                            Dự án Dự án thứ 2 đã được gọi vốn</p>
                                    </li>--}}

                                </ul>
                            </li>

                        </ul>
                    @else
                        <ul class="navbar-nav mr-10">
                            <li class="nav-item">
                                <a class="nav-link" onclick="openLogin()" href="#">@lang('menu.DANG_NHAP')</a>
                            </li>
                            <span style="font-size: 12px;">|</span>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url("/register") }}">@lang('menu.DANG_KY')</a>
                            </li>
                        </ul>
                    @endif
                </div>
                <a href="{{ url('du-an') }}" class="btn btn-primary dang-du-an">
                    <i class="fa fa-arrow-circle-o-up" aria-hidden="true"
                       style="margin-right: 15px;"></i>@lang('menu.DANG_DU_AN')
                </a>
                <div class="float-right">
                    <!-- <ul class="nav navbar-nav languages">
                        <li class="dropdown">
                            @if(\App::getLocale() == 'en')
                                <a href="#" class="dropdown-toggle" lang="en" title="English" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('/images/flag_en.png') }}"
                                         style="width: 26px; height: 26px; margin-left: 15px; float: right">
                                </a>
                            @elseif(\App::getLocale() == 'vi')
                                <a href="#" class="dropdown-toggle" lang="vi" title="English" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('/images/flag_vi.png') }}"
                                         style="width: 26px; height: 26px; margin-left: 15px; float: right">
                                </a>
                            @endif
                            <ul class="dropdown-menu dropdown-menu-right" style="float: right">
                                {{-- <li><a href="https://www.countryflags.com/nl/" title="Nederlands" lang="nl"><span class="flag nl"></span>Nederlands</a></li> --}}
                                <li><a class="dropdown-item" href="/setLang/vi" lang="vi">
                                        <img src="{{ asset('/images/flag_vi.png') }}"
                                             style="width: 20px; height: 20px; margin-right: 5px;">
                                        @lang('menu.TIENG_VIET')
                                    </a></li>
                                <li><a class="dropdown-item" href="/setLang/en" lang="en">
                                        <img src="{{ asset('/images/flag_en.png') }}"
                                             style="width: 20px; height: 20px; margin-right: 5px;">
                                        @lang('menu.TIENG_ANH')
                                    </a></li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
                <div class="clearfix"></div>
                {{-- <div class="dropdown languageDropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('/images/usa_flag.png') }}" style="width: 26px; height: 26px; margin-left: 15px;">
                    </a>
                    <ul class="dropdown-menu" style="min-width: 12rem">
                        <li>Tiếng Anh</li>
                    </ul>
                </div> --}}
            </nav>
        </div>
    </div>
    {{-- <button type="button" id="header-login">Login</button> --}}
    {{-- <div class="modal modal-auth fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmRegister">
                    <div class="modal-header">
                        <h3 style="color: black; font-weight: bold; margin-top: 20px; font-size: 32px;">Đăng Ký</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <hr/>
                    <div class="modal-body">
                        {!! Form::materialText("name", '', "Tài khoản", "Nhập tài khoản") !!}
                        {!! Form::materialText("r-email", '', "Email", "Nhập Email") !!}
                        {!! Form::materialPassword("r-password", "Mật khẩu", '', "") !!}
                        {!! Form::materialPassword("cf-password", "Xác nhận mật khẩu", '', "") !!}
                        <div id="register_recaptcha">
                            <div class="g-recaptcha" data-sitekey="{{ env("RECAPTCHA_SITE_KEY") }}"></div>
                        </div>
                        <button style="margin-top: 20px !important;" class="btn btn-primary btn-block btn-login"
                                type="submit">ĐĂNG KÝ
                        </button>
                        <span class="clearfix"></span>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</header>
<header id="header" class="mobile">
    <div class="row">
        <div class="col-2">
            <nav class="navbar navbar-expand-sm navbar-light" style="padding: 0">
                <span style="border: none; display: block" class="navbar-toggler" data-toggle="collapse" data-target="#mobile_discover"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                       <i onclick="$('.collapse').collapse('hide');" style="color: white" class="fa fa-align-left"
                          aria-hidden="true"></i>
                </span>
            </nav>
        </div>
        <div class="col-5">
            <a href="{{ url('/') }}"> <img src="{{asset('/uploads/logo/logo.png')}}"
                                           style="margin-top: 15px; height: 30px; width: 100%;"></a>
        </div>
        @if (Auth::user())
            <div class="col-2">
                <nav class="navbar navbar-expand-lg pull-right user-infor">
                    <div class="float-right">
                        <ul class="nav navbar-nav languages">
                            <li class="dropdown">
                                @if(\App::getLocale() == 'en')
                                    <a onclick="$('.collapse').collapse('hide');" href="#" class="dropdown-toggle"
                                       lang="en" title="English" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/images/flag_en.png') }}"
                                             style="width: 26px; height: 26px; margin-left: 15px; float: right">
                                    </a>
                                @elseif(\App::getLocale() == 'vi')
                                    <a onclick="$('.collapse').collapse('hide');" href="#" class="dropdown-toggle"
                                       lang="vi" title="English" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/images/flag_vi.png') }}"
                                             style="width: 26px; height: 26px; margin-left: 15px; float: right">
                                    </a>
                                @endif
                                <ul class="dropdown-menu dropdown-menu-right" style="float: right">
                                    {{-- <li><a href="https://www.countryflags.com/nl/" title="Nederlands" lang="nl"><span class="flag nl"></span>Nederlands</a></li> --}}
                                    <li><a class="dropdown-item" href="/setLang/vi" lang="vi">
                                            <img src="{{ asset('/images/flag_vi.png') }}"
                                                 style="width: 20px; height: 20px; margin-right: 5px;">
                                            @lang('menu.TIENG_VIET')
                                        </a></li>
                                    <li><a class="dropdown-item" href="/setLang/en" lang="en">
                                            <img src="{{ asset('/images/flag_en.png') }}"
                                                 style="width: 20px; height: 20px; margin-right: 5px;">
                                            @lang('menu.TIENG_ANH')
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </nav>
            </div>
            <div class="col-1" style="padding: 0 !important;">
                <nav class="navbar navbar-expand-lg pull-right user-infor">
                    <div class="float-right">
                        <ul class="nav navbar-nav languages">
                            <li class="dropdown">
                                <a onclick="$('.collapse').collapse('hide');" href="#" class="dropdown-toggle" lang="en"
                                   title="English" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i style="width: 26px; height: 26px; margin-top: 4px; float: right;"
                                       class="fa fa-bell-o"></i>
                                    <span class="label label-warning"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right notifi-list" style="float: right">
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </nav>
            </div>
        @else
            <div class="col-3">
                <nav class="navbar navbar-expand-lg pull-right user-infor">
                    <div class="float-right">
                        <ul class="nav navbar-nav languages">
                            <li class="dropdown">
                                @if(\App::getLocale() == 'en')
                                    <a onclick="$('.collapse').collapse('hide');" href="#" class="dropdown-toggle"
                                       lang="en" title="English" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/images/flag_en.png') }}"
                                             style="width: 26px; height: 26px; margin-left: 15px; float: right">
                                    </a>
                                @elseif(\App::getLocale() == 'vi')
                                    <a onclick="$('.collapse').collapse('hide');" href="#" class="dropdown-toggle"
                                       lang="vi" title="English" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/images/flag_vi.png') }}"
                                             style="width: 26px; height: 26px; margin-left: 15px; float: right">
                                    </a>
                                @endif
                                <ul class="dropdown-menu dropdown-menu-right" style="float: right">
                                    {{-- <li><a href="https://www.countryflags.com/nl/" title="Nederlands" lang="nl"><span class="flag nl"></span>Nederlands</a></li> --}}
                                    <li><a class="dropdown-item" href="/setLang/vi" lang="vi">
                                            <img src="{{ asset('/images/flag_vi.png') }}"
                                                 style="width: 20px; height: 20px; margin-right: 5px;">
                                            @lang('menu.TIENG_VIET')
                                        </a></li>
                                    <li><a class="dropdown-item" href="/setLang/en" lang="en">
                                            <img src="{{ asset('/images/flag_en.png') }}"
                                                 style="width: 20px; height: 20px; margin-right: 5px;">
                                            @lang('menu.TIENG_ANH')
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </nav>
            </div>
        @endif
        <div class="col-2">
            <nav class="navbar navbar-expand-sm navbar-light" style="width: 100%;padding: 0;">
                <span style="border: none; display: block" class="navbar-toggler" data-toggle="collapse" data-target="#mobile_manager"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    @if (Auth::user())
                        <img onclick="$('.collapse').collapse('hide');" style="width: 25px;height: 25px;border-radius: 50%;object-fit: cover;"
                             src="@avatarIfExist(Auth::user()->avatar_id)"
                             alt="">
                    @else
                        <i onclick="$('.collapse').collapse('hide');" style="color: white" class="fa fa-sign-in"
                           aria-hidden="true"></i>
                    @endif
                </span>
            </nav>
        </div>

    </div>
    <div class="row">
        <div class="col-12 navbar-content">
            <div class="collapse navbar-collapse" id="mobile_discover">
                <ul class="navbar-nav">
                    <li class="nav-item @yield('sidebar_discover')">
                        <a class="nav-link" href="{{url('discover')}}"><b>@lang('menu.KHAM_PHA')</b></a>
                    </li>
                    <li class="nav-item @yield('sidebar_me')">
                        <a class="nav-link" href="{{ route('ve-chung-toi') }}"><b>@lang('menu.TIM_HIEU')</b></a>
                    </li>
                    <li class="nav-item @yield('sidebar_post')">
                        <a class="nav-link" href="{{ url('tin-tuc') }}"><b>@lang('menu.TIN_TUC')</b></a>
                    </li>
                    <li class="nav-item @yield('sidebar_post')">
                        <hr/>
                    </li>
                    @foreach(\App\Models\Category::getListCatAndChild() as $cat)
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url("the-loai/$cat->id/all/all") }}">
                                <b>{{ $cat->name }}</b>
                            </a>
                            <ul class="navbar-nav">
                                @foreach($cat->list_child as $child)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ url("the-loai/$child->id/all/all") }}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-12 navbar-content">
            <div class="collapse navbar-collapse" id="mobile_manager">
                <ul class="navbar-nav">
                    <li class="nav-link ">
                        <div class="search" style="display: block">
                            <div class="row">
                                <div class="col-10">
                                    <form name="mobile-form-search" action="{{url('main-search/mobile')}}" method="get">
                                        <div class="form-group">
                                            <input type="text" name="mobile_key_search" class="form-control"
                                                   id="mobile_key_search"
                                                   placeholder="{{ trans('menu.NHAP_KY_TU_TIM_KIEM') }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2" style="padding: 0">
                                    <button onclick="mobileMainSearch()" class="btn btn-primary search-header"
                                            style="display: block">
                                        <i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a style="width: 100%" href="{{ url('du-an') }}" class="btn btn-success dang-du-an">
                            <i class="fa fa-arrow-circle-o-up" aria-hidden="true"
                               style="margin-right: 15px;"></i>@lang('menu.DANG_DU_AN')
                        </a>
                    </li>
                    <li>
                        <hr/>
                    </li>
                    @if(Auth::user())
                        @if(\Auth::user()->hasRole('admin'))
                            <li class="nav-item ">
                                <a style="font-weight: bold" class="nav-link" href="#">@lang('menu.QUAN_LY_DU_AN')</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ url('/category') }}">@lang('menu.QUAN_LY_DANH_MUC')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ url('/admin/cms') }}">@lang('menu.QUAN_LY_NOI_DUNG_THONG_TIN')</a>
                            </li>
                        @endif
                        @if(\Auth::user()->hasRole('admin')|| \Auth::user()->hasRole('project_mod'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/project') }}">@lang('menu.DANH_SACH_DU_AN')</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/backer') }}">@lang('menu.QUAN_LY_BACKERS')</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('export_projects') }}">@lang('menu.EXPORT_PROJECTS')</a>
                            </li> -->
                        @endif
                        @if(\Auth::user()->hasRole('admin')|| \Auth::user()->hasRole('post_mod'))
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('/post') }}">@lang('menu.QUAN_LY_TIN_TUC')</a>
                            </li> -->
                        @endif
                        @if(\Auth::user()->hasRole('admin'))
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('/translations') }}">@lang('menu.DICH')</a>
                            </li> -->
                        @endif
                        <li>
                            <hr/>
                        </li>
                        <li class="nav-item ">
                            <a style="font-weight: bold" class="nav-link" href="#">@lang('menu.QUAN_LY_NGUOI_DUNG')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ url('user/profile/'.Auth::user()->id) }}">@lang('menu.THONG_TIN_CA_NHAN_THANH_VIEN')</a>
                        </li>
                        @if(\Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/user') }}">@lang('menu.QUAN_LY_NGUOI_DUNG')</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ url('/blacklists') }}">@lang('menu.QUAN_LY_BLACK_LISTS')</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('export_users') }}">@lang('menu.EXPORT_USERS')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('export_subcribers') }}">@lang('menu.EXPORT_SUBCRIBERS')</a>
                            </li> -->
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}">@lang('menu.DANG_XUAT')</a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" onclick="openLogin()" href="#">@lang('menu.DANG_NHAP')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/register") }}">@lang('menu.DANG_KY')</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="modal modal-auth fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="frmLogin">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h3 style="color: black; font-weight: bold; margin-top: 20px; font-size: 32px;">@lang('menu.DANG_NHAP')</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {!! Form::materialText("email", '', trans('general.ACCOUNT'), "Email của bạn") !!}
                    {!! Form::materialPassword("password", trans('general.PASSWORD'), '1', "Mật khẩu của bạn") !!}
                    <label class="checkbox-inline" style="color: #007bff; float: left; margin-top: 5px">
                        <input name="remember_me_login" style="margin-right: 10px; width: 20px; height: 20px"
                               type="checkbox">
                    </label><span
                            style="float: left; color: black; margin-top: 5px">@lang('menu.GHI_NHO_MAT_KHAU')</span>
                    <button class="btn btn-primary btn-block btn-login" type="submit">@lang('menu.DANG_NHAP')</button>
                    <div class="modal-social">
                        <p style="font-size: 14px;margin-top: 20px;">
                            @lang('general.OTHER_LOGIN')
                            <a style="margin-left: 20px" href="{{ url('/facebook-redirect') }}">
                                <img src="{{asset('/uploads/icons/facebook.png')}}"></a>
                            <a style="margin-left: 15px" href="{{ url('/google-redirect') }}">
                                <img src="{{asset('/uploads/icons/google.png')}}">
                            </a>
                        </p>
                    </div>
                    <hr/>
                    <div style="text-align: center">
                        <p class="help-register">@lang('menu.BAN_CHUA_CO_TAI_KHOAN')? <a onclick="openRegister()"
                                                                                         style="color: #3a7bd5"
                                                                                         href="{{ url('/register') }}">@lang('menu.DANG_KY_NGAY')</a>
                        </p>
                    </div>
                    <span class="clearfix"></span>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
    <script>
        @if (\Auth::user())
        $(document).ready(function () {
            loadNotifi();
            setInterval(function () {
                loadNotifi();
            }, 60000);
        });

        @endif

        function mainSearch() {
            if ($('input[name="key_search"]').val() != null) {
                $("form[name='form-search']").submit();
            }
        }


        function mobileMainSearch() {
            if ($('input[name="mobile_key_search"]').val() != null) {
                $("form[name='mobile-form-search']").submit();
            }
        }

        $("form[name='frmLogin']").submit(function (e) {
            e.preventDefault();
            JS_Library.showloading();
            $.ajax({
                type: "POST",
                url: "{{ url('/ajax/login') }}",
                data: $(this).serialize(),
                success: function (res) {
                    if (res == 'success') {
                        JS_Library.notify('Đăng nhập thành công', 'success');
                        $('#login-modal').modal('hide');
                        window.location.href = '{{ request()->fullUrl() }}';
                    } else {
                        JS_Library.notify(res, 'error');
                    }
                },
                error: function (xhr) {
                    JS_Library.notify(xhr.status, 'error');
                },
                complete: function () {
                    JS_Library.hideloading();
                }
            });
        });

        function openLogin() {
            $('#login-modal').modal('show');
        }

        function loadNotifi() {
            $.ajax({
                type: "get",
                url: "{{ url('/ajax/notification') }}",
                success: function (res) {
                    $('.notifi-list li').remove();
                    var count = res.count;
                    if (count > 0) {
                        $('.label-warning').css('display', 'block');
                        $('.label-warning').text(count);
                    } else {
                        $('.label-warning').css('display', 'none');
                    }
                    if (res.data.length > 0) {
                        var data = res.data;
                        $.each(data, function (key, value) {
                            if (value.status == 0) {
                                $('.notifi-list').append('<li onclick="changeStatus(this)" data-id="' + value.id + '" class="notifi-item notifi-active">' +
                                    '<a href="' + value.url + '">' +
                                    '<p><b>' + value.title + '</b> <br/>' + value.description + '</p>' +
                                    '</a></li>')
                            } else {
                                $('.notifi-list').append('<li class="notifi-item">' +
                                    '<a href="' + value.url + '">' +
                                    '<p><b>' + value.title + '</b> <br/>' + value.description + '</p>' +
                                    '</a></li>')
                            }
                        });
                    } else {
                        $('.label-warning').css('display', 'none');
                        $('.notifi-list').append('<li class="notifi-item notifi-active">' +
                            '<a href="#">' +
                            '<p style="text-align: center">Không có thông báo</p>' +
                            '</a></li>')
                    }
                },
            });
        }

        function changeStatus(obj) {
            var id = $(obj).data('id');
            $.ajax({
                type: "get",
                url: "{{ url('/ajax/change-notifi-status') }}",
                data: {'id': id},
                success: function (res) {
                    console.log(res);
                },
            });
        }

        // function openRegister() {
        //     $('#login-modal').modal('hide');
        //     $('#register-modal').modal('show');
        // }

        // $("form[name='frmRegister']").submit(function (e) {
        //     e.preventDefault();
        //     JS_Library.showloading();
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ url('/ajax/register') }}",
        //         data: $(this).serialize(),
        //         success: function (res) {
        //             if(res['status'] == 200){
        //                 JS_Library.notify('Đăng ký thành công, kiểm tra email để kích hoạt tài khoản', 'success');
        //                 $('#register-modal').modal('hide');
        //             }else {
        //                 JS_Library.notify('Đăng ký không thành công', 'error');
        //             }

        //         },
        //         error: function (xhr) {
        //             var errors = xhr.responseJSON;
        //             $.each(errors, function (k, v) {
        //                 JS_Library.notify(v, 'error');
        //             });
        //         },
        //         complete: function () {
        //             JS_Library.hideloading();
        //         }
        //     });
        // })
    </script>
@endpush