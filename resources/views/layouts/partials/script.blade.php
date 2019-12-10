<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script type="text/javascript" src="{{ asset('/js/plugin/jquery/jquery-3.3.1.min.js') }}"></script>
@yield('extend_loading_js')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<!-- BOOTSTRAP JS -->
<script type="text/javascript" src="{{ asset('/js/plugin/bootstrap/bootstrap.min.js') }}"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script type="text/javascript" src="{{ asset('/sa/js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- MAIN APP JS FILE -->
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>

<!-- Google recaptcha -->
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>


<!-- BACKEND -->
<!-- DATATABLE -->

<script src="{{ asset('/DataTables/datatables.js') }}"></script>
<script src="{{ asset('/sa/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>

<script src="{{ asset('js/plugin/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/plugin/bootstrap-datepicker-1.6.4/locales/bootstrap-datepicker.vi.min.js') }}"></script>

<!-- CKEditor -->
<script src="{{ asset('js/plugin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/plugin/ckeditor/ckfinder/ckfinder.js') }}"></script>
@stack('script')
