@extends('app')

@section ('sidebar_post')active
@endsection

@section('content')
   <div class="breadcrumb-home bg-light">
        <div class="container">
            <ul class="list-inline">
            	<li class="list-inline-item active">
            		<a href="/">@lang('menu.TRANG_CHU')</a>
            	</li>
            	<li class="list-inline-item">
            		@lang('menu.TIN_TUC')
            	</li>
            </ul>
            <h1>@lang('menu.TIN_TUC')</h1>
        </div>
    </div>
    <div class="container">
    	<div class="row list-post">
    		@include('frontend.post.paginate', [
    			'posts' => $posts
    		])
		</div>
		@if(empty($hidden_load_more))
		<div class="tray-more">@lang('general.XEM_THEM')</div>
		@endif
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

		.breadcrumb-home h1 {
			margin-top: 40px;
			font-weight: bold;
		}

		.list-post {
			padding-top: 70px;
		}

		.list-post article {
			margin-bottom: 50px;
		}

		.list-post .figure, .list-post .figure .figure-img {
			width: 100%;
			height: 210px;
			object-fit: cover;
		}

		.list-post .figure a {
			text-decoration: none;
			color: inherit;
		}

		.list-post .figure .figure-title {
			font-size: 18px;
			font-weight: bold;
		}

		.list-post .figure-caption.figure-time {
			color: #999999;
			font-size: 13px;
		}
		.tray-more {
			width: 274px;
			height: 49px;
			border-radius: 3px;
			margin: 0 auto 100px;
			padding: 11px 12px;
    		text-align: center;
			border: solid 1px #666666;
			cursor: pointer;
		}


	</style>
@endpush

@push('script')
	<script>
		var page = {{ $page + 1 }};
		$(document).ready(function () {
			$('.tray-more').click(function (e) {
				JS_Library.showloading();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/ajax/viewmore_post') }}",
                    data: 'page=' + page + '&per_page={{ $per_page }}',
                    success: function (rs) {
						if (rs) {
							$('.list-post').append(rs);
							page++;
						} else {
							$('.tray-more').hide();
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
		});
 	</script>
@endpush

