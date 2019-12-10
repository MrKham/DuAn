@extends('app')

@section ('contentheader_title')
    funstart-tk
@endsection

@section ('sidebar_user')
    active
@endsection
@push('css')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload {
        width: 100%;
    }

    .profile {
        width: 100%;
        height: 100%;
        background-color: #f1f4f7
    }

    .profile .nav-tabs .nav-link {
        border: none;
    }

    .profile .nav-tabs {
        border: none;
    }

    .profile .nav-item a {
        color: #333333;
        background-color: #f1f4f7 !important;
    }

    .profile .nav-item a:hover {
        border-bottom: solid 1px blue;
        padding-bottom: 2px;
        color: #007bff;
    }

    .profile .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        border-bottom: solid 1px blue;
        padding-bottom: 2px;
        color: #007bff;
    }

    #avatar {
        display: block;
        margin: 30px auto 0 auto;
        width: 120px;
        height: 120px;
        border-radius: 60px;
    }

    .upload-form {
        border: 1px dotted #3a7bd5;
        height: 75px;
    }

    .upload-form #upload {
        text-align: center;
        line-height: 60px;
        color: #3a7bd5;
        margin-top: 5px;
    }

    .upload-form .file-upload {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 75px;
        outline: none;
        opacity: 0;
    }
