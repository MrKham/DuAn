@extends('app')

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
    .search-more {
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

@section ('sidebar_post')active
@endsection

@section('content')
    <div class="breadcrumb-home bg-light">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item active">
                    <a href="{{ url('/') }}">@lang('menu.TRANG_CHU')</a>
                </li>
                <li class="list-inline-item">
                    @lang('search.SEARCH')
                </li>
            </ul>
            <h1>@lang('search.SEARCH')</h1>
        </div>
    </div>
    <div class="container home">
        <div class="row list-post zoom search-result">
            @if(!empty($data))
                @foreach ($data as $d)
                    <article class="col-lg-4 col-md-6" style="margin-bottom: 10px">
                        <figure class="figure">
                            <div class="parent">
                                <a href="{{ route('project_detail', ['slug_project'=> $d->slug]) }}">
                                    <img src="{{ url("/lbmediacenter/$d->avatar_id") }}"
                                         class="figure-img img-fluid"
                                         alt="1">
                                </a>
                            </div>
                            <a href="{{ route('project_detail', ['slug_project'=> $d->slug]) }}">
                                <figcaption class="figure-title">{{ $d->name }}</figcaption>
                            </a>
                            <figcaption class="figure-caption"><span
                                        class="send-by">Gửi bởi: </span>{{ @$d->creator->name }}</figcaption>
                            <figcaption class="figure-caption">{{ $d->headline }}</figcaption>
                            <figcaption class="figure-caption">
                                <div class="row">
                                    <div class="col-lg-6 float-left">
                                        <b>@convert($d->money_from_backers)
                                            đ </b><span>({{ $d->progress_text }}
                                            %)</span>
                                    </div>
                                    <div class="col-lg-6 float-right">
                                        <p>@convert($d->expense)đ</p>
                                    </div>
                                </div>
                                <div class="progress progress-money">
                                    <div class="progress-bar" style="width:{{ $d->progress_text }}%"></div>
                                </div>
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-lg-6">
                                        <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">
                                            {{ $d->backers_count }} người đóng góp
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><img src="{{asset('/uploads/icons/cel.png')}}"
                                                width="15px">{{ $d->days_remain }} ngày còn lại
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                @endforeach
            @endif
        </div>
        <div class="search-more" onclick="searchMore()">@lang('general.XEM_THEM')</div>
    </div>
    @include("layouts.partials.near_footer")

@endsection

@push('script')
<script>
    var page = {{ $page + 1 }};
    function searchMore() {
        JS_Library.showloading();
        $.ajax({
            type: "GET",
            url: "{{ url('/ajax/searchmore_tech/'.@$key) }}",
            data: 'page=' + page + '&per_page={{ $per_page }}',
            success: function (rs) {
                if (rs) {
                    $('.search-result').append(rs);
                    page++;
                } else {
                    $('.search-more').hide();
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

