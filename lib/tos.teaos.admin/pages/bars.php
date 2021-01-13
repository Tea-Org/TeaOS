<?php

if (isset($_SESSION['id'])) {

    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();

    if ($userinfo['perm'] == 1) { ?>
<!DOCTYPE html>
<meta charset=utf-8>
<meta content="IE=edge"http-equiv=X-UA-Compatible>
<title>TeaOS | Admin Panel</title>
<meta content="width=device-width,initial-scale=1"name=viewport>
<link href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css rel=stylesheet>
<link href=https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css rel=stylesheet>
<link href=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css rel=stylesheet>

<link href=assets/css/adminlte.min.css rel=stylesheet>
<link href=assets/css/main.css rel=stylesheet>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"rel=stylesheet>
<body class="hold-transition sidebar-mini">
	<div class=wrapper>
	<nav class="navbar-indigo main-header navbar navbar-dark navbar-expand">
		<ul class=navbar-nav>
			<li class=nav-item><a class=nav-link href=# data-widget=pushmenu role=button><i class="fas fa-bars"></i></a>
		</ul>

		<div class="input-group input-group-sm">
			<input aria-label=Search class="form-control form-control-navbar"placeholder=Search type=search>
			<div class="response">
			
			</div>
		</div>

	</nav>
	<aside class="navbar-indigo elevation-4 main-sidebar sidebar-dark-primary">
		<a class="navbar-indigo brand-link" href=""><img class="brand-image elevation-3 img-circle"src=../../etc/img/logo.svg style=opacity:.8> <span class="brand-text font-weight-light">TeaOS | Admin Panel</span></a>
		<div class=sidebar>
			<div class="d-flex mb-3 mt-3 pb-3 user-panel">
				<div class=info><a class=d-block href=#><?php $userinfo['username']; ?></a></div>
			</div>
			<nav class=mt-2>
				<ul class="flex-column nav nav-pills nav-sidebar"data-accordion=false data-widget=treeview role=menu>
					<li class=nav-item>
						<a class="nav-link active"href="?page=index">
							<i class="fas fa-tachometer-alt nav-icon"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class=nav-item>
						<a class="nav-link"href="?page=register">
							<i class="fas fa-users nav-icon"></i>
							<p>Register</p>
						</a>
					</li>
					<li class=nav-item>
						<a class="nav-link"href="?page=user_list">
							<i class="fas fa-list nav-icon"></i>
							<p>Userlist</p>
						</a>
					</li>
					<li class=nav-item>
						<a class="nav-link"href="?page=ban_hammer">
							<i class="fas fa-hammer nav-icon"></i>
							<p>Ban Hammer</p>
						</a>
					</li>
					<li class=nav-item>
						<a class="nav-link"href="?page=ban_list">
							<i class="fas fa-list nav-icon"></i>
							<p>Banlist</p>
						</a>
					</li>
					
				</ul>
			</nav>
		</div>
	</aside>

	<?php
    } else {
        echo 'You\'re not allowed to display this page';
    }
} else {
    header('Location: ../');
}
?>