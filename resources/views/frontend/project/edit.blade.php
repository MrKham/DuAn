@extends('app')



@section('content')
    @if (Session::has('flash_message'))
        @push('script')
            <script type="text/javascript">
                JS_Library.notify("{!! Session::get('flash_message') !!}", "success"); 
            </script>
        @endpush
    @endif
    <div class="container edit-info">
        @if (!$is_can_edit_form)
            <div class="alert alert-warning" style="margin-top: 10px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @lang('project.DUA_AN_DA_KHOA_SUA_THONG_TIN')
            </div>
        @endif
        <div class="row nav-project">
            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#p_information">@lang('project.THONG_TIN')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#p_description">@lang('project.MO_TA')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#p_reward">@lang('project.PHAN_THUONG')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#p_owner">@lang('project.CHU_DU_AN')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#p_update">@lang('project.CAP_NHAT')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#p_investor">@lang('project.NHA_DAU_TU')</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="float-right button-action">
                    <div class="d-table-cell">
                        <form name="preview-form" action="{{ url("/preview-du-an") }}" method="POST" target="_blank">
                            {{ csrf_field() }}
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <button type="submit" class="btn btn-outline-primary preview">@lang('project.PREVIEW')</button>
                        </form>
                    </div>
                    @if(Auth::user()->hasRole('project_mod'))
                    <div class="d-table-cell">
                        <form name="duyet-duan" action="{{ url("/duyet-du-an") }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <button type="submit" class="btn btn-primary save-project">@lang('project.DUYET_DU_AN')</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(["url" => "/du-an/$project->id", "method" => "PUT", "files" => true]) !!}
    <section class="content-area bg-fundstart-content">
        <div class="container edit-info">
            <div class="row content-box">
                <div class="col-md-9">
                    <div class="tab-content" ng-app="UApp">
                        <!-- tab thông tin -->
                        <div id="p_information" class="tab-pane active">
                            {!! Form::lbText("name", @$project->name, trans('project.TEN_DU_AN')." *") !!}
                            @if ($project->category_id)
                                {!! Form::lbSelect('category_id', @$project->category_id, \App\Models\Category::allOption(), trans('project.LINH_VUC').' *') !!}
                            @else
                                {!! Form::lbText("category_name", @$project->category_name, trans('project.LINH_VUC')." *", "") !!}
                            @endif
                            {!! Form::lbNumber('expense', @$project->expense, trans('project.KINH_PHI_DU_AN').' *') !!}
                            {!! Form::lbNumber('plan_days', @$project->plan_days, trans('project.SO_NGAY_DU_DINH_HOAN_THANH').' *') !!}
                            {!! Form::lbSelect('registration_service', @$project->registration_service, [
                                [ 'name' => trans('project.CHON_DICH_VU_DANG_KY'), 'value' => '' ],
                                [ 'name' => trans('project.SEL_GOI_VON_CONG_DONG'), 'value' => 'GOI_VON' ],
                                [ 'name' => trans('project.SEL_GIOI_THIEU_Y_TUONG'), 'value' => 'Y_TUONG' ],

                            ], trans('project.DICH_VU_DANG_KY').' *') !!}


                            <div class="form-group ">
                                <label for="open_port_day" class="control-label" style="width: 100%;">@lang('project.NGAY_MO_CONG_GOI_VON')</label>
                                {{ Form::select('open_port_date[year]', \App\Classes\Helper::getYearOption(), substr(@$project->open_port_date, 0, 4), [
                                    'id' => 'year_open', 'class' => 'form-control', 'style' => 'width: 80px;'
                                ]) }}
                                &nbsp;
                                {{ Form::select('open_port_date[month]', \App\Classes\Helper::getMonthOption(), substr(@$project->open_port_date, 5, 2), [
                                    'id' => 'month_open', 'class' => 'form-control', 'style' => 'width: 80px;'
                                ]) }}
                                &nbsp;
                                {{ Form::select('open_port_date[day]', \App\Classes\Helper::getDayOption(), substr(@$project->open_port_date, 8, 2), [
                                    'id' => 'day_open', 'class' => 'form-control', 'style' => 'width: 67px;'
                                ]) }}
                                &nbsp;&nbsp;-&nbsp;&nbsp;
                                {{ Form::select('open_port_date[hour]', \App\Classes\Helper::getHourOption(), substr(@$project->open_port_date, 11, 2), [
                                    'id' => 'hour_open', 'class' => 'form-control', 'style' => 'width: 67px;'
                                ]) }}
                                &nbsp;:&nbsp;
                                {{ Form::select('open_port_date[minute]', \App\Classes\Helper::getMinuteOption(), substr(@$project->open_port_date, 14, 2), [
                                    'id' => 'minute_open', 'class' => 'form-control', 'style' => 'width: 67px;'
                                ]) }}
                            </div>
                            {!! Form::lbCheckbox("is_not_open_port", @$project->is_not_open_port, trans('project.DONG_CONG_GOI_VON')) !!}
                            <p class="notice_info" style="margin-bottom: 15px;">
                                @lang('project.LUU_Y_MOT').
                            </p>
                            {!! Form::lbSubmit(trans('project.LUU'), ['class' => 'btn btn-primary btn-save-from']) !!}
                        </div>

                        <!-- tab phần thưởng -->
                        <div id="p_reward" class="p_general_padding tab-pane fade" ng-controller="ProjectRewardController" ng-init="init()">
                            <p>
                                @lang('project.PT_LY1').
                            </p>
                            <p>
                                @lang('project.PT_LY2').
                            </p>
                            <div class="p_u_box" ng-repeat="x in listU track by $index" ng-cloak>
                                <div class="float-left w-40">
                                    <h3>@lang('project.PHAN_THUONG') @{{ $index + 1 }}</h3>
                                </div>
                                <div class="float-right w-60">
                                    <button ng-click="saveInfo(x)" type="button" class="btn btn-light btn-p-update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> <span class="hidden-on-xs">@lang('project.PT_LUU')</span>
                                    </button>
                                    <button ng-click="removeU($index, x)" type="button" class="btn btn-light btn-p-update">
                                        <i class="fa fa-trash" aria-hidden="true"></i> <span class="hidden-on-xs">@lang('project.PT_XOA')</span>
                                    </button>
                                </div>
                                <div style="clear: both;height: 30px;"></div>
                                <div class="form-group row">
                                    <label for="reward_cost" class="col-sm-4 col-form-label">@lang('project.MUC_GIA')</label>
                                    <div class="col-sm-8 input-group">
                                        <input type="number" ng-model="x.cost" class="form-control" name="reward_cost">
                                        <div class="input-group-append">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reward_delivery_date" class="col-sm-4 col-form-label">@lang('project.DU_KIEN_GIAO_HANG')</label>
                                    <div class="col-sm-8">
                                        <input type="text" ng-model="x.delivery_date" class="form-control bdatepicker" name="reward_delivery_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reward_description" class="col-sm-4 col-form-label">@lang('project.MO_TA_GIAI_THUONG')</label>
                                    <div class="col-sm-8">
                                        <textarea ng-model="x.description" class="form-control" name="reward_description" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4">
                                        <label class="form-check-label" for="reward_is_limited" style="margin-left: 20px;">
                                            <input ng-model="x.is_limited_check" class="form-check-input" type="checkbox" name="reward_is_limited" ng-change="changeCheckBoxReward(x)">
                                            <span>@lang('project.GIOI_HAN_SO_LUONG')</span>
                                        </label>
                                        <input type="number" ng-show="x.is_limited_check" ng-model="x.limite_number" class="form-control" name="reward_limite_number" style="margin-top: 10px;">
                                    </div>
                                </div>
                            </div>
                            <div class="add-p-update" ng-click="addU()">
                                <img src="{{ asset("/images/Them.png") }}">
                                @lang('project.THEM_PHAN_THUONG')
                            </div>
                        </div>

                        <!-- tab mô tả -->
                        <div id="p_description" class="p_general_padding tab-pane fade">
                            @if (isset($project->avatar_id))
                                @include('custom.file_input', ['name' => 'avatar', 'title' => trans('project.ANH_DAI_DIEN_CUA_DU_AN'), 'image_url' => url("/lbmediacenter/$project->avatar_id")])
                            @else
                                @include('custom.file_input', ['name' => 'avatar', 'title' => trans('project.ANH_DAI_DIEN_CUA_DU_AN')])
                            @endif

                            <div ng-controller="UploadMultiController" ng-init="init()">
                                <label for="multi_file" class="control-label" style="display: block;">@lang('project.SLIDESHOW_ANH_DU_AN')</label>
                                <div id="chosse_multi_file" ng-click="chooseMultiFile()">
                                    <i class="fa fa-plus" aria-hidden="true" style="font-size: 18px; margin-top: 8px;"></i>
                                    <p style="font-size: 12px;">@lang('project.THEM_ANH')</p>
                                    <input id="file-input-multi" ng-model="file_input_multi" type="file" accept="image/*" onchange="angular.element(this).scope().fileChanged(event)" multiple style="display: none;" />
                                </div>
                                <div id="file-display" ng-repeat="x in dataFile track by $index" ng-cloak>
                                    <img class="list-img" src="@{{ x.imageUrl }}">
                                    <div  ng-click="deleteFile($index, x)">
                                        <img class="delete-img" src="{{ url('/uploads/icons/close.png') }}">
                                    </div>
                                </div>
                                {{-- <div id="file-display">
                                    <img src="/images/demo.png">
                                </div> --}}
                                <p class="notice_info" style="margin-bottom: 15px;margin-top: 10px;">
                                    @lang('project.MT_LY1').
                                </p>
                            </div>

                            {!! Form::lbTextarea("headline", @$project->headline, "Vài dòng tóm tắt về dự án thú vị của bạn") !!}

                            <label for="video_url" class="control-label">@lang('project.VIDEO_GIOI_THIEU_DU_AN')</label>
                            <p class="notice_info">
                                @lang('project.MT_LY2')
                            </p>
                            {!! Form::lbText("video_url", @$project->video_url, " ") !!}

                            <label for="about_project" class="control-label">@lang('project.GIOI_THIEU_VE_DU_AN')</label>
                            <p class="notice_info">
                                @lang('project.MT_LY3')
                            </p>
                            {!! Form::lbCKEditor("about_project", @$project->about_project, ' ', '') !!}

                            <label for="project_plan" class="control-label">@lang('project.MT_LY4')</label>
                            <p class="notice_info">
                                @lang('project.MT_LY5').
                            </p>
                            {!! Form::lbCKEditor("project_plan", @$project->project_plan, ' ', '') !!}

                            <label for="project_use" class="control-label">@lang('project.MT_LY6')?</label>
                            <p class="notice_info">
                                @lang('project.MT_LY7')
                            </p>
                            {!! Form::lbCKEditor("project_use", @$project->project_use, ' ', '') !!}
                            <p class="notice_info" style="margin-bottom: 15px;">
                                @lang('project.MT_LY8').
                            </p>
                            {!! Form::lbSubmit(trans('project.LUU'), ['class' => 'btn btn-primary btn-save-from']) !!}
                        </div>

                        <!-- tab chủ dự án -->
                        <div id="p_owner" class="tab-pane fade">
                            <div class="p_content_padding">
                                {!! Form::lbSelect('user_type', @$project->user_type, \App\Classes\Helper::getUserTypeOption(), trans('project.CDADKDHT')) !!}
                                {!! Form::lbText("user_company_name", @$project->user_company_name, trans('project.TEN_CTY')) !!}
                                {!! Form::lbText("user_position", @$project->user_position, trans('project.CHUC_VU')) !!}
                                {!! Form::lbText("user_address", @$project->user_address, trans('project.DIA_CHI')." *") !!}
                                {!! Form::lbText("user_phone_number", @$project->user_phone_number, trans('project.SO_DIEN_THOAI')." *") !!}
                                {!! Form::lbText("user_email", @$project->user_email, "E-mail *") !!}
                                {!! Form::lbText("user_bank_owner", @$project->user_bank_owner, trans('project.TEN_CHU_TAI_KHOAN')." *") !!}
                                {!! Form::lbText("user_bank_number", @$project->user_bank_number, trans('project.SO_TAI_KHOAN')." *") !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::lbText("user_bank_name", @$project->user_bank_name, trans('project.TAI_NGAN_HANG')." *") !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::lbText("user_bank_branch", @$project->user_bank_branch, trans('project.CHI_NHANH')." *") !!}
                                    </div>
                                </div>
                                {!! Form::lbText("user_tax_number", @$project->user_tax_number, trans('project.MA_SO_THUE')) !!}
                            </div>
                            <div class="p_other_padding">
                                <label for="user_introduce_member" class="control-label">@lang('project.CDA_LY1')</label>
                                <p class="notice_info">
                                    @lang('project.CDA_LY2').
                                </p>
                                {!! Form::lbCKEditor("user_introduce_member", @$project->user_introduce_member, ' ', '') !!}

                                {!! Form::lbSubmit(trans('project.LUU'), ['class' => 'btn btn-primary btn-save-from']) !!}
                            </div>

                        </div>

                        <!-- tab cập nhật -->
                        <div id="p_update" class="p_general_padding tab-pane fade" ng-controller="ProjectUpdateController" ng-init="init()">
                            <div class="p_u_box" ng-repeat="x in listU track by $index" ng-cloak>
                                <div class="float-left w-40">
                                    <h3>@lang('project.CAP_NHAT') #@{{ $index + 1 }}</h3>
                                </div>
                                <div class="float-right w-60">
                                    <button ng-click="saveInfo(x)" type="button" class="btn btn-light btn-p-update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> <span class="hidden-on-xs">@lang('project.PT_LUU')</span>
                                    </button>
                                    <button ng-click="removeU($index, x)" type="button" class="btn btn-light btn-p-update">
                                        <i class="fa fa-trash" aria-hidden="true"></i> <span class="hidden-on-xs">@lang('project.PT_XOA')</span>
                                    </button>
                                </div>
                                <div style="clear: both;height: 30px;"></div>
                                <div class="form-group row">
                                    <label for="update_title" class="col-sm-2 col-form-label">@lang('project.TIEU_DE')</label>
                                    <div class="col-sm-10">
                                    <input type="text" ng-model="x.title" class="form-control" name="update_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="update_content" class="col-sm-2 col-form-label">@lang('project.NOI_DUNG')</label>
                                    <div class="col-sm-10">
                                    <textarea ng-model="x.content" class="form-control" name="update_content" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="add-p-update" ng-click="addU()">
                                <img src="{{ asset("/images/Them.png") }}">
                                @lang('project.THEM_CAP_NHAT')
                            </div>
                            {{-- <button type="button" class="btn btn-primary" ng-click="addU()">Thêm cập nhật</button> --}}
                        </div>

                        <!-- tab nhà đầu tư -->
                        <div id="p_investor" class="tab-pane fade" style="padding: 5px;">
                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">@lang('project.NHA_DAU_TU')</th>
                                      <th scope="col">@lang('project.CONTIBUTE_SO_DIEN_THOAI')</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">@lang('project.SO_TIEN_DONG_GOP')</th>
                                      <th scope="col">@lang('project.DIA_DIEM_NHAN_QUA')</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($project->backers as $backer)
                                        <tr>
                                            <td>{{ $backer->name }}</td>
                                            <td>{{ $backer->telephone }}</td>
                                            <td>{{ $backer->email }}</td>
                                            <td>@convert($backer->amount)đ</td>
                                            <td>{{ $backer->address }}</td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="support-box">
                        @if (app()->getLocale() == 'vi')
                            <p>Nếu bạn gặp trục trặc trong việc đăng thông tin trên website, bạn có thể điền thông tin vào mẫu đăng ký dự án và gửi về email: <a href="mailto:info@fundstart.vn" target="_top">info@fundstart.vn</a> để nhận được hỗ trợ từ FundStart.</p>
                        @else
                            <p>If you have any troubles when filling up online registration form, you can download our form in the link below and send to us via email: <a href="mailto:info@fundstart.vn" target="_top">info@fundstart.vn</a>.</p>
                        @endif
                        <a href="{{ asset('/uploads/FundStart - Project Registration Form.docx') }}"><i class="fa fa-file-word-o" aria-hidden="true"></i> @lang('project.MAU_DANG_KY')</a>
                    </div>
                </div>
            </div>
        </div>
    <section>
    {!! Form::close() !!}

