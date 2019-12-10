<!DOCTYPE html>
<html lang="en-us">
	@include('sa.partials.htmlheader')
	<body class="">
		@include('sa.partials.pageheader')
		@include('sa.partials.sidebar')
		
		@yield('content')

		@include('sa.partials.footer')
		@include('sa.partials.script')
	</body>

</html>