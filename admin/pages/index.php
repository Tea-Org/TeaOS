<?php


if (isset($_GET['page'])) {
if (isset($_SESSION['id'])) {

    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();

    if ($userinfo['perm'] == 1) { 
	$reqabcd = $bdd->prepare("SELECT * FROM visits");
	$reqabcd->execute(array());
	$total_visitors = $reqabcd->rowCount();

	$reqabcd = $bdd->prepare("SELECT * FROM visits WHERE date = ?");
	$reqabcd->execute(array(date('d-m-Y')));
	$today_visitors = $reqabcd->rowCount();

	$reqabcd = $bdd->prepare("SELECT * FROM visits WHERE date = ?");
	$reqabcd->execute(array(date('d-m-Y', time()-86400)));
	$yesterday_visitors = $reqabcd->rowCount();

	if ($yesterday_visitors == 0) {
		$difference = $today_visitors * 100;
	} else {
		$difference = ($today_visitors / $yesterday_visitors)*100;
	}

	$files = count(scandir('../users'), COUNT_RECURSIVE);

	$reqabcd = $bdd->prepare("SELECT * FROM users");
	$reqabcd->execute(array());
	$total_users = $reqabcd->rowCount();

?>
<div class=content-wrapper>
	<div class=content-header>
		<div class=container-fluid>
			<div class="row mb-2">
				<div class=col-sm-6>
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div>
				<div class=col-sm-6>
					<ol class="breadcrumb float-sm-right">
						<li class=breadcrumb-item><a href=#>Home</a>
						<li class="active breadcrumb-item">Dashboard
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class=content>
		<div class=container-fluid>
			<div class=row>
				<div class="col-sm-6 col-12 col-md-3">
					<div class="info-box bg-info">
						<span class=info-box-icon><i class="fas fa-users"></i></span>
						<div class=info-box-content>
							<span class=info-box-text>Total visitors</span> <span class=info-box-number><?php echo $total_visitors; ?></span>
							<div class=progress>
								<div class=progress-bar style=width:100%></div>
							</div>
							<span class=progress-description>Since the TeaOS beginning</span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-12 col-md-3">
					<div class="info-box bg-success">
						<span class=info-box-icon><i class="far fa-user"></i></span>
						<div class=info-box-content>
							<span class=info-box-text>Today visitors</span> <span class=info-box-number><?php echo $today_visitors; ?></span>
							<div class=progress>
								<div class=progress-bar style="width:<?php echo $difference; ?>%"></div>
							</div>
							<span class=progress-description><?php echo round($difference).'% '; if ($difference < 100) { echo 'less'; } else { echo 'more'; } ?> than yesterday</span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-12 col-md-3">
					<div class="info-box bg-warning">
						<span class=info-box-icon><i class="far fa-folder-open"></i></span>
						<div class=info-box-content>
							<span class=info-box-text>Files</span> <span class=info-box-number><?php echo $files; ?></span>
							<div class=progress>
								<div class=progress-bar style=width:100%></div>
							</div>
							<span class=progress-description>Since the TeaOS beginning</span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-12 col-md-3">
					<div class="info-box bg-danger">
						<span class=info-box-icon><i class="fas fa-user-secret"></i></span>
						<div class=info-box-content>
							<span class=info-box-text>Users</span> <span class=info-box-number><?php echo $total_users; ?></span>
							<div class=progress>
								<div class=progress-bar style=width:100%></div>
							</div>
							<span class=progress-description>Since the TeaOS beginning</span>
						</div>
					</div>
				</div>
			</div>
			<!--<div class=row>
				<section class="col-lg connectedSortable">
					
					<div class="card bg-gradient-info">
						<div class="card-header border-0">
							<h3 class=card-title><i class="fas mr-1 fa-th"></i> Sales Graph</h3>
							<div class=card-tools><button class="bg-info btn btn-sm"data-card-widget=collapse type=button><i class="fas fa-minus"></i></button></div>
						</div>
						<div class=card-body>
              <canvas id=line-chart style=min-height:250px;height:250px;max-height:250px;max-width:100% class=chart></canvas>
              
              <div class="chart tab-pane"style=position:relative;height:300px id=sales-chart>
                <canvas id=sales-chart-canvas style=height:300px height=300></canvas>
              </div>
						</div>
					</div>
				</section>
			</div>-->
		</div>
	</section>
</div>
<?php
    } else {
        echo 'You\'re not allowed to display this page';
    }
} else {
    header('Location: ../');
}
} else {
    header('Location: ../');
}
?>