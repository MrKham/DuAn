@extends('layouts.app', [
    'hidden_footer' => isset($hidden_footer) ? true : false
])
@section("body_class")
    menu-on-top
@endsection

@push('sidebar')
@endpush

@stack('new-css')