@extends('app')

@section('sidemenu_lbt_request')
active
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-edit fa-fw "></i> 
                {{ trans('lbt.request.list.title') }}
            <span>
                {{ trans("general.list") }} 
            </span>
        </h1>
    </div>
</div>
<section id="widget-grid" class="">
    <div class="row">
        <article class="col-lg-12">
        	@box_open(trans('lbt.request.list.title'))
                <div>
                    <div class="widget-body no-padding">
                    	@include("layouts.elements.table", [
                    		"url" => "/lbtracker/ajax/request",
                    		"columns" => [
                    			["title" => "Host", "data" => "HTTP_HOST"],
                    			["title" => "IP", "data" => "REMOTE_ADDR"],
                    			["title" => "Method", "data" => "REQUEST_METHOD"],
                    			["title" => "Path", "data" => "PATH_INFO"],
                    			["title" => "User", "data" => "user.name", "defaultContent" => ""],
                    			["title" => "Time", "data" => "created_at"],
                    		]
                    	])
					</div>
                </div>
            @box_close
        </article>
    </div>
</section>
@endsection