</style>
@endpush
@section('content')
    <div class="profile">
        @if (Session::has('flash_message'))
            @push('script')
            <script type="text/javascript">
                JS_Library.notify("{!! Session::get('flash_message') !!}", "success");
            </script>
            @endpush
        @endif
        <div class="row">
            <img style="object-fit: cover" id="avatar" src="{{ url(@$user->avatar_id != null ?
                                'lbmediacenter'. '/' . @$user->avatar_id :
                                asset('/uploads/avatar/default.png')) }}" alt="">
        </div>
        <div class="row text-center">
            <h5 style="margin: 20px auto 20px auto; font-weight: bold">{{@$user->name}}</h5>
        </div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="home"
                   aria-selected="false">@lang('profile.GENERAL_INFORMATION')</a>
            </li>
            @if(\App\Models\User::isOwn(@$user->id))
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#transaction" role="tab"
                   aria-controls="contact" aria-selected="false">@lang('profile.TRANSACTION')</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{Session::has('contribute') ? 'active show'  : ''}}" id="profile-tab" data-toggle="tab" href="#contribute" role="tab"
                   aria-controls="profile" aria-selected=" {{Session::has('contribute') ? 'true'  : 'false'}}">@lang('profile.CONTRIBUTED')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#my-project" role="tab"
                   aria-controls="contact" aria-selected="false">@lang('profile.USER_PROJECT')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="liked-tab" data-toggle="tab" href="#liked-project" role="tab"
                   aria-controls="liked" aria-selected="false">@lang('profile.LIKED')</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade {{Session::has('contribute') ? ''  : 'active show'}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container" style="margin-top: 30px; background-color: #fff; padding: 20px 20px">
                    <section id="widget-grid" class="">
                        <div class="container">
                            @if (Session::has('flash_message_v2'))
                                <div class="alert alert-{!! Session::get('flash_level') !!}">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {!! Session::get('flash_message_v2') !!}
                                </div>
                            @endif
                            {{-- {!! Form::lbAlert() !!} --}}
                            {!! Form::open(array("url" => "user/profile/edit/".@$user->id, "method" => "put", "files" => true)) !!}
                            <div class="row">
                                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div>
                                        <div class="widget-body no-padding smart-form">
                                            <fieldset>
                                                {!! Form::lbText("name", @$user->name, "* ".trans('profile.FULL_NAME'), trans('profile.FULL_NAME_PLACE_HOLDER')) !!}
                                                {!! Form::lbText("address", @$user->address, "* ".trans('profile.ADDRESS'), trans('profile.ADDRESS_PLACEHOLDER')) !!}
                                                @if(\App\Models\User::isOwn(@$user->id))
                                                {!! Form::lbText("email", @$user->email, "* ".trans('profile.EMAIL'), trans('profile.EMAIL_PLACE_HOLDER')) !!}
                                                <p style="color: #666666">
                                                    @lang('profile.MESSAGE')
                                                </p>
                                                {!! Form::lbText("telephone_o", @$user->telephone, "* ".trans('profile.PHONE'), trans('profile.PHONE_PLACEHOLDER')) !!}
                                                @include('custom.password', ['name' => 'password', 'title' => trans('profile.PASSWORD')])
                                                @include('custom.password', ['name' => 'cf-password', 'title' => trans('profile.PASSWORD_CONFIRM')])
                                                @endif

                                            </fieldset>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div>
                                        <div class="widget-body">
                                            <fieldset>
                                                {!! Form::lbText("company", @$user->company, trans('profile.COMPANY'), trans('profile.COMPANY_PLACEHOLDER')) !!}
                                                {!! Form::lbText("website", @$user->website, trans('profile.WEBSITE'), trans('profile.WEBSITE_PLACEHOLDER')) !!}
                                                @include('custom.textarea', ['name' => 'info', 'title' => trans('profile.INFORMATION'), 'value' => @$user->information])
                                                @if(\App\Models\User::isOwn(@$user->id  ))
                                                <div class="upload-form">
                                                    <input class="file-upload" name="avatar" type="file">
                                                    <p id="upload">@lang('profile.CHOOSE_FILE')</p>
                                                </div>
                                                @endif
                                            </fieldset>
                                            @if(\App\Models\User::isOwn(@$user->id))
                                            <p style="margin-top: 15px">
                                                @lang('profile.WARNING'):<br/>

                                                @lang('profile.REQUIRED_INPUT')<br/>

                                                @lang('profile.CONDITION')
                                            </p>
                                            <footer style="text-align: right; margin-top: 20px">
                                                <a class="btn btn-light" href="{{ url('/') }}">@lang('profile.BACK')</a>
                                                {!! Form::lbSubmit() !!}
                                            </footer>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </section>

                </div>
            </div>
            @if(\App\Models\User::isOwn(@$user->id))
            <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">4</div>
            @endif
            <div class="tab-pane fade {{Session::has('contribute') ? 'active show'  : ''}}" id="contribute" role="tabpanel" aria-labelledby="contribute-tab">
                <div class="container" style="margin-top: 30px; background-color: #fff; padding: 20px 20px">
                    <section id="widget-grid" class="">
                        {{-- {!! Form::lbAlert() !!} --}}
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">@lang('profile.PROJECT')</th>
                                <th scope="col">@lang('profile.TIME')</th>
                                <th scope="col">@lang('profile.CONTRIBUTE_VALUE')</th>
                                <th scope="col">@lang('profile.STATUS')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($backer))
                                @foreach($backer as $b)
                                    <tr>
                                        <td>{{ @$b->project->name }}</td>
                                        <td>{{ @$b->created_at }}</td>
                                        <td>{{ @number_format($b->amount) }} đ</td>
                                        <td>
                                            <button class="btn btn-sm btn-success">{{ @$b->project->status }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </section>
                </div>

            </div>
            <div class="tab-pane fade" id="my-project" role="tabpanel" aria-labelledby="my-project-tab">
                <div class="container" style="margin-top: 30px; background-color: #fff; padding: 20px 20px">
                    <div class="row">
                        @if(isset($my_project))
                            @foreach ($my_project as $summary)
                                <article class="col-lg-4 col-md-6" style="margin-bottom: 10px">
                                    <figure class="figure">
                                        <div class="parent">
                                            <a href="{{ url("du-an/$summary->id/edit") }}">
                                                <img src="{{ isset($summary->avatar_id) ? url("/lbmediacenter/$summary->avatar_id") : asset("/images/ProjectDefault.png") }}"
                                                     class="figure-img img-fluid"
                                                     alt="1">
                                            </a>
                                        </div>
                                        <a href="{{ url("du-an/$summary->id/edit") }}">
                                            <figcaption class="figure-title">{{ @$summary->name }}</figcaption>
                                        </a>
                                        <figcaption class="figure-caption"><span
                                                    class="send-by">@lang('profile.SEND_BY'): </span>{{ @$summary->creator->name }}
                                        </figcaption>
                                        <figcaption class="figure-caption">{{ @$summary->headline }}</figcaption>
                                        <figcaption class="figure-caption">
                                            <div class="row">
                                                <div class="col-lg-6 float-left">
                                                    <b>@convert($summary->money_from_backers)
                                                        đ </b><span>({{ @$summary->progress_text }}
                                                        %)</span>
                                                </div>
                                                <div class="col-lg-6 float-right">
                                                    <p>@convert(@$summary->expense)đ</p>
                                                </div>
                                            </div>
                                            <div class="progress progress-money">
                                                <div class="progress-bar"
                                                     style="width:{{ $summary->progress_text }}%"></div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <div class="col-lg-6">
                                                    <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">
                                                        {{ @$summary->backers_count }} @lang('profile.CONTRIBUTE_PEOPLE')
                                                    </p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p><img src="{{asset('/uploads/icons/cel.png')}}"
                                                            width="15px">{{ @$summary->days_remain }} @lang('profile.TIME_REMAINING')
                                                    </p>
                                                </div>
                                            </div>
                                            @if (@$summary->status == 'online')
                                                @if ($summary->progress_text >= 100)
                                                    <div style="display: inline-flex; background: #caefec; width: 100%; padding: 5px;">
                                                        <img style="margin-top: 5px"
                                                             src="{{asset('uploads/icons/success.png')}}" width="24px"
                                                             height="24px">
                                                        <p style="color: #0ed1b1; font-size: 14px; margin: 5px 0 5px 10px; font-weight: bold">
                                                            @lang('profile.CALLING_CAPITAL_SUCCESS')</p>
                                                    </div>
                                                @elseif ($summary->progress_text < 100 && $summary->days_remain == 0)
                                                    <div style="display: inline-flex; background: #FDEDED; width: 100%; padding: 5px;">
                                                        <img style="margin-top: 5px"
                                                             src="{{asset('uploads/icons/fail.png')}}" width="24px"
                                                             height="24px">
                                                        <p style="color: #E21E1E; font-size: 14px; margin: 5px 0 5px 10px; font-weight: bold">
                                                            @lang('profile.CALLING_CAPITAL_FAIL')</p>
                                                    </div>
                                                @else
                                                    <div style="display: inline-flex; background: #F0F5FC; width: 100%; padding: 5px;">
                                                        <img style="margin-top: 5px"
                                                             src="{{asset('uploads/icons/calling.png')}}" width="24px"
                                                             height="24px">
                                                        <p style="color: #3A7BD5; font-size: 14px; margin: 5px 0 5px 10px; font-weight: bold">
                                                            @lang('profile.CALLING_CAPITAL')</p>
                                                    </div>
                                                @endif
                                            @elseif ($summary->status == 'delete')
                                                <div class="text-center"
                                                     style="background: #FDEDED;display: inline-flex; width: 100%; padding: 5px;">
                                                    <p style="color: #E21E1E;font-size: 14px; margin: 5px 0 5px 10px; font-weight: bold">
                                                        @lang('profile.DELETED')</p>
                                                </div>
                                            @else
                                                <div class="bg-warning text-center"
                                                     style="display: inline-flex; width: 100%; padding: 5px;">
                                                    <p class="text-light"
                                                       style="font-size: 14px; margin: 5px 0 5px 10px; font-weight: bold">
                                                        @lang('profile.DRAFT')</p>
                                                </div>
                                            @endif
                                        </figcaption>
                                    </figure>
                                </article>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="liked-project" role="tabpanel" aria-labelledby="liked-project-tab">
                <div class="container" style="margin-top: 30px; background-color: #fff; padding: 20px 20px">
                    <div class="row">
                        @if(isset($liked))
                            @foreach ($liked as $like)
                                <article class="col-lg-4 col-md-6" style="margin-bottom: 10px">
                                    <figure class="figure">
                                        <div class="parent">
                                            <a href="{{ url("du-an/$like->slug") }}">
                                                <img src="{{ isset($like->avatar_id) ? url("/lbmediacenter/$like->avatar_id") : asset("/images/ProjectDefault.png") }}"
                                                     class="figure-img img-fluid"
                                                     alt="1">
                                            </a>
                                        </div>
                                        <a href="{{ url("du-an/$like->slug") }}">
                                            <figcaption class="figure-title">{{ @$like->name }}</figcaption>
                                        </a>
                                        <figcaption class="figure-caption"><span
                                                    class="send-by">@lang('profile.SEND_BY'): </span>{{ @$like->creator->name }}
                                        </figcaption>
                                        <figcaption class="figure-caption">{{ @$like->headline }}</figcaption>
                                        <figcaption class="figure-caption">
                                            <div class="row">
                                                <div class="col-lg-6 float-left">
                                                    <b>@convert(@$like->money_from_backers)
                                                        đ </b><span>({{ @$like->progress_text }}
                                                        %)</span>
                                                </div>
                                                <div class="col-lg-6 float-right">
                                                    <p>@convert(@$like->expense)đ</p>
                                                </div>
                                            </div>
                                            <div class="progress progress-money">
                                                <div class="progress-bar"
                                                     style="width:{{ $like->progress_text }}%"></div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <div class="col-lg-6">
                                                    <p><img src="{{asset('/uploads/icons/user.png')}}" width="15px">
                                                        {{ @$like->backers_count }} @lang('profile.CONTRIBUTE_PEOPLE')
                                                    </p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p><img src="{{asset('/uploads/icons/cel.png')}}"
                                                            width="15px">{{ @$like->days_remain }} @lang('profile.TIME_REMAINING')
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
        </div>
    </div>

@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('.file-upload').change(function () {
            $('#upload').text(this.files[0].name);
        });
    });

</script>
@endpush

