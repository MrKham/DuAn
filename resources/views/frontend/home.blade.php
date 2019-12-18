@extends('app')
@section('content')
    <div class="container home" ng-app="HomeApp">
        @if (Session::has('flash_message'))
            @push('script')
                <script type="text/javascript">
                    JS_Library.notify("{!! Session::get('flash_message') !!}", "success"); 
                </script>
            @endpush
        @endif
        @include('frontend.elements.slide', [
            'slides' => $slides
        ])
        @include('frontend.elements.focus', [
            'focus' => $project['focus']
        ])
        @include('frontend.elements.fundraising', [
            'project' => $project, 'cate' => $cate
        ])
        @include('frontend.elements.feature', [
            'project' => $project
        ])
        <!-- @include('frontend.elements.contact') -->
        <!-- @include('frontend.elements.agency') -->
    </div>
    @include("layouts.partials.near_footer")
@endsection
@push('script')
<script type="text/javascript" src="{{ asset('angularjs/modules/like/app.js') }}"></script>
<script>
    var app = angular.module('HomeApp', ['utilApp']);
</script>
@endpush

@push('css')
<style type="text/css">
    .parent {
        position: relative;
    }

    .like-button {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
@endpush