@endsection

@push('script')
    <script type="text/javascript">
        var app = angular.module('UApp', []);

        app.controller('UploadMultiController', function($scope, $http, $q) {
            $scope.file_input_multi;
            $scope.dataFile = [];

            $scope.init = function () {
                $http({
                    method: 'GET',
                    url: "/ajax/get-file/{{ $project->id }}",
                }).then(function (rs) {
                    $scope.dataFile = rs.data.data;
                }, function (xhr) {
                    // JS_Library.notify(xhr, 'error');
                });
            }

            $scope.deleteFile = function (index, data) {
                JS_Library.showloading();

                $http({
                    method: 'POST',
                    url: "/ajax/delete-file/{{ $project->id }}",
                    params: {
                        media_id: data.id
                    },
                }).then(function (rs) {
                    if (rs.data.status == 'success')  {
                        $scope.dataFile.splice(index, 1);
                        // $scope.dataFile.push(res.data);
                        // $scope.$apply();
                    }
                }, function (xhr) { 
                    JS_Library.notify(xhr.statusText, 'error');
                }).finally(function(data) {
                    JS_Library.hideloading();
                });
            }

            $scope.chooseMultiFile = function () {
                document.getElementById("file-input-multi").click();
            }

            $scope.fileChanged = function (e) {
                var files = e.target.files;
                // $scope.dataFile = files;

                for (var i = 0; i < files.length; i++) {
                    var formData = new FormData();
                    formData.append('image', files[i]);

                    $.ajax({
                        type: "POST",
                        url: "/ajax/upload-file/{{ $project->id }}",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (res) {
                            if (res.status == 'success')  {
                                $scope.dataFile.push(res.data);
                                $scope.$apply();
                            }
                        },
                        error: function (xhr) {
                            var res = xhr.responseJSON;
                            JS_Library.notify(res['image'], 'error');
                        },
                        complete: function () {
                            
                        }
                    });
                }
            }
        });


        app.controller('ProjectUpdateController', function($scope, $http, $q) {
            $scope.listU = [];
            $scope.init = function() {
                $http({
                    method: 'GET',
                    url: "/ajax/update?project_id={{ $project->id }}",
                }).then(function (rs) {
                    $scope.listU = rs.data.data;
                }, function (xhr) {
                    JS_Library.notify(xhr, 'error');
                });
            }

            $scope.saveInfo = function(d) {
                // console.log(data);
                var data = angular.copy(d);
                data.project_id = "{{ $project->id }}";
                JS_Library.showloading();
                if (data.id) {
                    $http({
                        method: 'PUT',
                        url: "/ajax/update/" + data.id,
                        params: data,
                    }).then(function (rs) {
                        JS_Library.notify('{{ trans("project.LUU_CN_THANH_CONG") }}', 'success');
                    }, function (xhr) { 
                        JS_Library.notify(xhr.statusText, 'error');
                    }).finally(function(data) {
                        JS_Library.hideloading();
                    });
                } else {
                    $http({
                        method: 'POST',
                        url: "/ajax/update",
                        params: data,
                    }).then(function (rs) {
                        JS_Library.notify("{{ trans('project.LUU_CN_THANH_CONG') }}", 'success'); 
                    }, function (xhr) { 
                        JS_Library.notify(xhr.statusText, 'error'); 
                    }).finally(function(data) {
                        JS_Library.hideloading();
                    });
                }
            }

            $scope.addU = function() {
                $scope.listU.push({
                    title: "",
                    content: "",
                });
            }

            $scope.removeU = function(index, data) {
                var check = confirm("{{ trans("project.N_XOA_CAP_NHAT") }}?");
                if (check) {
                    if (data.id) {
                        JS_Library.showloading();
                        $http({
                            method: 'DELETE',
                            url: "/ajax/update/" + data.id,
                        }).then(function (rs) {
                            JS_Library.notify('{{ trans('project.XOA_CN_THANH_CONG') }}', 'success');
                            $scope.listU.splice(index, 1);
                        }, function (xhr) { 
                            JS_Library.notify(xhr.statusText, 'error');
                        }).finally(function(data) {
                            JS_Library.hideloading();
                        });
                    } else {
                        $scope.listU.splice(index, 1);
                    }
                }
            }
        });

        app.controller('ProjectRewardController', function($scope, $http, $q) {
            $scope.listU = [];
            $scope.init = function() {
                $http({
                    method: 'GET',
                    url: "/ajax/reward?project_id={{ $project->id }}",
                }).then(function (rs) {
                    $scope.listU = rs.data.data;
                    refeshDatepickerInput();
                }, function (xhr) {
                    JS_Library.notify(xhr, 'error');
                });
            }

            $scope.changeCheckBoxReward = function(item) {
                if (!item.is_limited_check) {
                    item.limite_number = null;
                }
            }

            $scope.saveInfo = function(d) {
                // console.log(data);
                var data = angular.copy(d);
                data.project_id = "{{ $project->id }}";
                JS_Library.showloading();
                if (data.id) {
                    $http({
                        method: 'PUT',
                        url: "/ajax/reward/" + data.id,
                        params: data,
                    }).then(function (rs) {
                        JS_Library.notify('{{ trans('project.LUU_CN_THANH_CONG') }}', 'success');
                    }, function (xhr) { 
                        JS_Library.notify(xhr.statusText, 'error');
                    }).finally(function(data) {
                        JS_Library.hideloading();
                    });
                } else {
                    $http({
                        method: 'POST',
                        url: "/ajax/reward",
                        params: data,
                    }).then(function (rs) {
                        JS_Library.notify('{{ trans('project.LUU_CN_THANH_CONG') }}', 'success'); 
                    }, function (xhr) { 
                        JS_Library.notify(xhr.statusText, 'error'); 
                    }).finally(function(data) {
                        JS_Library.hideloading();
                    });
                }
            }

            $scope.addU = function() {
                $scope.listU.push({
                    title: "",
                    content: "",
                });
                refeshDatepickerInput();
            }

            $scope.removeU = function(index, data) {
                var check = confirm("{{ trans("project.N_XOA_CAP_NHAT") }}?");
                if (check) {
                    if (data.id) {
                        JS_Library.showloading();
                        $http({
                            method: 'DELETE',
                            url: "/ajax/reward/" + data.id,
                        }).then(function (rs) {
                            JS_Library.notify('{{ trans('project.XOA_CN_THANH_CONG') }}', 'success'); 
                            $scope.listU.splice(index, 1);
                        }, function (xhr) { 
                            JS_Library.notify(xhr.statusText, 'error');
                        }).finally(function(data) {
                            JS_Library.hideloading();
                        });
                    } else {
                        $scope.listU.splice(index, 1);
                    }
                }
            }
        });
    </script>
    <script type="text/javascript">
        function refeshDatepickerInput() {
            setTimeout(function () {
                $('.bdatepicker').datepicker({
                    format: "yyyy-mm-dd",
                    language: "vi",
                    autoclose: true,
                    todayHighlight: true
                });
            }, 200);
        }
    </script>
