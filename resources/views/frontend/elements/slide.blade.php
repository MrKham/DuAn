<div class="row">
    <div class="bd-example" style="width: 100%">
        <div id="carouselExampleCaptions" class="carousel slide slide-home-fundstart" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($slides as $k => $slide)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{@$slide->id}}" class="{{$k == 0 ? 'active' : ''}}"></li>
                @endforeach

            </ol>
            <div class="carousel-inner">
                 @foreach($slides as $k => $slide)
                    <div class="carousel-item {{$k == 0 ? 'active' : ''}}">
                        <a href="{{ $slide->avatar_id != null ? route('project_detail', ['slug_project'=> $slide->slug]) : route('post_detail', ['id' => $slide->id]) }}">
                            <img class="d-block w-100" width="100%"
                             alt="{{@$slide->id}}"
                             src="{{ $slide->avatar_id != null ? url("/lbmediacenter/$slide->avatar_id") : url("/lbmediacenter/$slide->image_id") }}"
                             data-holder-rendered="true">
                         </a>
                        <div class="carousel-caption d-none d-md-block" style="    background-color: hsla(120, 2%, 25%, 0.87); opacity: 0.8; width: 100%;">
                            <h3>{{ $slide->name }}</h3>
                            <p>{{ $slide->description or $slide->headline }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                {{-- <span class="carousel-control-prev-icon slide-head-next" aria-hidden="true"></span> --}}
                <div class="circle-home"><img class="slide-img" src="{{ asset("uploads/slide/slide-previous.png") }}"></div>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                <div class="circle-home"><img class="slide-img" src="{{ asset("uploads/slide/slide-next.png") }}"></div>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

@push('css')
    <style type="text/css">
        .carousel-control-prev .slide-img, .carousel-control-next .slide-img {
            display: inline-block;
            width: 12px;
            height: 22px;
            margin-top: 13px;
        }

        .slide-home-fundstart .carousel-control-prev, .slide-home-fundstart .carousel-control-next {
            width: 6%;
        }

        .slide-home-fundstart .circle-home {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.23);
        }
        .carousel-caption {
            right: unset !important;
            left: unset !important;
        }
    </style>
@endpush
