@extends('app')

@section ('sidebar_me')active
@endsection

@section('content')
   <div class="breadcrumb-home bg-light">
        <div class="container">
            <ul class="list-inline">
            	<li class="list-inline-item active">
            		<a href="/">@lang('menu.TRANG_CHU')</a>
            	</li>
            	<li class="list-inline-item">
            		<a href="{{ route('ve-chung-toi') }}">@lang('menu.TIM_HIEU')</a>
            	</li>
            </ul>
            <h1>{{ trans($cms_name) }}</h1>
        </div>
    </div>
    <div class="container">
    	<div class="row list-post">
    		@foreach($cms as $c)
			    <article class="col-lg-4 col-md-6">
			        <figure class="figure">
			            <a href="{{ url("/$c->type/$c->slug") }}">
			                <img src="{{ url("/lbmediacenter/$c->avatar_id") }}" class="figure-img img-fluid" alt="{{ $c->title }}">
			            </a>
			            <a href="{{ url("/$c->type/$c->slug") }}">
			                <figcaption class="figure-title">{{ $c->title }}</figcaption>
			            </a>
			            {{-- <figcaption class="figure-caption">{{ $c->description }}</figcaption> --}}
			        </figure>
			    </article>
			@endforeach 
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

		.breadcrumb-home h1 {
			margin-top: 10px;
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

		.list-post img {
			width: 350px;
			height: 200px;
			object-fit: cover;
		}
		@media (max-width: 680px) {
			.breadcrumb-home {
				padding-top: 25px;
			}
		}

	</style>
@endpush

