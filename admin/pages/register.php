<?php
session_start();

if (isset($_GET['page'])) {
if (isset($_SESSION['id'])) {
    include('../include/json/bdd.php');

    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();

    if ($userinfo['perm'] == 1) { ?><div class=content-wrapper>
	<div class=content-header>
		<div class=container-fluid>
			<div class="row mb-2">
				<div class=col-sm-6>
					<h1 class="m-0 text-dark">Register</h1>
				</div>
				<div class=col-sm-6>
					<ol class="breadcrumb float-sm-right">
						<li class=breadcrumb-item><a href=#>Home</a>
						<li class="active breadcrumb-item">Register</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class=content>
		<div class=container-fluid>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Register</h3>
                </div>
                <form role="form" method="POST" action="actions/user_register.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Perm</label>
                            <input type="number" min="0" max="1" class="form-control" id="exampleInputPassword2" placeholder="1 for admin, 0 for basic user" name="perm">
                        </div>
                        </div>

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
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