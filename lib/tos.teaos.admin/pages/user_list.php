<?php


if (isset($_GET['page'])) {
  if (isset($_SESSION['id'])) {

    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();
    $reqabcde = $bdd->prepare("SELECT * FROM users");
    $reqabcde->execute(array());
    $users = $reqabcde->fetchAll();
    $usercount = $reqabcde->rowCount();

    if ($userinfo['perm'] == 1) { ?><div class=content-wrapper>
        <div class=content-header>
          <div class=container-fluid>
            <div class="row mb-2">
              <div class=col-sm-6>
                <h1 class="m-0 text-dark">Userlist</h1>
              </div>
              <div class=col-sm-6>
                <ol class="breadcrumb float-sm-right">
                  <li class=breadcrumb-item><a href=#>Home</a>
                  <li class="active breadcrumb-item">Userlist</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <section class=content>
          <div class=container-fluid>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">TeaOS Users</h3>
              </div>

              <div class="card-body">
                <div class="row but">
                  <div class="col-6 gr">
                    <p>Grid</p>
                  </div>
                  <div class="col-6 gr">
                    <p>Columns</p>
                  </div>
                </div>
                <table class="table table-bordered table-striped dr">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>IP (register)</th>
                      <th>IP (last)</th>
                      <th>Browser</th>
                      <th>Date (register)</th>
                      <th>Date (last)</th>
                      <th>Screen</th>
                      <th>Unik</th>
                      <th>Other (register)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    for ($i = 0; $i < $usercount; $i++) {
                    ?>

                      <tr>
                        <td><?php echo $users[$i]['username']; ?></td>
                        <td><?php echo $users[$i]['ip_reg']; ?></td>
                        <td><?php echo $users[$i]['ip']; ?></td>
                        <td><?php echo $users[$i]['navigateur']; ?></td>
                        <td><?php echo date('d/m/Y H:i:s', $users[$i]['date_reg']); ?></td>
                        <td><?php echo date('d/m/Y H:i:s', $users[$i]['date']); ?></td>
                        <td><?php echo $users[$i]['screen']; ?></td>
                        <td><?php echo $users[$i]['unik']; ?></td>
                        <td><?php echo $users[$i]['json_reg']; ?></td>

                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>IP (register)</th>
                      <th>IP (last)</th>
                      <th>Browser</th>
                      <th>Date (register)</th>
                      <th>Date (last)</th>
                      <th>Screen</th>
                      <th>Unik</th>
                      <th>Other (register)</th>
                    </tr>
                  </tfoot>
                </table>

                <?php
                for ($i = 0; $i < $usercount; $i++) {
                ?>

                  <div class="row dr" style="display: none">
                    <div class="col-12">
                      <div class="row">
                        <div class="col-1 picture">
                          <img src="../../../dev/profile/unknown.png" alt="" width="100%">
                        </div>
                        <div class="col-11 user_infos">
                          <p><b>Username:</b> <?php echo $users[$i]['username']; ?></p>
                          <p><b>IP (register):</b> <?php echo $users[$i]['ip_reg']; ?></p>
                          <p><b>IP (last):</b> <?php echo $users[$i]['ip']; ?></p>
                          <p><b>Date (register):</b> <?php echo date('d/m/Y H:i:s', $users[$i]['date_reg']); ?></p>
                          <p><b>Date (last):</b> <?php echo date('d/m/Y H:i:s', $users[$i]['date']); ?></p>
                          <p><b>Unik:</b> <?php echo $users[$i]['unik']; ?></p>
                          <p><b>HTTP USER AGENT:</b> <?php echo $users[$i]['navigateur']; ?></p>
                          <p><b>Screen Informations:</b> <?php echo $users[$i]['screen']; ?></p>
                          <p><b>Other Informations:</b> <?php echo $users[$i]['json_reg']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                <?php } ?>
              </div>

            </div>
          </div>
        </section>
      </div>
      <script src="assets/js/grid.js"></script>
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