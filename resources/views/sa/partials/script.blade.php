<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

	<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		if (!window.jQuery) {
			document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
		}
	</script>

	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
		if (!window.jQuery.ui) {
			document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
		}
	</script>

	<!-- IMPORTANT: APP CONFIG -->
	<script src="{{ asset('sa/js/app.config.js') }}"></script>

	<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
	<script src="{{ asset('sa/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script> 

	<!-- BOOTSTRAP JS -->
	<script src="{{ asset('sa/js/bootstrap/bootstrap.min.js') }}"></script>

	<!-- CUSTOM NOTIFICATION -->
	<script src="{{ asset('sa/js/notification/SmartNotification.min.js') }}"></script>

	<!-- JARVIS WIDGETS -->
	<script src="{{ asset('sa/js/smartwidgets/jarvis.widget.min.js') }}"></script>

	<!-- SPARKLINES -->
	<script src="{{ asset('sa/js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- browser msie issue fix -->
	<script src="{{ asset('sa/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

	<!-- FastClick: For mobile devices -->
	<script src="{{ asset('sa/js/plugin/fastclick/fastclick.min.js') }}"></script>

	<!-- FastClick: For mobile devices -->
	<script src="{{ asset('sa/js/plugin/fastclick/fastclick.min.js') }}"></script>

	<!--[if IE 8]>

	<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

	<![endif]-->

	<!-- Demo purpose only -->
	<script src="{{ asset('sa/js/demo.min.js') }}"></script>

	<!-- MAIN APP JS FILE -->
	<script src="{{ asset('sa/js/app.min.js') }}"></script>

	<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
	<!-- Voice command : plugin -->
	<script src="{{ asset('sa/js/speech/voicecommand.min.js') }}"></script>

	<!-- SmartChat UI : plugin -->
	<script src="{{ asset('sa/js/smart-chat-ui/smart.chat.ui.min.js') }}"></script>
	<script src="{{ asset('sa/js/smart-chat-ui/smart.chat.manager.min.js') }}"></script>
	
	<!-- PAGE RELATED PLUGIN(S) -->
	
	<script src="{{ asset('sa/js/plugin/delete-table-row/delete-table-row.min.js') }}"></script>
	
	<script src="{{ asset('sa/js/plugin/summernote/summernote.min.js') }}"></script>
	
	<script src="{{ asset('sa/js/plugin/select2/select2.min.js') }}"></script>
	
	<script type="text/javascript">
	
	$(document).ready(function() {
	
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		pageSetUp();
	
		// PAGE RELATED SCRIPTS
	
		/*
		 * Fixed table height
		 */
		
		//tableHeightSize()
		
		//$(window).resize(function() {
		//	tableHeightSize()
		//})
		
		function tableHeightSize() {

			if ($('body').hasClass('menu-on-top')) {
				var menuHeight = 68;
				// nav height

				var tableHeight = ($(window).height() - 224) - menuHeight;
				if (tableHeight < (320 - menuHeight)) {
					$('.table-wrap').css('height', (320 - menuHeight) + 'px');
				} else {
					$('.table-wrap').css('height', tableHeight + 'px');
				}

			} else {
				var tableHeight = $(window).height() - 224;
				if (tableHeight < 320) {
					$('.table-wrap').css('height', 320 + 'px');
				} else {
					$('.table-wrap').css('height', tableHeight + 'px');
				}

			}

		}
		
		/*
		 * LOAD INBOX MESSAGES
		 */
		loadInbox();
		function loadInbox() {
			loadURL("ajax/email/email-list.html", $('#inbox-content > .table-wrap'))
		}
	
		/*
		 * Buttons (compose mail and inbox load)
		 */
		$(".inbox-load").click(function() {
			loadInbox();
		});
	
		// compose email
		$("#compose-mail").click(function() {
			loadURL("ajax/email-compose.html", $('#inbox-content > .table-wrap'));
		})
	
	});	
		
	
	</script>


	<!-- Your GOOGLE ANALYTICS CODE Below -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>