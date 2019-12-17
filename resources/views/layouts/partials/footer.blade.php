<footer id="page-footer" class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<div class="wigets_footer">
					<p class="menuft-title">@lang('menu.VE_FUNDSTART')</p>
					<ul class="menuft">
						<li class="menu-item">
							<a href="#">@lang('menu.VE_CHUNG_TOI')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.QUY_TRINH_HOAT_DONG')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.BAO_CHI')</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="wigets_footer">
					<p class="menuft-title">@lang('menu.DU_AN')</p>
					<ul class="menuft">
						<li class="menu-item">
							<a href="#">@lang('menu.BAT_DAU_DU_AN')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.CHI_PHI')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.HUONG_DAN')</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wigets_footer wigets_footer_3">
					<p class="menuft-title">@lang('menu.HO_TRO')</p>
					<ul class="menuft">
						<li class="menu-item">
							<a href="#">@lang('menu.DIEU_KHOAN_SU_DUNG')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.HOI_DAP')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.LIEN_HE')</a>
						</li>
						<li class="menu-item">
							<a href="#">@lang('menu.CHINH_SACH_HOAN_TIEN')</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-5 social-contact">
				<span>@lang('menu.FOLLOW_US'): </span>
				<ul class="list-inline social-list-icon">
					<li class="list-inline-item">
						<a class="social-icon text-xs-center" target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
					<li class="list-inline-item">
						<a class="social-icon text-xs-center" target="_blank" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</li>
					<li class="list-inline-item">
						<a class="social-icon text-xs-center" target="_blank" href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</li>
					<li class="list-inline-item">
						<a class="social-icon text-xs-center" target="_blank" href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
					</li>
				</ul>
				<p style="margin-top: 10px;">@lang('menu.NHAN_THONG_TIN_MOI_NHAT_TU_FUNDSTART')</p>
				<div class="d-inline-block email-sub">
					{!! Form::materialText("email_sub_unique", '', "", "Email") !!}
				</div>
				<div class="d-inline-block">
					<button type="button" id="btn-subcribe-fundstart" class="btn btn-primary" style="margin-left: 15px;">@lang('menu.DANG_KY')</button>
				</div>
			</div>
		</div>
		<!-- <div class="row infor-company">
			<div class="col-lg-7 col-xs-12">
				<div class="copyright">
					@if (app()->getLocale() == 'vi')
					<p>© 2015 Fundstart, Jsc. All Rights Reserved</p>
					<p style="font-weight:bold;">Công ty cổ phần FundStart</p>
					<p>Email: info@fundstart.vn</p>
					<p>Trụ sở: 36/19/9 Kim Đồng, Phường Giáp Bát, Quận Hoàng Mai, Hà Nội - SĐT: +84-4-3717 1188</p>
					<p>VP phía Nam: 223 Điện Biên Phủ, Phường 15, Quận Bình Thạnh, Tp. Hồ Chí Minh - SĐT: +84-8-3820 8201 </p>
					<p>FundStart hoạt động theo Giấy phép số 0313316202 do Sở Kế hoạch và Đầu tư Tp. Hồ Chí Minh cấp ngày 23/06/2015</p>
					@else
					<p>© 2015 Fundstart, Jsc. All Rights Reserved</p>
					<p style="font-weight:bold;">FundStart Joint Stock Company</p>
					<p>Email: info@fundstart.vn</p>
					<p>Hanoi Head Office: 36/19/9 Kim Dong, Hoang Mai District, Hanoi - Phone number: +84-4-3717 1188</p>
					<p>Ho Chi Minh Branch Office: 223 Dien Bien Phu, Ward 15, Binh Thanh District, Ho Chi Minh City - SĐT: +84-8-3820 8201</p>
					<p>FundStart is operating under business license No. 0313316202 issued by Department of Planning & Investment of Ho Chi Minh city in 23/06/2015</p>
					@endif
				</div>
			</div>
			<div class="col-lg-5 col-xs-12">
				<div class="row">
					<div class="col-lg-12">
					<p>@lang('menu.CAC_GIAO_DICH_THONG_QUA'):</p>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<img width="100%" src="{{asset('/uploads/logo/napas-logo.png')}}">
					</div>
					<div class="col-6">
						<img width="100%" src="{{asset('/uploads/logo/napas-item.png')}}">
					</div>
				</div>
			</div>
		</div> -->
	</div>
</footer>

@push('script')

<script type="text/javascript">
	$(document).ready(function () {
		$('#btn-subcribe-fundstart').click(function (e) {
			JS_Library.showloading();

			$.ajax({
	            type: "POST",
	            url: "{{ url('/ajax/subcribe') }}",
	            data: {
	            	email: $("input[name='email_sub_unique']").val()
	            },
	            success: function (res) {
	            	if( res['code'] == 200) {
	                    JS_Library.notify('Đăng ký nhận thư cập nhật thành công', 'success');
	                } else {
	                    JS_Library.notify('Đăng ký không thành công', 'error');
	                }
	            },
	            error: function (xhr) {
	                var errors = xhr.responseJSON;
	                $.each(errors, function (k, v) {
	                    JS_Library.notify(v, 'error');
	                });
	            },
	            complete: function () {
	                JS_Library.hideloading();
	            }
	        });
		});
	});
</script>
@endpush