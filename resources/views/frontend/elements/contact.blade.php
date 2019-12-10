<div class="row contact">
    <div class="row" style="margin-top: 50px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style="font-weight: bold">@lang('home.ABOUT_US')</h2>
        </div>
    </div>
    <div class="row list-post zoom">
        @if(isset($post))
            @foreach($post as $p)
                <article class="col-lg-4 col-md-6">
                    <figure class="figure">
                        <div class="parent">
                            <a href="#">
                                <img src="{{ url("/lbmediacenter/".@$p->image_id) }}" class="figure-img img-fluid"
                                     alt="1">
                            </a>
                        </div>
                        <a href="#">
                            <figcaption class="figure-title">{{@$p->name}}</figcaption>
                        </a>
                        <figcaption class="figure-caption post-desc">{{@$p->description}}
                        </figcaption>
                        <figcaption class="figure-caption">
                            <a href="{{ url('/tin-tuc/'.$p->slug) }}">@lang('home.SHOW_DETAIL') <i
                                        class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </figcaption>
                    </figure>
                </article>
            @endforeach
        @endif
    </div>
</div>