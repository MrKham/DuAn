@extends('app')

@section('html_title')
    {{ $project->name }}
@endsection

@section('head')
    <!-- OpenGraph -->
    <meta name="description" content="{{ $project->headline }}">
    <meta property="og:title" content="{{ $project->name }}">
    <meta property="og:description" content="{{ $project->headline }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:site_name" content="InvestStartup">
    <meta property="og:image" content="{{ url("/lbmediacenter/$project->avatar_id") }}">
    <meta property="og:locale" content="vi_VN">


@endsection

@section('content')
    <div id="fb-root"></div>
    <div class="breadcrumb-home bg-light">
        <div class="container">
            <ul class="list-inline">
            	<li class="list-inline-item active">
                    <a href="/">@lang('menu.TRANG_CHU')</a>
            	</li>
                <li class="list-inline-item">
            		{{ $project->name }}
            	</li>
            </ul>
        </div>
    </div>

    <div class="container" ng-app="App" ng-controller="AppController">
        <div class="row">
            <div class="col-md-12 project-member">
                {{-- <img class="avatar-member" src="{{ url("/lbmediacenter").'/'.$project->creator->avatar_id }}" alt="Ảnh đại diện"> --}}
                <img class="avatar-member" src="@avatarIfExist($project->creator->avatar_id)" alt="Ảnh đại diện">
                <div class="d-inline-block">
                    <span class="member-info notice-text">@lang('project.GUI_BOI')</span> <span class="member-info">{{ @$project->creator->name }}</span>
                    <p><a href="{{url('/user/profile/'.@$project->created_by)}}"{{-- ng-click="showInfoCreator()" --}}class="link-info">@lang('project.XEM_TTCN_THANH_VIEN')</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 project-title">
                <h1>{!! $project->name !!}</h1>
            </div>
            <div class="col-md-3" style="position: relative;">
                <div class="float-right gg-share" style="padding-top: 10px;">
                    <div class="fb-share-button" data-href="{{ request()->fullUrl() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true" style="position: absolute; top: 7px;right: 90px;"></div>
                    <div class="g-plus" data-action="share" data-align="bottom" data-annotation="bubble"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 project-infomation">
                {{-- <img class="project-avatar" src="{{ url("/lbmediacenter/$project->avatar_id") }}" alt="Ảnh đại diện dự án"> --}}
                @if(count($project->media))
                <div class="slider-for">
                    @foreach ($project->media as $media)
                    <div class="item">
                        <img src="{{ url("/lbmediacenter/$media->id") }}" alt="image"  draggable="false"/>
                    </div>
                    @endforeach
                </div>

                <div class="slider-nav">
                    @foreach ($project->media as $media)
                    <div class="item">
                        <img src="{{ url("/lbmediacenter/$media->id") }}" alt="image"  draggable="false"/>
                    </div>
                    @endforeach
                </div>
                @else
                <img class="project-avatar" src="{{ url("/lbmediacenter/$project->avatar_id") }}" alt="Ảnh đại diện dự án">
                @endif

                <div class="tab-content">

                </div>
            </div>
            <div class="col-md-4 project-description">
                <p>{{ $project->headline }}</p>
                <p>@lang('project.DU_AN_NVTN'): <span class="font-weight-bold">{{ $project->open_port_date ? Carbon\Carbon::parse($project->open_port_date)->format('d/m/Y - H:i') : '' }}</span></p>
                <div class="row">
                    <div class="col-lg-6 float-left">
                        <b>@convert($money_from_backers)đ </b><span>({{ $progress_text }}%)</span>
                    </div>
                    <div class="col-lg-6 float-right text-right">
                        <p>@convert($project->expense)đ</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="progress progress-money">
                    <div class="progress-bar" style="width:{{ $progress_text }}%"></div>
                </div>
                @if(\App\Models\Project::isProjectIdea($project->registration_service) == false)
                    <div class="row" style="margin-top: 5px">
                        <div class="col-lg-6">
                            <p><img src="{{ asset("uploads/icons/user.png") }}" width="15px">&nbsp;{{ $project->backers_count }} @lang('project.NGUOI_DONG_GOP')</p>
                        </div>
                        <div class="col-lg-6 ">
                            <p><img src="{{ asset("uploads/icons/cel.png") }}" width="15px">&nbsp;{{ $days_remain }} @lang('project.NGAY_CON_LAI')</p>
                        </div>
                    </div>
                    @if ($progress_text >= 100)
                        <div class="money-success">
                            <p><img src="{{ asset("/images/GoiVonThanhCong.png") }}">@lang('project.GV_THANH_CONG')</p>
                        </div>
                    @elseif ($progress_text < 100 && $days_remain == 0)
                        <div class="money-error alert-danger">
                            <p>@lang('project.GV_THAT_BAI')</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-project">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#p_introduce">@lang('project.GIOI_THIEU')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#p_comment">@lang('project.BINH_LUAN')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#p_update">@lang('project.CAP_NHAT')</a>
                            <span class="badge badge-light count-icon">{{ $project->updates_count }}</span>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#p_faq">FAQ</a>
                        </li> --}}
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-8 project-detail">
                <div class="tab-content">
                    <!-- tab giới thiệu -->
                    <div id="p_introduce" class="tab-pane active">
                        <div class="about_project">
                            {!! $project->about_project !!}
                        </div>
                        {{-- Kế hoạch --}}
                        @if ($project->project_plan)
                        <h4 class="color-fundstart" style="margin-top: 30px;">@lang('project.KHTKDA')</h4>
                        {!! $project->project_plan !!}
                        @endif

                        {{-- Sử dụng nguồn vốn --}}
                        @if ($project->project_use)
                        <h4 class="color-fundstart" style="margin-top: 30px;">@lang('project.SU_DUNG_NGUON_VON')</h4>
                        {!! $project->project_use !!}
                        @endif

                        @if ($project->user_introduce_member)
                        <h4 class="color-fundstart" style="margin-top: 30px;">@lang('project.GIOI_THIEU_NHOM')</h4>
                        {!! $project->user_introduce_member !!}
                        @endif
                    </div>

                    <!-- tab bình luận -->
                    <div id="p_comment" class="tab-pane fade">
                        <div class="fb-comments" data-href="{{ url("project-on-facebook/$project->id") }} }}" data-numposts="5"></div>
                    </div>

                    <!-- tab cập nhật -->
                    <div id="p_update" class="tab-pane fade">
                        @include('frontend.project.elements.timeline', [
                            'updates' => $project->updates
                        ])
                    </div>
                </div>
            </div>
            @if(\App\Models\Project::isProjectIdea($project->registration_service) == false)
            <p class="contribute-title">Lựa chọn đóng góp</p>
            <div class="col-md-4 project-reward">
                @foreach ($project->rewards as $reward)
                    <div class="reward-box">
                        <div class="contribute-hover" ng-click="checkContribute('{{$reward->id}}')">
                            <div><span>Đóng góp</span></div>
                        </div>
                        {{-- <p class="contribute-mobile" ng-click="checkContribute('{{$reward->id}}')">Lựa chọn đóng góp</p> --}}
                        <div class="reward-box-header">
                            <div class="float-left">
                                <p class="reward-money">@convert($reward->cost)đ</p>
                            </div>
                            <div class="float-right text-right">
                                <p class="reward-dong-gop">{{ $reward->number_contribute }} @lang('project.LUOT_DONG_GOP'){{ $reward->limite_number ? " / $reward->limite_number" : ''  }}</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p class="mt-2 mb-1 font-weight-bold">@lang('project.PHAN_THUONG'):</p>
                        <p style="font-size: 14px;white-space: pre-line;">{!! $reward->description !!}</p>
                        <p class="mt-2 mb-1 font-weight-bold">@lang('project.DU_KIEN_GIAO_HANG'):</p>
                        <p>@lang('project.THANG') {{ Carbon\Carbon::parse($reward->delivery_date)->format('m/Y') }}</p>
                    </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- <like-button like="{{ (count($project->liked) > 0) ? 'liked' : 'no' }}" url="{{ json_encode(url('/')) }}" id="{{ json_encode($project->id) }}"></like-button> --}}


        <div class="modal modal-auth fade" id="creator-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <p>dsadas</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/modules/project-detail.css') }}">
    <style type="text/css">
        .contribute-mobile {
            display: none;
            margin-top: -20px;
            margin-bottom: 20px;
            font-size: 18px;
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
        }

        .contribute-title {
            display: none;
            margin-left: 15px;
            font-size: 21px;
            margin-bottom: 0px;
            margin-top: 10px;
            font-weight: bold;
        }

        @media only screen and (max-width : 480px) {
            .contribute-mobile {
                display: block;
            }

            .contribute-title {
                display: block;
            }
        }
    </style>
