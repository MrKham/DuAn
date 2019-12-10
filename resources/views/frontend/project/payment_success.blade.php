@extends('app')



@section('content')
    <section id="widget-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 project-approval">
                    <img src="{{ asset('/images/DuyetDuAnThanhCong.png') }}">
                    <p>@lang('project.CAM_ON_DA_DONG_GOP') {{ ucfirst($project->name) }}</p>
                    <a href="{{ route("project_detail", ["slug_project" => $project->slug]) }}" class="btn btn-outline-primary go-home">@lang('project.VE_TRANG_DU_AN')</a>
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
