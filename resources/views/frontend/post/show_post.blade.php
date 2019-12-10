@extends('app')

@section('html_title')
    {{ $post->seo_title }}
@endsection

@section('head')
    <meta name="description" content="{{ $post->seo_description }}">
    <meta property="og:title" content="{{ $post->name }}">
    <meta property="og:description" content="{{ $post->seo_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:site_name" content="Fundstart">
    <meta property="og:image" content="{{ url("/lbmediacenter/$post->image_id") }}">
    <meta property="og:locale" content="vi_VN">

@endsection

@section ('sidebar_post')active
@endsection

@section('content')
    <div id="fb-root"></div>
    <div class="breadcrumb-home bg-light">
        <div class="container">
            <ul class="list-inline">
            	<li class="list-inline-item active">
                    <a href="/">@lang('menu.TRANG_CHU')</a>
            	</li>
            	<li class="list-inline-item active">
                    <a href="{{ url("tin-tuc") }}">@lang('menu.TIN_TUC')</a>
                </li>
                <li class="list-inline-item">
            		{{ app()->getLocale() == 'vi' ? $post->name : $post->name_en }}
            	</li>
            </ul>
        </div>
    </div>
    <div class="bg-light" style="padding-bottom: 130px;">
        <div class="container container-post bg-white">
            <div class="row">
                <div class="col-md-12">
                    <figcaption class="figure-caption figure-time">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</figcaption>
                    <h1>{{ app()->getLocale() == 'vi' ? $post->name : $post->name_en }}</h1>
                    <div class="post-content">
                        {!! app()->getLocale() == 'vi' ? $post->content : $post->content_en !!}
                    </div>
                    <div class="post-tag">
                        <span>Tag</span>
                        <ul class="list-inline">
                            @if($post->tags)
                            @foreach (explode(', ', $post->tags) as $tag)
                                <li class="list-inline-item" style="margin-top: 15px;">
                                    <a class="tag-link text-xs-center" href="{{ route('tag', ['tag' => str_slug($tag)]) }}">{{ $tag }}</a>
                                </li>
                            @endforeach
                            @endif()
                        </ul>
                    </div>
                    <div class="post-tag-mobile">
                        <span style="font-size: 17px;">Tag: </span>
                            @if($post->tags)
                            @foreach (explode(', ', $post->tags) as $tag)
                                    <a class="tag-link text-xs-center" href="{{ route('tag', ['tag' => str_slug($tag)]) }}">{{ $tag }}</a>, 
                            @endforeach
                            @endif()
                    </div>
                    <div class="other-post">
                        <ul class="other-post-list">
                            @foreach ($random_posts as $random_post)
                                <li>
                                    <a href="{{ url("tin-tuc/$random_post->slug") }}">{{ $random_post->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div style="margin-top: 15px;" class="fb-comments" data-href="{{ url("post-on-facebook/$post->id") }}" data-numposts="5"></div>
                </div>
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

		.breadcrumb-home ul li {
			font-size: 13px;
		}

		.breadcrumb-home ul li.active {
			opacity: 0.7;
		}

		.breadcrumb-home ul li + li:before {
			content: '\f105';
			font-family: FontAwesome;
			font-weight: normal;
			font-style: normal;
			margin: 0px 11px 0px 8px;
			text-decoration:none;
        }

        .container-post {
            padding: 70px;
        }

        .container-post .figure-caption.figure-time {
			color: #999999;
			font-size: 14px;
        }
        
        .container-post h1 {
            font-size: 36px;
            font-weight: bold;
            line-height: 1.39;
            color: #333333;
        }

        .container-post .post-content {
            margin-top: 27px;
            padding-bottom: 50px;
            border-bottom: 1px solid #e5e5e5;
        }

        .container-post .post-tag {
            margin-top: 20px;
            font-size: 18px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e5e5e5;
        }

        .post-tag-mobile {
            display: none;
        }

        .container-post .post-tag ul {
            display: inline-block;
	        margin-left: 20px;
        }

        .container-post .post-tag .tag-link {
            color: inherit;
            background-color: #f5f5f5;
            text-decoration: none;
            padding: 6px 18px;
            border-radius: 3px;
        }

        .container-post .post-tag .tag-link:hover {
            background-color: #dae0e5!important;
        }

        .container-post .other-post ul.other-post-list {
            padding-left: 20px;
            padding-top: 20px;
            margin-bottom: 0px;
        }

        .container-post .other-post ul.other-post-list li a {
            text-decoration: none;
            color: inherit;
        }

        .container-post .other-post ul.other-post-list li a:hover {
            color: #007bff;
        }

        .container-post .other-post ul.other-post-list li {
            font-size: 18px;
        }

        .container-post .other-post ul.other-post-list li + li {
            margin-top: 20px;
        }

        @media (min-width: 1200px) {
            .container-post {
                max-width: 970px;
            }
        }

        /* Extra Small Devices, Phones */
        @media only screen and (max-width : 480px) {
            .container-post {
                padding: 15px;
            }

            .post-tag-mobile {
                display: block;
            }

            .container-post .post-tag {
                display: none;
            }
        }


	</style>
@endpush

@push('script')
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId={{ config("app.FB_APP_ID") }}&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script type="text/javascript">
        $(document).ready(function () {
            if (window.innerWidth <= 602) {
                $('.post-content').find('img').removeAttr("style");
                $('.post-content').find('img').addClass("img-responsive");
            }
        });
    </script>
@endpush