@endpush

@push('css')
<style type="text/css">
    .container.edit-info {
        padding: 0px 70px;
    }

    .nav-project {
        padding: 25px 0px 0px;;
    }

    .nav-project .nav.nav-tabs {
        border: none;
    }

    .nav-project .nav.nav-tabs .nav-link {
        font-size: 18px;
        color: #333333;
        border: none;
    }

    .nav-project .nav.nav-tabs .nav-link.active {
        border-bottom: 3px solid var(--fsprimary);
        color: var(--fsprimary);
    }

    .nav-project button {
        padding-right: 25px;
        padding-left: 25px;
    }

    .nav-project .preview {
        /*margin-right: 20px;*/
    }

    .nav-project .save-project {
        margin-left: 20px;
    }

    section.content-area {
        padding: 30px 0px 90px;
    }

    section.content-area .tab-content {
        background: #fff;
        border-radius: 3px;
    }

    section.content-area .tab-content .btn-save-from {
        width: 200px;
        margin-top: 10px;
        margin-bottom: 50px;
    }

    .tab-content .p_other_padding {
        padding: 0px 60px 0px 60px;
    }

    .tab-content .p_general_padding {
        padding: 20px 60px 0px 60px;
    }

    .tab-content #p_information, .tab-content .p_content_padding {
        padding: 20px 30% 0px 60px;
    }

    #day_open, #month_open, #year_open, #hour_open, #minute_open {
        display: inline-block;
    }

    .tab-content .notice_info {
        font-size: 13px;
        margin-bottom: 0px;
        color: #666666;
    }
    #p_investor, #p_update, #p_reward {
        padding-bottom: 40px;
    }

    #p_update .p_u_box, #p_reward .p_u_box {
        border-radius: 3px;
        padding: 25px 30px 35px;
        border: solid 1px #dddddd;
        margin-top: 30px;
    }

    #p_update .btn-p-update, #p_reward .btn-p-update {
        border: 1px solid #dddddd;
        padding: 5px 14px;
        font-size: 14px;
    }

    .btn-p-update i {
        font-size: 16px;
    }

    .add-p-update {
        width: 160px;
        cursor: pointer;
        color: #007bff;
        margin-top: 15px;
    }

    .add-p-update img {
        margin-top: -4px;
        width: 20px;
        height: auto;
    }

    .add-p-update a {
        text-decoration: none !important;
    }

    section.content-area .support-box {
        background: #fff;
        border-radius: 3px;
        padding: 15px 15px 20px;
    }

    section.content-area .support-box p > a {
        font-weight: bold;
        color: initial;
    }

    section.content-area .support-box > a:hover {
        text-decoration: none !important;
    }

    section.content-area .support-box > a > i{
        font-size: 20px;
        margin-right: 5px;
    }

    #chosse_multi_file {
        width: 90px;
        height: 50px;
        margin-right: 10px;
        border: 1px dashed #3a7bd5;
        display: inline-block;
        text-align: center;
        color: #3a7bd5;
        cursor: pointer;
    }

    #file-display {
        width: 90px;
        height: 50px;
        display: inline-block;
        margin-right: 13px;
        position: relative;
    }

    #file-display .list-img {
        width: 90px;
        height: 50px;
        object-fit: cover;
        display: block;
        margin-top: 7px;
    }

    #file-display > div {
        position: absolute;
        right: 0px;
        top: 7px;
        cursor: pointer;
        background: black;
        width: 19px;
        height: 19px;
        text-align: center;
        opacity: 0.7;
    }

    #file-display .delete-img {
        width: 8px;
        height: 8px;
        margin-top: -7px;
    }

    /* Extra Small Devices, Phones */
    @media only screen and (max-width : 480px) {
        section.content-area {
            padding: 30px 0px 30px;
        }

        .hidden-on-xs {
            display: none;
        }

        .container.edit-info {
            padding-right: 15px;
            padding-left: 15px;
        }

        section.content-area .support-box {
            margin-top: 15px;
        }

        .tab-content #p_information, .tab-content .p_content_padding {
            padding: 20px 15px 0px 15px;
        }

        .tab-content .p_other_padding, .tab-content .p_general_padding {
            padding: 0px 15px 0px 15px;
        }

        .nav-project .button-action {
            float: initial !important;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .nav-project .button-action .d-table-cell {
            display: inline-block !important;
        }

        #p_update, #p_reward {
            padding-top: 1px;
        }

        #p_update .p_u_box, #p_reward .p_u_box {
            border-radius: 3px;
            padding: 25px 10px 35px;
        }

        .nav-project .nav.nav-tabs {
            overflow: auto;
            height: 56px;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-box;
            display: -o-box;
        }
        
    }

</style>
@endpush
