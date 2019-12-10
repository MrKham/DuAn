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
    <meta property="og:url" content="">
    <meta property="og:site_name" content="Fundstart">
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

    <div class="container">
        <div class="row">
            <div class="col-md-12 project-member">
                <img class="avatar-member" src="@avatarIfExist($project->creator->avatar_id)" alt="Ảnh đại diện">
                <div class="d-inline-block">
                    <span class="member-info notice-text">@lang('project.GUI_BOI')</span> <span class="member-info">{{ $project->creator->name }}</span>
                    <p><a href="#" class="link-info">@lang('project.XEM_TTCN_THANH_VIEN')</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 project-title">
                <h1>{!! $project->name !!}</h1>
            </div>
            <div class="col-md-3">
                
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
                    <div class="progress-bar" style="width:{{ $progress_css }}%"></div>
                </div>
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
                        {!! $project->about_project !!}
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
                    </div>

                    <!-- tab bình luận -->
                    <div id="p_comment" class="tab-pane fade">
                        <h4>@lang('project.BINH_LUAN_KHI_XEM_TRUOC')</h4>
                    </div>

                    <!-- tab cập nhật -->
                    <div id="p_update" class="tab-pane fade">
                        @include('frontend.project.elements.timeline', [
                            'updates' => $project->updates
                        ])
                    </div>
                </div>
            </div>
            <div class="col-md-4 project-reward">
                @foreach ($project->rewards as $reward)
                    <div class="reward-box">
                        <div class="reward-box-header">
                            <div class="float-left">
                                <p class="reward-money">@convert($reward->cost)đ</p>
                            </div>
                            <div class="float-right text-right">
                                <p class="reward-dong-gop">0 @lang('project.LUOT_DONG_GOP'){{ $reward->limite_number ? " / $reward->limite_number" : ''  }}</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p class="mt-2 mb-1 font-weight-bold">@lang('project.PHAN_THUONG'):</p>
                        <p style="font-size: 14px;">{{ $reward->description }}</p>
                        <p class="mt-2 mb-1 font-weight-bold">@lang('project.DU_KIEN_GIAO_HANG'):</p>
                        <p>@lang('project.THANG') {{ Carbon\Carbon::parse($reward->delivery_date)->format('m/Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/modules/project-detail.css') }}">
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript">

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
@endpush