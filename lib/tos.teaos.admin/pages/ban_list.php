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
                                <h1 class="m-0 text-dark">Banlist</h1>
                            </div>
                            <div class=col-sm-6>
                                <ol class="breadcrumb float-sm-right">
                                    <li class=breadcrumb-item><a href=#>Home</a>
                                    <li class="active breadcrumb-item">Banlist</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class=content>
                    <div class=container-fluid>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">TeaOS Banned</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>IP</th>
                                            <th>Date</th>
                                            <th>Until</th>
                                            <th>Reason</th>
                                            <th>By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $reqabcde = $bdd->prepare("SELECT * FROM banned_ip");
                                        $reqabcde->execute(array());
                                        $users = $reqabcde->fetchAll();
                                        $usercount = $reqabcde->rowCount();
                                        for ($i = 0; $i < $usercount; $i++) {
                                            $reqabcdef = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                                            $reqabcdef->execute(array($users[$i]['operator_id']));
                                            $userinfoef = $reqabcdef->fetch();
                                        ?>

                                            <tr>
                                                <td><?php echo $users[$i]['ip']; ?></td>
                                                <td><?php echo date('d/m/Y H:i:s', $users[$i]['date']); ?></td>
                                                <td><?php echo date('d/m/Y H:i:s', $users[$i]['date_finish']); ?></td>
                                                <td><?php echo $users[$i]['reason']; ?></td>
                                                <td><?php echo $userinfoef['username'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>IP</th>
                                            <th>Date</th>
                                            <th>Until</th>
                                            <th>Reason</th>
                                            <th>By</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
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