@endpush

@push('script')
    <script type="text/javascript" src="{{ asset('angularjs/modules/like/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript">
        var app = angular.module('App', ['utilApp']);

        app.controller('AppController', function($scope, $http) {
            $scope.showInfoCreator = function () {
                $('#creator-modal').modal('show');
            }

            $scope.checkContribute = function ($reward_id) {
                JS_Library.showloading();
                $http({
                    method: 'GET',
                    url: "/ajax/check-contribute/" + $reward_id,
                }).then(function (rs) {
                    if (rs.data.status == 'success') {
                        window.location = '/contribute/' + $reward_id;
                    } else {
                        JS_Library.notify(rs.data.message, 'error');
                    }
                }, function (xhr) {
                    JS_Library.notify(xhr, 'error');
                }).finally(function(data) {
                    JS_Library.hideloading();
                });
            }
        });

        $(document).ready(function () {
            $('.slider-for').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.slider-nav',
            });
            $('.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                centerMode: true,
                focusOnSelect: true,
                nextArrow: '<img class="slick-next" src="{{ asset('uploads/icons/next-slick.png') }}">',
                prevArrow: '<img class="slick-prev" src="{{ asset('uploads/icons/prev-slick.png') }}">',
                responsive: [{
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        centerMode: false,
                    }
                }]

            });

            if (window.innerWidth <= 602) {
                $('#p_introduce').find('img').removeAttr("style");
                $('#p_introduce').find('img').addClass("img-responsive");
            }
        });

        // p_introduce


    </script>
    
    {{-- facebook and google script --}}
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId={{ config("app.FB_APP_ID") }}&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script src="https://apis.google.com/js/platform.js" async defer>{lang: 'vi'}</script>
@endpush