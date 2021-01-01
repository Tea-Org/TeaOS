<?php


if (isset($_GET['page'])) {
    if (isset($_SESSION['id'])) {

        $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $reqabcd->execute(array($_SESSION['id']));
        $userinfo = $reqabcd->fetch();

        if ($userinfo['perm'] == 1) { ?><div class=content-wrapper>
                <div class=content-header>
                    <div class=container-fluid>
                        <div class="row mb-2">
                            <div class=col-sm-6>
                                <h1 class="m-0 text-dark">Ban Hammer</h1>
                            </div>
                            <div class=col-sm-6>
                                <ol class="breadcrumb float-sm-right">
                                    <li class=breadcrumb-item><a href=#>Home</a>
                                    <li class="active breadcrumb-item">Ban Hammer</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class=content>
                    <div class=container-fluid>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ban Hammer</h3>
                            </div>
                            <form role="form" method="POST" action="actions/ban_hammer.php">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ip">IP Adress</label>
                                        <input type="text" class="form-control" id="ip" placeholder="Enter an IP Adress" name="ip">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Ban until... (leave it blank if you want make a lifetime ban)</label>
                                        <input type="date" class="form-control" id="date" placeholder="Date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="reason">Reason</label>
                                        <input type="text"class="form-control" id="reason" placeholder="Reason" name="reason">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ban</button>
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