

<!DOCTYPE html>
<meta charset=utf-8>
<meta content="IE=edge"http-equiv=X-UA-Compatible>
<title>TeaOS | Admin Panel</title>
<meta content="width=device-width,initial-scale=1"name=viewport>
<link href=plugins/fontawesome-free/css/all.min.css rel=stylesheet>
<link href=https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css rel=stylesheet>
<link href=plugins/datatables-bs4/css/dataTables.bootstrap4.min.css rel=stylesheet>
<link href=plugins/datatables-responsive/css/responsive.bootstrap4.min.css rel=stylesheet>
<link href=dist/css/adminlte.min.css rel=stylesheet>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"rel=stylesheet>
<body class="hold-transition sidebar-mini">
	<div class=wrapper>
	<nav class="navbar-indigo main-header navbar navbar-dark navbar-expand">
		<ul class=navbar-nav>
			<li class=nav-item><a class=nav-link href=# data-widget=pushmenu role=button><i class="fas fa-bars"></i></a>
		</ul>
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input aria-label=Search class="form-control form-control-navbar"placeholder=Search type=search>
				<div class=input-group-append><button class="btn btn-navbar"type=submit><i class="fas fa-search"></i></button></div>
			</div>
		</form>
	</nav>
	<aside class="navbar-indigo elevation-4 main-sidebar sidebar-dark-primary">
		<a class="navbar-indigo brand-link" href="" ><img class="brand-image elevation-3 img-circle"src=../assets/img/logo.png style=opacity:.8> <span class="brand-text font-weight-light">TeaOS | Admin Panel</span></a>
		<div class=sidebar>
			<div class="d-flex mb-3 mt-3 pb-3 user-panel">
				<div class=info><a class=d-block href=#><?php $_SESSION['username']; ?></a></div>
			</div>
			<nav class=mt-2>
				<ul class="flex-column nav nav-pills nav-sidebar"data-accordion=false data-widget=treeview role=menu>
					<li class=nav-item>
						<a class="nav-link active"href=#>
							<i class="fas fa-tachometer-alt nav-icon"></i>
							<p>Dashboard</p>
						</a>
				</ul>
			</nav>
		</div>
	</aside>
