@push('new-css')
    <style>
        .like-button {
            position: absolute;
            top: 2%;
            right: 6%;
        }
    </style>
@endpush
@if(!empty($data))
    @foreach($data as $cp)
        <article class="col-lg-4 col-md-6" style="margin-bottom: 10px">
            <figure class="figure">
                <div class="parent">
                    <a href="{{ route('project_detail', ['slug_project'=> $cp->slug]) }}">
                        <img src="{{ url("/lbmediacenter/".@$cp->avatar_id) }}" class="figure-img img-fluid"
                             alt="1">
                    </a>
                    <div class="like-button">
                        <like-button like="{{ (count($cp->liked) > 0) ? 'liked' : 'no' }}"
                                     url="{{ json_encode(url('/')) }}"
                                     id="{{ json_encode($cp->id) }}"></like-button>
                    </div>
                </div>
                <a href="{{ route('project_detail', ['slug_project'=> $cp->slug]) }}">
                    <figcaption class="figure-title">{{ @$cp->name }}</figcaption>
                </a>
                <figcaption class="figure-caption"><span
                            class="send-by">Gửi bởi: </span>{{ @$cp->creator->name }}</figcaption>
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
                                {{ @$cp->backers_count }} người đóng góp
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p><img src="{{asset('/uploads/icons/cel.png')}}" width="15px">{{ @$cp->days_remain }}
                                ngày
                                còn lại
                            </p>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </article>
    @endforeach
@endif
@push('script')
    <script type="text/javascript" src="{{ asset('angularjs/modules/like/app.js') }}"></script>
    <script>
        var app = angular.module('HomeApp', ['utilApp']);
    </script>
@endpush