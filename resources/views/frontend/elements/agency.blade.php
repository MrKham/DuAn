<style>
    .agency_shape {
        width: 10px;
        height: 19.2px;
        object-fit: contain;
        opacity: 0.5;
        margin-top: 15px;
    }

    .agency_icon {
        width: 50px;
        height: 50px;
        border-radius: 100px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" style="margin-top: 20px">
        <h2 style="font-weight: bold">@lang('home.AGENCY')</h2>
    </div>
</div>
<div class="row">
    <div id="carouselExampleControls" style="width: 100%;" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row list-post zoom" style="width: 90%; margin: auto">
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://songmoi.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/1.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="https://vtcmobile.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/2.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://www.otoxemay.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/3.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://www.biggy-tech.com/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/4.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://www.otoxemay.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/5.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="https://toong.com.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/6.png')}}">
                            </a>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row list-post zoom" style="width: 90%; margin: auto">
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://songmoi.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/1.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="https://vtcmobile.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/2.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://xedoisong.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/3.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://www.biggy-tech.com/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/4.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="http://www.otoxemay.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/5.png')}}">
                            </a>
                        </figure>
                    </article>
                    <article class="col-2 agency_item">
                        <figure class="figure">
                            <a href="https://toong.com.vn/" target="_blank">
                                <img width="100%" src="{{asset('/uploads/agency/6.png')}}">
                            </a>
                        </figure>
                    </article>
                </div>
            </div>
            <a style="width: 50px; opacity: 10" class="carousel-control-prev"
               href="#carouselExampleControls" role="button"
               data-slide="prev">
                <div class="agency_icon">
                    <img class="agency_shape" src="{{asset('/uploads/icons/pre.png')}}">
                </div>
                {{--<i style="color: darkgrey" class="fa fa-chevron-circle-left" aria-hidden="true"></i>--}}
                <span class="sr-only">Previous</span>
            </a>
            <a style="width: 50px; opacity: 10" class="carousel-control-next"
               href="#carouselExampleControls" role="button"
               data-slide="next">
                <div class="agency_icon">
                    <img class="agency_shape" src="{{asset('/uploads/icons/next.png')}}">
                </div>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
