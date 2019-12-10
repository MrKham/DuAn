@extends('app')



@section('content')
    <section id="widget-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 project-approval">
                    <img src="{{ asset('/images/DuyetDuAnThanhCong.png') }}">
                    <h3>@lang('project.DU_AN_DA_DUOC_GUI')</h3>
                    <p>@lang('project.CAM_ON_TAO_DU_AN').</p>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary go-home">@lang('project.TRO_VE_TRANG_CHU')</a>
                </div>
            </div>
        </div>

    </section>

@endsection

@push('css')
<style type="text/css">
    .project-approval {
        text-align: center;
        padding: 70px 0px 130px;
        background: url( {{ asset('/images/BgKhoiTaoDuAn.png')  }}) no-repeat center center fixed;
    }

    .project-approval img {
        margin-top: 80px;
    }

    .project-approval h3 {
        font-size: 24px;
        font-weight: bold;
    }

    .project-approval p {
        font-size: 16px;
    }

    .project-approval a.go-home {
        margin-top: 20px;
        padding-left: 25px;
        padding-right: 25px;
    }
</style>
@endpush
