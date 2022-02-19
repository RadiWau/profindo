<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('storage/files/'. config('setting_value.favicon'))}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/files/'. config('setting_value.favicon'))}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/material-icons/material-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/material-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/material-colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/material-palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    @stack('style')
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
	<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
		<div class="navbar-wrapper" style="background-image: linear-gradient(#0A0E45, #0A246A);">
			<div class="navbar-header" style="background-image: linear-gradient(#0A0E45, #0A246A);">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item mr-auto">
						<a class="navbar-brand" href="index.html">
							<h3 class="brand-text">Sistem Apoteker</h3>
						</a>
					</li>
					<li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
					<li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="material-icons mt-50">more_vert</i></a></li>
				</ul>
			</div>
			<div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item nav-search">
							<div class="nav-link">
								<a href="https://github.com/RadiWau/profindo" class="btn btn-social btn-min-width btn-pinterest">
									<span class="fonticon-wrap font-medium-5"><i class="icon-layers"></i></span>
									<span class="font-medium-4">GIT</span>
								</a>
							</div>
						</li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
							<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
								<span class="mr-1 user-name text-bold-700">{{session('NmApoteker')}}</span>
								<span class="avatar avatar-online">
								<img src="../../../app-assets/images/avatar-512.png" alt="avatar"><i></i></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#" onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
														 <i class="material-icons">power_settings_new</i> Logout</a>
									<form id="logout-form" action="{{route('auth.logout')}}" method="POST" class="d-none">
										@csrf
									</form>
								
							</div>
						</li>
                    </ul>
                </div>
            </div>
		</div>
	</nav>

	@include('include.menu_list')

	<div class="app-content content">
		@yield('content')
	</div>

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>


	<!-- BEGIN: Footer-->
	<footer class="footer footer-static footer-light navbar-border navbar-shadow">
		<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; RADI WAHYUDI</span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
	</footer>

    <script src="../../../app-assets/vendors/js/material-vendors.min.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <script>


    </script>

    @stack('scripts')

</body>

</html>
