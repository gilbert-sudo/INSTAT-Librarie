<?php
include 'secure_access.php';
include '../php/connexion.php';
$db = $bdd;
// pagination
$numRows = 0;
$itemsPerPage = 50;
$totalItemReq = $db->query('SELECT PID FROM products');
while ($row = $totalItemReq->fetch()) {
  ++$numRows;
}
$totalItem = $numRows;
$totalPages = ceil($totalItem / $itemsPerPage) + 1;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $totalItem) {
  $_GET['page'] = intval($_GET['page']);
  $currentPage = $_GET['page'];
} else {
  $currentPage = 1;
}

$begin = ($currentPage - 1) * $itemsPerPage;
$reqevent = $bdd->prepare("SELECT * FROM products  LIMIT $begin,$itemsPerPage");
$reqevent->execute();
//end pagination
include '../php/profil.php';

//get top 4 number
$getfavori = $bdd->prepare("SELECT COUNT(PID) FROM products WHERE new = 1");
$getfavori->execute();
$getfavori = $getfavori->fetch();

//check top list
function isTop($id)
{
  global $bdd;
  $getfavori = $bdd->prepare("SELECT new FROM products WHERE PID = ?");
  $getfavori->execute(array($id));
  $top_state = $getfavori->fetch();
  $response = ($top_state[0] == 1)? true : false;
  return $response;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Les livres</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck for checkboxes and radio inputs -->
  <link href="../plugins/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
  <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/parametre.css">
  <link href="../assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
  <div class="wrapper">

    <header class="main-header">
      <a href="#" class="logo"><b><?= $showprofil['username_admin']; ?></b></a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>

            </li>

            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>

            </li>
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>

            </li>

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../images/admin/<?= $showprofil['image_admin']; ?>" class="user-image" alt="User Image" />
                <span class="hidden-xs"><?= $showprofil['username_admin']; ?></span>
              </a>

            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../images/admin/<?= $showprofil['image_admin']; ?>" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p><?= $showprofil['username_admin']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
          </div>
        </div>
        <?php
        $namespace = 'gererbook';
        include "sidebar-menu.php";
        ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Gérer les livres</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Images</th>
                      <th>Titre</th>
                      <th>Catégorie</th>
                      <th>Page</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $top_book = ($getfavori[0]);
                    while ($afevent = $reqevent->fetch()) { ?>
                      <tr>
                        <td>
                          <H3>#<?= $afevent['PID']; ?></H3>
                        </td>
                        <td style="text-align: center;"><a title="Lire ce livre" href="read.php?name=<?= $afevent['pdf']; ?>" target="__BLANK"><img style="width: 140px; height: 140px;" src="../images/books/<?= $afevent['img']; ?>"></a></td>
                        <td style="padding-top:40px;"><strong><a title="Voir les détails sur ce livre" style="text-decoration: none;color:black;" href="read.php?name=<?= $afevent['pdf']; ?>" target="__BLANK"><?= $afevent['title']; ?></a></strong></td>
                        <td style="padding-top:40px;"><?= $afevent['category'];?></td>
                        <td style="padding-top:40px;"><?= $afevent['page']; ?></td>
                        <td>
                          <div style="margin-top: 16px;">
                            <a title="Editer ce livre" class="btn btn-block btn-primary" href="edit_book.php?id_event=<?= $afevent['PID']; ?>&page=<?= $currentPage; ?>"><i class="fa fa-edit"></i></a>
                            <?php if ($top_book < 4) { ?>
                              <a title="Ajouter aux tops 4" class="btn btn-block btn-warning" href="../php/top_book.php?id=<?= $afevent['PID']; ?>&page=<?= $currentPage; ?>&action=ajouter"><i class="fa fa-star"></i></a>
                            <?php } else { ?>
                              <br>
                            <?php } ?>
                            <a title="Supprimer ce livre" class="btn btn-block btn-danger" onclick="return window.confirm('Êtes vous sûre de suprimmer ce livre?');" href="../php/del_book.php?id_book=<?= $afevent['PID']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                          </div>
                        </td>
                      </tr>

                    <?php } ?>
                  </tbody>

                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->


          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->

      <div id="bottom" class="row">
        <div class="col-md-12">
          <ul class="pagination">
            <?php if ($currentPage != 1) {
              $prev = $currentPage - 1;
              echo '<li class="prev"><a href="?pg=produtos&page=' . ($prev) . '" rel="next">&lt; Précedant</a></li>';
            } else {
              echo '<li><a href="#">&lt; Précedant</a></li>';
            }
            ?>
            <?php for ($i = 1; $i < $totalPages; $i++) {
              if ($i == $currentPage) {
                echo '<li><a  style="background-color: #75aca8; color:white;" href="#">' . $i . '</a></li>';
              } else {
                echo '<li><a href="?pg=produtos&page=' . $i . '">' . $i . '</a></li>';
              }
            } ?>
            <?php if ($currentPage < ($totalPages - 1)) {
              echo '<li class="next"><a href="?pg=produtos&page=' . (++$currentPage) . '" rel="next">Suivant &gt;</a></li>';
            } else {
              echo '<li class="next"><a href="#" rel="next">Suivant &gt;</a></li>';
            }
            ?>

          </ul><!-- /.pagination -->
        </div>
      </div> <!-- /#bottom -->
    </div><!-- /.content-wrapper -->
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.3 -->
  <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='../plugins/fastclick/fastclick.min.js'></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js" type="text/javascript"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js" type="text/javascript"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <!-- PAGE LEVEL SCRIPTS -->
  <script src="../assets/js/bootstrap-fileupload.js"></script>

</body>

</html>