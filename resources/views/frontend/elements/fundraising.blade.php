@push('new-css')
<style>
    .home .MultiCarousel {
        float: left;
        overflow: hidden;
        padding: 15px;
        width: 100%;
        position: relative;
    }

    .home .MultiCarousel .MultiCarousel-inner {
        transition: 1s ease all;
        float: left;
    }

    .home .MultiCarousel .MultiCarousel-inner .item {
        float: left;
    }

    .home .MultiCarousel .MultiCarousel-inner .item > div {
        padding: 10px;
        margin: 10px;
        background: #f1f1f1;
        color: #666;
    }

    .home .MultiCarousel .leftLst, .MultiCarousel .rightLst {
        position: absolute;
        border-radius: 50%;
        top: calc(50% - 20px);
    }

    .home .MultiCarousel .leftLst {
        left: 0;
    }

    .home .MultiCarousel .rightLst {
        right: 0;
    }
</style>
@endpush
<div class="row" style="margin-top: 50px">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="margin-top: 20px">
        <h2 style="font-weight: bold">@lang('home.FUNDRAISING')</h2>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="margin-top: 20px">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: transparent">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach ($cate as $c)
                        @if($c->parent_id == null)
                            @if($c->list_child->isEmpty())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('the-loai/'.$c->id.'/all/all') }}">{{$c->name}}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$c->name}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('the-loai/'.$c->id.'/all/all') }}">All</a>
                                        <div class="dropdown-divider"></div>
                                        @foreach ($c->list_child as $lc)
                                            <a class="dropdown-item"
                                               href="{{ url('the-loai/'.$lc->id.'/all/all') }}">{{$lc->name}}</a>
                                            <div class="dropdown-divider"></div>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endif


                    @endforeach

                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row home list-post zoom">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
            <div class="MultiCarousel-inner">
                @foreach ($project['fund'] as $key => $fund)
                    <div class="item">
                        <div class="pad15">
                            <article>
                                <figure class="figure">
                                    <div class="parent">
                                        <a href="{{ route('project_detail', ['slug_project'=> $fund->slug]) }}">
                                            <img src="{{ url("/lbmediacenter/$fund->avatar_id") }}"
                                                 class="figure-img img-fluid" alt="1">
                                        </a>
                                        <div class="like-button">
                                            <like-button like="{{ (count($fund->liked) > 0) ? 'liked' : 'no' }}" url="{{ json_encode(url('/')) }}" id="{{ json_encode($fund->id) }}"></like-button>
                                        </div>
                                    </div>
                                    <a href="{{ route('project_detail', ['slug_project'=> $fund->slug]) }}">
                                        <figcaption class="figure-title">{{ $fund->name }}</figcaption>
                                    </a>
                                    <figcaption class="figure-caption"><span
                                                class="send-by">@lang('profile.SEND_BY'): </span>{{ @$fund->creator->name }}</figcaption>
                                    <figcaption class="figure-caption descriptions">{{ $fund->headline }}</figcaption>
                                    <figcaption class="figure-caption">
                                        <div class="row">
                                            <div class="col-lg-6 float-left">
                                                <b>@convert($fund->money_from_backers)
                                                    đ </b><span>({{ $fund->progress_text }}%)</span>
                                            </div>
                                            <div class="col-lg-6 float-right">
                                                <p>@convert($fund->expense)đ</p>
                                            </div>
                                        </div>
                                        <div class="progress progress-money">
                                            <div class="progress-bar" style="width:{{ $fund->progress_text }}%"></div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <div class="col-lg-6">
                                                <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">
                                                    {{ $fund->backers_count }} @lang('profile.CONTRIBUTE_PEOPLE')
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p><img src="{{asset('/uploads/icons/cel.png')}}"
                                                        width="15px"> {{ $fund->days_remain }} @lang('profile.TIME_REMAINING')
                                                </p>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>

                        </div>
                    </div>
                @endforeach
            </div>
            <div style="background: #00000073;width: 22px;text-align: center;" class="circle-home leftLst">
                <img class="slide-img" src="{{ asset("uploads/slide/slide-previous.png") }}">
            </div>
            <div style="background: #00000073;width: 22px;text-align: center;" class="circle-home rightLst">
                <img class="slide-img" src="{{ asset("uploads/slide/slide-next.png") }}">
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();


        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 992) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            }
            else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });
</script>
@endpush
