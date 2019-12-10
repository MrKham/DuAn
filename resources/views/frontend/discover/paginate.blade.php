@if(!empty($data))
    @foreach($data as $cp)
        <article class="col-lg-4 col-md-6" style="margin-bottom: 10px">
            <figure class="figure">
                <div class="parent">
                    <a href="{{ route('project_detail', ['slug_project'=> @$cp->slug]) }}">
                        <img src="{{ url("/lbmediacenter/$cp->avatar_id") }}" class="figure-img img-fluid"
                             alt="1">
                    </a>

                    <div class="like-button">
                        <like-button like="{{ (count($cp->liked) > 0) ? 'liked' : 'no' }}"
                                     url="{{ json_encode(url('/')) }}" id="{{ json_encode($cp->id) }}"></like-button>
                    </div>
                </div>
                <a href="{{ route('project_detail', ['slug_project'=> @$cp->slug]) }}">
                    <figcaption class="figure-title">{{@$cp->name }}</figcaption>
                </a>
                <figcaption class="figure-caption"><span
                            class="send-by">@lang('project.GUI_BOI'): </span>{{ @$cp->creator->name }}</figcaption>
                <figcaption class="figure-caption descriptions">{{ @$cp->headline }}</figcaption>
                <figcaption class="figure-caption">
                    <div class="row">
                        <div class="col-lg-6 float-left">
                            <b>@convert($cp->money_from_backers)đ </b><span>({{ @$cp->progress_text }}
                            %)</span>
                        </div>
                        <div class="col-lg-6 float-right">
                            <p>@convert($cp->expense)đ</p>
                        </div>
                    </div>
                    <div class="progress progress-money">
                        <div class="progress-bar" style="width:{{ $cp->progress_text }}%"></div>
                    </div>
                    <div class="row" style="margin-top: 5px">
                        <div class="col-lg-6">
                            <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">
                                {{ @$cp->backers_count }} @lang('profile.CONTRIBUTE_PEOPLE')
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p><img src="{{asset('/uploads/icons/cel.png')}}"
                                    width="15px"> {{ @$cp->days_remain }} @lang('profile.TIME_REMAINING')
                            </p>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </article>
    @endforeach
@endif