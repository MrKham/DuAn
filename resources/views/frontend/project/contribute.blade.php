@extends('app', [
    'hidden_footer' => true
])
@section('html_title')
    Đóng góp dự án
@endsection

@section('head')


@endsection

@section('content')
    <div class="bg-fundstart-content contribute-project">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="first_p">@lang('project.BAN_DONG_GOP_CHO_DU_AN')</p>
                    <h1 class="second_p">{{ $reward->project->name }}</h1>
                    @if (!Auth::user())
                        <p class="third_p"><b>@lang('project.DONG_GOP_KHONG_CAN_DANG_NHAP')</b> (@lang('project.HOAC') <a href="javascript:void(0)" onclick="openLogin()">@lang('project.LOGIN')</a> @lang('project.NEU_BAN_CO_TAI_KHOAN'))</p>
                    @endif

                </div>
            </div>
            <div class="row row-switch-column">
                <div class="col-md-8 column-1">
                    <div class="contribute-bg contribute-info">
                        {!! Form::open(["url" => "/contribute", "method" => "POST"]) !!}
                        <input type="hidden" name="reward_id" value="{{ $reward->id }}">
                        <div class="d-1">
                            <div class="w-75">
                                <p><b>@lang('project.THONG_TIN_CA_NHAN')</b></p>
                                {!! Form::lbText("name", @$user->name, trans('project.HO_TEN')) !!}
                                {!! Form::lbText("telephone", @$user->telephone, trans('project.CONTIBUTE_SO_DIEN_THOAI')) !!}
                                {!! Form::lbText("email_backers", @$user->email, "Email") !!}
                                <p class="notice_info">@lang('project.CONTRIBUTE_INFO_MAIL').</p>
                            </div>
                            <hr class="hr-break">
                            <div class="w-75">
                                <p><b>@lang('project.DIA_CHI_NHAN_HANG')</b></p>
                                {!! Form::lbText("address", @$user->address, trans('project.DIA_CHI')) !!}
                            </div>
                            <hr class="hr-break">
                            <div class="w-75">
                                <p><b>@lang('project.SO_LUONG_GOI_DONG_GOP')</b></p>
                                <div class="form-group">
                                    <label for="Số lượng" class="control-label" style="display: block;">@lang('project.SO_LUONG')</label>
                                    <input class="form-control" name="number" min="1" max="100"  type="number" value="1" style="width: 60%; display: inline-block;">
                                    <span>&nbsp;&nbsp;= <span id="total_payment" style="font-weight: bold;">@convert($reward->cost)</span> VNĐ</span>
                                </div>
                            </div>
                            <hr class="hr-break">
                            <p>@lang('project.BAN_CO_CHAC_DAU_TU')?</p>
                        </div>
                        <div class="form-group d-2">
                            <input type="checkbox" id="agreement" name="rule" class="rule-input">
                            <label class="rule-input-label" for="rule-input">
                                @if (app()->getLocale() == 'vi')
                                Tôi đã đọc hiểu và cam kết tuân thủ <a href="{{ url("dieu-khoan-su-dung") }}" target="_blank">Điều khoản sử dụng</a> &amp; <a href="{{ url(\App\Models\Cms::getUrlByCode('csht_footer')) }}" target="_blank">Chính sách hoàn tiền</a> của FundStart
                                @else
                                I have read and committed to comply with <a href="{{ url("dieu-khoan-su-dung") }}" target="_blank">The terms</a> &amp; <a href="{{ url(\App\Models\Cms::getUrlByCode('csht_footer')) }}" target="_blank">Refund Policy</a> of FundStart
                                @endif
                            </label>
                        </div>
                        <div class="d-3">
                            {!! Form::lbSubmit(trans('project.DONG_GOP'), [
                                'class' => 'btn btn-primary btn-save-from confirmButton',
                                'disabled' => 'disabled'
                            ]) !!}
                        </div>
                        <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-md-4 column-2">
                    <div class="contribute-bg">
                        <div class="reward-box">
                            <div class="reward-box-header">
                                <div class="float-left">
                                    <p class="reward-money">@convert($reward->cost)đ</p>
                                </div>
                                <div class="float-right text-right">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <p class="mt-2 mb-1 font-weight-bold">@lang('project.PHAN_THUONG'):</p>
                            <p style="font-size: 14px;">{!! $reward->description !!}</p>
                            <p class="mt-2 mb-1 font-weight-bold">@lang('project.DU_KIEN_GIAO_HANG'):</p>
                            <p>@lang('project.THANG') {{ Carbon\Carbon::parse($reward->delivery_date)->format('m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
    </div> --}}
@endsection

@push('css')
    <style type="text/css">
        .contribute-project {
            padding-bottom: 180px;
        }
        .first_p {
            margin-top: 30px;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .second_p {
            font-size: 32px;
            line-height: 1.56;
            font-weight: bold;
        }

        .third_p {
            margin-top: 35px;
        }

        .contribute-bg {
            background: #fff;
            border-radius: 3px;
        }

        .contribute-project .contribute-info {
            padding: 50px 0px;
            margin-bottom: 15px;
        }

        .reward-box {
            padding: 30px;
            position: relative;
        }

        .reward-box-header {
            border-bottom: 1px solid #dbe7f7;
        }

        .reward-box-header p {
            margin-bottom: 7px;
        }

        .reward-box .reward-money {
            margin-top: -12px;
            font-size: 24px;
            font-weight: bold;
            color: #0ed1b1;
        }

        .reward-box .reward-dong-gop {
            font-size: 14px;
        }

        .hr-break {
            border-top: 1px dashed #dddddd;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .contribute-info .rule-input {
            width: 20px;
            height: 20px;
        }

        .contribute-info .rule-input-label {
            display: block;
            margin-top: -28px;
            margin-left: 29px;
        }

        .btn-save-from {
            width: 200px;
            margin-top: 20px;
            font-weight: bold;
        }

        .d-1 {
            padding-right: 50px; 
            padding-left: 50px;
        }

        .d-2 {
            padding-left: 50px;
        }

        .d-3 {
            float: right;
            padding-right: 50px; 
            padding-left: 50px;
        }

        .notice_info {
            font-size: 13px;
            margin-bottom: 0px;
            color: #666666;
        }

        /* Extra Small Devices, Phones */
        @media only screen and (max-width : 480px) {
            .d-1 {
                padding-right: 15px; 
                padding-left: 15px;
            }

            .contribute-project {
                padding-bottom: 15px;
            }

            .d-2 {
                padding-left: 15px;
            }

            .d-3 {
                float: initial;
                padding-right: 15px; 
                padding-left: 15px;
            }

            .btn-save-from {
                width: 100%;
                height: 50px;
                font-size: 20px;
            }

            .w-75 {
                width: 100% !important;
            }

            .row-switch-column {
                display: flex; flex-direction: column;
            }

            .column-1 {
                order: 2;
            }

            .column-2 {
                order: 1;
                margin-bottom: 15px;
            }


        }
    </style>
@endpush

@push('script')

<script type="text/javascript">
    var check = $("#agreement").is(":checked") ? false : true;
    $('.confirmButton').prop("disabled", check);

    $("#agreement").on('click', function(){
        if ($(this).is(":checked")){
            $('.confirmButton').prop("disabled", false);
        } else {
            $('.confirmButton').prop("disabled", true);
        }
    });

    $(document).ready(function () {
        $("input[name='number']").on('keyup change', function () {
            var formatter = new Intl.NumberFormat('en-US');
            var i_p = {{ $reward->cost }};
            var total = i_p * $(this).val();
            $('#total_payment').html(formatter.format(total));
        } );
    });
</script>
    
@endpush