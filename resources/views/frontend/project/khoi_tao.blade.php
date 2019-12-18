@extends('app')



@section('content')
    <section id="widget-grid">
        <div class="row project-area">
            <div class="col-md-5 project-box" ng-app="UApp" ng-controller="InitController">
                <form name="frmRegister" method="POST" action="{{ url('/du-an') }}">
                    {{ csrf_field() }}
                    <h3 id="title-project">@lang('project.CREATE_PROJECT')</h3>
                    {!! Form::lbText("name", '', trans('project.TOI_MUON_BAT_DAU')." *", trans('project.PROJECT_NAME')) !!}
                    <input type="checkbox" ng-model="addCate" ng-change="changAddCate()" name="rule" class="rule-input">
                    <label class="rule-input-label" for="rule-input">
                        {{ trans('project.ADD_CATEGORY') }}
                    </label>
                    <div ng-if="!addCate">
                        {!! Form::lbSelect('category_id', '', \App\Models\Category::allOption(), trans('project.IN_CATEGORY').' *') !!}
                    </div>
                    <div ng-if="addCate" ng-cloak>
                        {!! Form::lbText("category_name", '', trans('project.IN_CATEGORY') . " *", "") !!}
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="rule" class="rule-input">
                        <label class="rule-input-label" for="rule-input">
                            @if (app()->getLocale() == 'vi')
                            Tôi đồng ý với các <a href="{{ url("dieu-khoan-su-dung") }}" target="_blank">điều khoản của InvestStartup</a> khi tạo dự án
                            @else
                            I agree with the <a href="{{ url("dieu-khoan-su-dung") }}" target="_blank">InvestStartup's Terms & Conditions</a>
                            @endif
                        </label>
                        @if (isset($errors) && $errors->has('rule'))
                            @foreach ($errors->get('rule') as $error)
                                <div class="invalid-feedback" style="display: block;">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    {!! Form::lbSubmit(trans('project.CREATE_PROJECT_INIT'), ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                </form>
            </div>
        </div>

    </section>

@endsection

@push('script')
<script>
    var app = angular.module('UApp', []);

    app.controller('InitController', function($scope, $http, $q) {
        $scope.changAddCate = function() {
            console.log($scope.addCate);
        }
    });
</script>
@endpush

@push('css')
<style type="text/css">
    .project-area {
        padding: 70px 0px 130px;
        background: url({{ asset('/images/BgKhoiTaoDuAn.png')  }}) no-repeat center center fixed;
    }

    .project-box {
        padding: 0px 50px 20px;
        margin: 0px auto;
    }

    .project-area #title-project {
        color: black; 
        font-weight: bold; 
        margin: 20px 0px 30px;  
        font-size: 42px;
    }

    .project-box .rule-input {
        width: 20px;
        height: 20px;
    }

    .project-box .rule-input-label {
        display: block;
        margin-top: -28px;
        margin-left: 29px;
    }
</style>
@endpush
