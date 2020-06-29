<?php


if (isset($_SESSION['id'])) {

    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();

    if ($userinfo['perm'] == 1) { ?><footer class=main-footer>
	<strong>Copyright © 2014-2019 <a href=http://adminlte.io>AdminLTE.io</a> for <a href=https://tea-org.kellis.fr/TeaOS>TeaOS</a>.</strong> All rights reserved.
	<div class="d-none d-sm-inline-block float-right"><b>Version</b> 3.0.5</div>
</footer>

<aside class="control-sidebar control-sidebar-dark"></aside>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=https://code.jquery.com/ui/1.12.1/jquery-ui.min.js></script>
<script>$.widget.bridge("uibutton",$.ui.button)</script>
<script src=https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/search.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<?php
    } else {
        echo 'You\'re not allowed to display this page';
    }
} else {
    header('Location: ../');
}

?>