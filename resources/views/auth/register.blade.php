@extends('app')



@section('content')
    <div class="row register-area">
        <div class="col-md-5 register-box">
            <form name="frmRegister" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h3 style="color: black; font-weight: bold; margin-top: 20px; font-size: 32px;">@lang('menu.DANG_KY')</h3>
                </div>
                {{-- <hr/> --}}
                <div class="modal-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                    {!! Form::materialText("name", '', trans('general.ACCOUNT')." *", "Nhập tài khoản") !!}
                    {!! Form::materialText("r-email", '', trans('general.EMAIL')." *", "Nhập Email") !!}
                    {!! Form::materialPassword("r-password", trans('general.PASSWORD')." *") !!}
                    {!! Form::materialPassword("cf-password", trans('general.PASSWORD_CONFIRM')." *") !!}
                    <div id="register_recaptcha">
                        <div class="g-recaptcha" data-sitekey="{{ config("app.RECAPTCHA_SITE_KEY") }}"></div>
                        @if (isset($errors) && $errors->has('g-recaptcha-response'))
                            @foreach ($errors->get('g-recaptcha-response') as $error)
                                <div class="invalid-feedback" style="display: block;">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    {!! Form::lbSubmit(trans('menu.DANG_KY'), ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    <span class="clearfix"></span>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('css')
<style type="text/css">
    .register-area {
        background: #F1F4F7;
        padding: 70px 0px 130px;
    }

    .register-box {
        background: #fff;
        padding: 0px 50px 20px;
        margin: 0px auto;
    }
    #register_recaptcha {
        width: 304px;
        margin: 15px auto 20px;
    }

    /* Extra Small Devices, Phones */
    @media only screen and (max-width : 480px) {
        .register-area {
            padding: 15px 0px 30px;
        }

        .register-box {
            padding: 0px 15px 20px;
        }
    }
</style>
@endpush

@push('script')
    <script>
      
    </script>
@endpush
