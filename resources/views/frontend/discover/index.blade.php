@extends('app')

@section ('contentheader_title')
    @lang('project.KHAM_PHA_DU_AN')
@endsection

@push('new-css')
    <style type="text/css">
        .breadcrumb {
            background: transparent !important;
            padding: 0 !important;
        }

        .breadcrumb li a {
            font-size: 13px;
        }

        .breadcrumb li {
            padding-right: 10px;
        }

        .discover-more {
            width: 274px;
            height: 49px;
            border-radius: 3px;
            margin: 0 auto 100px;
            padding: 11px 12px;
            text-align: center;
            border: solid 1px #666666;
            cursor: pointer;
        }
        .like-button {
            position: absolute;
            top: 2%;
            right: 6%;
        }
    </style>
@endpush

@section ('sidebar_discover')active
@endsection
@php
    $cate_id = \Session::has('cate_id')? \Session::get('cate_id') : $cate_id;
    $condition = \Session::has('condition')? \Session::get('condition') : $condition;
    if($time){
        $time = $time;
    }else{
        $time= \Session::has('time')? \Session::get('time') : 'all';
    }
@endphp
@section('content')
    <div class="row" style="background-color: #f1f4f7; margin-bottom: 50px">
        <div class="container home">
            <div class="row">
                <div class="col-12 breadcrumb-item">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">@lang('menu.TRANG_CHU')</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a style="font-weight: bold" href="#">@lang('categoy.DISCOVERY')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="{{ url('/search/the-loai') }}" method="get">
                <div class="row search-box">
                    <div class="col-lg-3 col-xs-12">
                        <h2 style="font-weight: bold">
                            @lang('categoy.DISCOVERY')
                        </h2>
                    </div>
                    <div class="col-lg-3 col-xs-12">
                        {!! Form::lbSelect("parent", @$cate_id, \App\Models\Category::cateAllOption(), ' ') !!}
                    </div>
                    <div class="col-lg-2 col-xs-12">
                        {!! Form::lbSelect("time", @$time, @$time_default, ' ') !!}
                    </div>

                    <div class="col-lg-3 col-xs-12">
                        {!! Form::lbSelect("condition", @$condition, \App\Models\Project::getSearchList(), ' ') !!}
                    </div>
                    <div class="col-lg-1 col-xs-12 float-right">
                        <button style="margin-top: 7px" type="submit" class="btn btn-md btn-info"><i
                                    class="fa fa-filter" aria-hidden="true"></i> @lang('categoy.OPEN')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container home" ng-app="HomeApp" id="testa">
        <div class="row list-post zoom discover-result">
            @include('frontend.discover.paginate', [
                'data' => $data
            ])
        </div>
        @if(!empty($data))
            <div class="discover-more" onclick="discoverMore()">@lang('general.XEM_THEM')</div>
        @else
            <div style="text-align: center"><p>@lang('general.EmptyData')</p></div>
        @endif
    </div>
    @include("layouts.partials.near_footer")

@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('angularjs/modules/like/app.js') }}"></script>
    <script>
        var app = angular.module('HomeApp', ['utilApp']);
        var page = '{{ $page + 1 }}';
        var per_page = '{{ $per_page }}';
        function discoverMore() {
            JS_Library.showloading();
            $.ajax({
                type: "GET",
                url: "{{ url('/ajax/discovermore') }}",
                data: 'page=' + page + '&per_page='+ per_page,
                success: function (rs) {
                    if (rs) {
                        // $('.discover-result').append(rs);
                        var scope = angular.element("#testa").scope();
                        var compile = angular.element("#testa").injector().get("$compile");
                        $('.discover-result').append(compile(rs)(scope));
                        page++;
                    } else {
                        $('.discover-more').hide();
                    }
                },
                error: function (xhr) {
                    JS_Library.notify(xhr.status, 'error');
                },
                complete: function () {
                    JS_Library.hideloading();
                }
            });
        }
    </script>
@endpush

