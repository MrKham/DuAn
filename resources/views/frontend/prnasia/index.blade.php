@extends('app')

@section('content')
    <div class="container" id="list-post">
        <div id="w19238_landing"></div>
        <!-- PR Newswire Widget Landing Page Code Ends Here -->
	</div>
	@include("layouts.partials.near_footer")

@endsection

@push('css')
<style>
    #list-post {
        min-height: 100px;
        padding: 20px 0;
    }
</style>
@endpush

@push('script')
<!-- PR Newswire Widget Landing Page Code Starts Here -->
<script>
    var _wsc = document.createElement('script');_wsc.src =
    "//tools.prnewswire.com/zh-cn/live/19238/landing.js";document.getElementsByTagName('Head')[0].appendChild(_wsc);
    
</script>
@endpush

