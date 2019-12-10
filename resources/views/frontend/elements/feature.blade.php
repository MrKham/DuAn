<div class="row">
    <div class="feature">
        @if(!isset($hidden))
            <div class="row" style="margin-top: 50px">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h2 style="font-weight: bold">@lang('home.PROJECT_DISCOVERY')</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="show-all">
                    <a href="{{url('discover')}}" style="color: #333333">@lang('home.SHOW_ALL') <i class="fa fa-arrow-right"
                                                                                            aria-hidden="true"></i></a>
                </div>
            </div>
        @else
            <div style="margin-top: 50px">
            </div>
        @endif
        <div class="row list-post zoom tech">
            @if(!empty($project['summary']))
                @foreach ($project['summary'] as $summary)
                    <article class="col-lg-3 col-md-6" style="margin-bottom: 10px">
                        <figure class="figure">
                            <div class="parent">
                                <a href="{{ route('project_detail', ['slug_project'=> $summary->slug]) }}">
                                    <img src="{{ url("/lbmediacenter/$summary->avatar_id") }}"
                                         class="figure-img img-fluid"
                                         alt="1">
                                </a>
                                <div class="like-button">
                                    <like-button like="{{ (count($summary->liked) > 0) ? 'liked' : 'no' }}" url="{{ json_encode(url('/')) }}" id="{{ json_encode($summary->id) }}"></like-button>
                                </div>
                            </div>
                            <a href="{{ route('project_detail', ['slug_project'=> $summary->slug]) }}">
                                <figcaption class="figure-title">{{ $summary->name }}</figcaption>
                            </a>
                            <figcaption class="figure-caption"><span
                                        class="send-by">@lang('profile.SEND_BY'): </span>{{ @$summary->creator->name }}</figcaption>
                            <figcaption class="figure-caption descriptions">{{ $summary->headline }}</figcaption>
                            <figcaption class="figure-caption">
                                <div class="row">
                                    <div class="col-lg-6 float-left">
                                        <b>@convert($summary->money_from_backers)
                                            đ </b><span>({{ $summary->progress_text }}
                                            %)</span>
                                    </div>
                                    <div class="col-lg-6 float-right">
                                        <p>@convert($summary->expense)đ</p>
                                    </div>
                                </div>
                                <div class="progress progress-money">
                                    <div class="progress-bar" style="width:{{ $summary->progress_text }}%"></div>
                                </div>
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-lg-6">
                                        <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">
                                            {{ $summary->backers_count }} @lang('profile.CONTRIBUTE_PEOPLE')
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><img src="{{asset('/uploads/icons/cel.png')}}"
                                                width="15px">{{ $summary->days_remain }} @lang('profile.TIME_REMAINING')
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                @endforeach
            @endif
        </div>
    </div>
</div>

