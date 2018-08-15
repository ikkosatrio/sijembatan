<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$config->name}} - Administrator</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/noty.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/jgrowl.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{base_url()}}assets/js/core/app.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/components_notifications_other.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{base_url('superuser')}}"><img src="{{base_url()}}assets/images/website/config/logo/{{$config->logo}}" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{{base_url()}}">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right" title="Menuju Website"> Go to website</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form id="form-login">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<img class="img-responsive mar-center" style="max-width:100px;height:100px;display:block;margin-left:auto;margin-right:auto;" src="{{base_url()}}assets/images/website/config/icon/{{$config->icon}}">
								<h5 class="content-group">Login to your account <small class="display-block">{{$config->name}}</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="user">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="pass">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							{{-- <div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div> --}}
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					{{-- <div class="footer text-muted text-center">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> --}}
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->	
	<script type="text/javascript">
		var base_url = '{{base_url()}}';
	</script>
	<script type="text/javascript" src="{{base_url()}}assets/js/cak-js.js"></script>
	<script type="text/javascript">
		$("#form-login").submit(function(e){
			e.preventDefault();
			var block = $("#form-login > div");
			$.ajax({
				url	: base_url+'auth/authentication',
				method : 'POST',
				data : $("#form-login").serialize(),
				beforeSend:function(){
					showBlock(block,'<i class="icon-spinner4 spinner"></i>','#fff');
				}
			})
			.done(function(data){

				data = JSON.parse(data);

				if (data.auth==false){
					ShowNotif('Login Failed!',data.msg,'top-center','bg-danger');
					$("#form-login").find('input').val('');
					$(block).unblock();
					return;
				}
				ShowNotif('Login Success!',data.msg,'top-center','bg-success');
				$(block).unblock();
				var go	= setTimeout(function(){
					redirect(base_url+'superuser/');
				},1000);
			})
		})
	</script>
</body>
</html>
