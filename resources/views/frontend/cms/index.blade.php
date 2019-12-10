@extends('app')

@section ('sidebar_me')active
@endsection

@section('content')
   <div class="breadcrumb-home bg-light">
        <div class="container">
            <h1>@lang('menu.TIM_HIEU')</h1>
        </div>
    </div>
    <div class="container">
    	<div class="row list-post">
    		@foreach($boxs as $box)
	    		<article class="col-lg-4 col-md-6">
	    			<a href="{{ url('') . '/' . $box['value'] }}">
	    				<div class="box shadow" style="background-image: url('{{ $box["image"] }}')">
		    				<h3>{{ trans($box["name"]) }}</h3>
		    				{{-- <img src="{{ url('/images/demo.png') }}"> --}}
		    			</div>
	    			</a>
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

		.list-post article a {
			text-decoration: none;
			color: black;
		}

		.shadow {
		  box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 0px 0px rgba(0, 0, 0, 0.14), 0px 1px 0px 0px rgba(0, 0, 0, 0.12);
		  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
		}
		.shadow:hover {
		  box-shadow: 0px 11px 15px -7px rgba(0, 0, 0, 0.2), 0px 24px 38px 3px rgba(0, 0, 0, 0.14), 0px 9px 46px 8px rgba(0, 0, 0, 0.12);
		}

		.shadow-nohover {
		  box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 0px 0px rgba(0, 0, 0, 0.14), 0px 1px 0px 0px rgba(0, 0, 0, 0.12);
		  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.box {
			padding-top: 87px;
			/*background: url(images/demo.png) no-repeat center center;*/
			background-repeat: no-repeat;
			background-position: center center; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			border-radius: 0.3rem;
			height: 200px;
    		width: 100%;
    		text-align: center;
		}

		/*.box:nth-child(2) {
			background-image: url('images/demo.png');
		}*/

		.box h3 {
			background-color: #C3C3C3;
			padding: 5px 0px;
			font-weight: bold;
			opacity: 0.7;
		}

	</style>
@endpush

