<meta charset="utf-8">
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

<title>@yield("html_title", "Fundstart VietNam")</title>
<meta name="author" content="Fundstart">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Basic Styles -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/plugin/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/plugin/font-awesome/css/font-awesome.min.css') }}">
<!-- toadstr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/responsive.css') }}">

<!-- FAVICONS -->
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">

<!-- GOOGLE FONT -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

<!-- BACKEND -->
<link rel="stylesheet" type="text/css" href="{{ asset('js/plugin/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.min.css') }}">

@stack("css")