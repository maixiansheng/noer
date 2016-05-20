<!DOCTYPE html>
<html>

	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>Login | Porto - Responsive HTML5 Template 3.4.1</title>		
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/q/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="/q/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="/q/vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="/q/vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="/q/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/q/css/theme.css">
		<link rel="stylesheet" href="/q/css/theme-elements.css">
		<link rel="stylesheet" href="/q/css/theme-blog.css">
		<link rel="stylesheet" href="/q/css/theme-shop.css">
		<link rel="stylesheet" href="/q/css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/q/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/q/css/custom.css">

		<!-- Head Libs -->
		<script src="/q/vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>

		<div class="body">
		@section('content')
			<header id="header">
				<div class="container">
					<h1 class="logo">
						<a href="index.html">
							<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/q/img/logo.png">
						</a>
					</h1>
					<div class="search">
						
					</div>
					<nav>
						<ul class="nav nav-pills nav-top">
							<li>
								<a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
							</li>
							<li>
								<a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
							</li>
							<li class="phone">
								<span><i class="fa fa-phone"></i>(123) 456-7890</span>
							</li>
						</ul>
					</nav>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						<ul class="social-icons">
							
						</ul>
						<nav class="nav-main mega-menu">
							<ul class="nav nav-pills nav-main" id="mainMenu">
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Home
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li class="dropdown-submenu">
											<a href="#">Sliders</a>
											<ul class="dropdown-menu">
												<li><a href="index.html">Revolution Slider</a></li>
												<li><a href="index-slider-2.html">Nivo Slider</a></li>
											</ul>
										</li>
										<li><a href="index.html">Home - Default</a></li>
										<li><a href="index-2.html">Home - Color</a></li>
										<li><a href="index-3.html">Home - Light</a></li>
										<li><a href="index-4.html">Home - Video</a></li>
										<li><a href="index-5.html">Home - Video - Light</a></li>
										<li><a href="index-one-page.html">One Page Website</a></li>
									</ul>
								</li>
								<li>
									<a href="shortcodes.html">Shortcodes</a>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										About Us
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="about-us-basic.html">About Us - Basic</a></li>
										<li><a href="about-me.html">About Me</a></li>
									</ul>
								</li>
								<li class="dropdown mega-menu-item mega-menu-fullwidth">
									<a class="dropdown-toggle" href="#">
										Features
										<i class="fa fa-angle-down"></i>
									</a>
									
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Portfolio
										<i class="fa fa-angle-down"></i>
									</a>
									
								</li>
								
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Contact Us
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li><a href="contact-us.html">Contact Us - Basic</a></li>
										<li><a href="contact-us-advanced.php">Contact Us - Advanced</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
		@show
		@section('mian')
			<div role="main" class="main">

				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Pages</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Login</h2>
							</div>
						</div>
					</div>
				</section>
				 <div class="mws-panel-body no-padding">
                     
						@if(session('error'))
							<div class="alert alert-danger">
								<ul>
									<li>{{session('error')}}</li>
								</ul>

							</div>


						@endif
				<div class="container">

					<div class="row">
						<div class="col-md-12">
				
							<div class="row featured-boxes login">
								
								<div class="col-sm-12">
									<div class="featured-box featured-box-secundary default info-content">
										<div class="box-content">
											<h4>用户注册</h4>
											<form action="{{url('/register')}}" id="" method="post">
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
															<label>E-mail</label>
															<input type="text" name="email" value="" class="form-control input-lg">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
															<label>密码</label>
															<input type="password"name="password" value="" class="form-control input-lg">
														</div>
														
													</div>
													<div class="col-md-12">
															<label>确认密码</label>
															<input type="password" name="repassword" value="" class="form-control input-lg">
													</div>
													<div class="col-md-8">
															<label>验证码</label>
															<input type="text" name="vcode" value="" class="form-control input-lg">
														<div class="col-md-4">
															<img src="{{url('/vcode')}}" onclick="this.src=this.src+'?a=1'"alt="">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="submit" value="提交" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
													</div>
												</div>
												{{csrf_field()}}
											</form>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>
		@show
		
		</div>

		<!-- Vendor -->
		<script src="/q/vendor/jquery/jquery.js"></script>
		<script src="/q/vendor/jquery.appear/jquery.appear.js"></script>
		<script src="/q/vendor/jquery.easing/jquery.easing.js"></script>
		<script src="/q/vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="/q/vendor/bootstrap/bootstrap.js"></script>
		<script src="/q/vendor/common/common.js"></script>
		<script src="/q/vendor/jquery.validation/jquery.validation.js"></script>
		<script src="/q/vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="/q//q/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
	
		
		
	
		
		<!-- Theme Base, Components and Settings -->
		<script src="/q/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/q/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/q/js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);
		
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
		 -->

	</body>
</html>
