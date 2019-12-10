@if(!isset($hidden))
    <div class="row focus-title">
        <h2 style="font-weight: bold">@lang('home.FOCUS')</h2>
    </div>
@endif
<div class="row">
    @if (isset($focus))
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="margin-top: 20px">
            <h4 style="font-weight: bold;">
                <a style="color: #333333; text-decoration: none !important;"
                   href="{{ route('project_detail', ['slug_project'=> $focus->slug]) }}">{{ $focus->name }}</a>
            </h4>
            <div class="row" style="margin: 15px 0px 10px 0px">
                <p>@lang('profile.SEND_BY'): <img style="border-radius: 50%; object-fit: cover;"
                                 src="@avatarIfExist($focus->creator->avatar_id)" width="32px"
                                 height="32px"> {{ ' '.@$focus->creator->name }}</p>
            </div>
            <p>{{ $focus->headline }}</p>
            <div class="row">
                <div class="col-lg-6 float-left">
                    <b>@convert($focus->money_from_backers)đ </b><span>({{ $focus->progress_text }}%)</span>
                </div>
                <div class="col-lg-6 float-right">
                    <p>@convert($focus->expense)đ</p>
                </div>
            </div>
            <div class="progress progress-money w-75">
                <div class="progress-bar" style="width:{{ $focus->progress_text }}%"></div>
            </div>
            <div class="row" style="margin-top: 5px">
                <div class="col-lg-6">
                    <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">{{ $focus->backers_count }} @lang('profile.CONTRIBUTE_PEOPLE')</p>
                </div>
                <div class="col-lg-6">
                    <p><img src="{{asset('/uploads/icons/cel.png')}}" width="15px">{{ $focus->days_remain }} @lang('profile.TIME_REMAINING')</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            @if(!isset($hidden))
                <a href="{{ url('the-loai/'.@$focus->category_id.'/all/all') }}" class="Rectangle-20">{{ @$focus->category->name }}</a>
            @endif
            <div class="parent" style="height: auto;">
                <a style="color: #333333; text-decoration: none !important;" href="{{ route('project_detail', ['slug_project'=> $focus->slug]) }}">
                    <img src="{{ url("/lbmediacenter/$focus->avatar_id") }}" width="100%">
                </a>
                <div class="like-button">
                    <like-button like="{{ (count($focus->liked) > 0) ? 'liked' : 'no' }}" url="{{ json_encode(url('/')) }}" id="{{ json_encode($focus->id) }}"></like-button>
                </div>
            </div>
        </div>
    @endif
</div>