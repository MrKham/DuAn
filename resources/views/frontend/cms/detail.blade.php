@extends('app')

@section('html_title')
    {{ $cms->title }}
@endsection

@section('head')
    <meta name="description" content="{{ $cms->title }}">
    <meta property="og:title" content="{{ $cms->title }}">
    <meta property="og:description" content="{{ $cms->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:site_name" content="Fundstart">
    <meta property="og:image" content="{{ url("/lbmediacenter/$cms->avatar_id") }}">

@endsection

@section ('sidebar_me')active
@endsection

@section('content')
    {{-- <div class="breadcrumb-home bg-light">
        <div class="container">
        </div>
    </div> --}}
    <div class="container container-cms bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $cms->title }}</h1>
                <figcaption class="figure-caption figure-time">{{ Carbon\Carbon::parse($cms->created_at)->toFormattedDateString() }}</figcaption>
                <div class="cms-content">
                    {!! app()->getLocale() == 'vi' ? $cms->content : $cms->content_en !!}
                </div>
                <div class="fb-comments" data-href="{{ request()->fullUrl() }}" data-numcmss="5"></div>
            </div>
        </div>
    </div>
    @include("layouts.partials.near_footer")

@endsection

@push('css')
	<style type="text/css">
		.breadcrumb-home {
			border-radius: 0;
			padding-top: 12px;
		    padding-bottom: 22px;
		}

        .breadcrumb-home a {
			text-decoration: none;
			color: inherit;
		}

        .container-cms {
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .container-cms .figure-caption.figure-time {
			color: #999999;
			font-size: 14px;
        }
        
        .container-cms h1 {
            font-size: 36px;
            font-weight: bold;
            line-height: 1.39;
            color: #333333;
            margin-bottom: 0px;
        }

        .container-cms .cms-content {
            margin-top: 27px;
            padding-bottom: 50px;
        }


	</style>
@endpush

@push('script')
<script>
    $(document).ready(function () {
        if (window.innerWidth <= 602) {
            $('.cms-content').find('img').removeAttr("style");
            $('.cms-content').find('img').addClass("img-responsive");
        }
    });
</script>
@endpush