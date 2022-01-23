<?php
$page = $_GET['page'];
if (isset($_GET['mm'])) {
  $msgmena = $_GET['mm'];
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

  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

</head>

<body class="skin-blue">
  <?php include '../php/profil.php'; ?>
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
        <ul class="sidebar-menu">


          <li class="treeview">
            <a href="accueil.php">
              <i class="fa fa-home"></i> <span>Accueil</span>
            </a>

          </li>

          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-folder-close"></i>
              <span>Gestion des catégories</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="ad_responsable.php"><i class="fa fa-user"></i>Ajouter un catégorie</a></li>
              <li><a href="gerer_resp.php"><i class="fa fa-group"></i>Gérer les catégories</a></li>
            </ul>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="glyphicon glyphicon-folder-close"></i>
              <span>Gestion des livres</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="ad_event.php"><i class="fa fa-globe"></i>Ajouter un livre</a></li>
              <li><a href="gerer_event.php"><i class="fa fa-star"></i>Gérer les livres</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-gear"></i>
              <span>Paramètres</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="p_general.php"><i class="glyphicon glyphicon-wrench"></i> General</a></li>
              <li><a href="../php/logout.php"><i class="glyphicon glyphicon-log-out"></i> Deconnexion</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">

              <!-- form start -->
              <?php
              include '../php/connexion.php';
              if (isset($_GET['id_event'])) {
                $get_id_event = $_GET['id_event'];
                $showevent = $bdd->prepare("SELECT * FROM products WHERE PID = ?");
                $showevent->execute(array($get_id_event));
                $editevent = $showevent->fetch();
              } ?>

              <form method="POST" id="uploadForm" enctype="multipart/form-data" action="../php/edit_event.php?id=<?= $editevent['PID'];?>&page=<?= $page;?>">
                <div class="box-body">

                  <div class="form-group">
                    <label>Titre :</label>
                    <input type="text" class="form-control" name="title" value="<?= $editevent['title']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Auteur :</label>
                    <input type="text" class="form-control" name="auteur" value="<?= $editevent['author']; ?>">
                  </div>
                  <div class="form-group">
                    <label>catégorie :</label>
                    <?php
                    $sql = $bdd->prepare("SELECT * FROM categorie");
                    $sql->execute();
                    $reg = $sql->fetchAll();
                    $a = count($reg);
                    $cont = 0;
                    ?>
                    <select name="category" size="1" style="width: 252px; height: 38px;margin-right:20px; border-radius: 4px">
                      <option value="<?= $editevent['category']; ?>"><?= $editevent['category']; ?></option>
                      <option value="non identifié">non identifié</option>
                      <?php while ($cont < $a) { ?>
                        <option value="<?php echo $reg[$cont]['type']; ?>">
                          <?php echo $reg[$cont]['type'] ?>
                        </option>
                      <?php $cont++;
                      }
                      ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description :</label>
                    <textarea class="form-control" rows="3" name="description"><?= $editevent['description']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Langue :</label>
                    <select name="langue" size="1" style="width: 252px; height: 38px;margin-right:20px; border-radius: 4px">
                      <option value="<?= $editevent['language']; ?>"><?= $editevent['language']; ?></option>
                      <option value="Français">Français</option>
                      <option value="Anglais">Anglais</option>
                      <option value="Malagasy">Malagasy</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nombre de pages :</label>
                    <input type="number" min="1" class="form-control" name="pages" value="<?= $editevent['page']; ?>">
                  </div>
                </div>

            </div>
          </div>


          <div class="col-md-6">

            <div class="box box-primary" style="padding: 20px;">
              <div class="form-group">
                <label>Le fichier PDF :</label>
                <input type="file" class="form-control" name="upFile" id="upFile">
              </div>
              <div class="form-group">
                <p><code id="cprogr">.progress</code></p>
                <div class="progress active" id="progres">
                  <div class="progress-bar progress-bar-striped" id="progressPdf" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div class="form-group" style="margin-top:27px;">
                <label class="control-label col-lg-4">Image</label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                  <div>
                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="img"></span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="change">Publier</button>
              </div>

              </form>
              <?php include '../php/error.php'; ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div> <!-- /.row -->
    </section><!-- /.content -->

  </div><!-- /.content-wrapper -->

  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.3 -->
  <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- jQuery UI 1.11.2 -->
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="../plugins/morris/morris.min.js" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- jvectormap -->
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='../plugins/fastclick/fastclick.min.js'></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js" type="text/javascript"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/bootstrap-fileupload.js"></script>
  <script src="../dist/js/demo.js" type="text/javascript"></script>
  <script type="text/javascript">
    const uploadForm = document.getElementById("uploadForm");
    const upFile = document.getElementById("upFile");
    const progressPdf = document.getElementById("progressPdf");
    const progres = document.getElementById("progres");
    const cprogr = document.getElementById("cprogr");
    const envoyer = document.getElementById("envoyer");

    upFile.addEventListener('change', uploadFile);

    function uploadFile(e) {
      e.preventDefault();
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'upload.php');
      xhr.upload.addEventListener("progress", e => {
        const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
        progressPdf.style.width = percent.toFixed(2) + "%";
        cprogr.innerHTML = percent.toFixed(2) + "%";
        progressPdf.classList.add('bg-primary');
        if (percent == 100) {
          progressPdf.style.backgroundColor = "#28a745";
          cprogr.style.color = "#28a745";
          envoyer.style.display = "block";
          progres.classList.remove('active');
          upFile.classList.remove('btn-primary');
          upFile.classList.add('btn-success');
        } else {
          progressPdf.style.backgroundColor = "#3c8dbc";
          cprogr.style.color = "red";
          envoyer.style.display = "none";
          progres.classList.add('active');
          upFile.classList.remove('btn-success');
          upFile.classList.add('btn-primary');
        }
      });
      xhr.setRequestHeader("content-type", "multipart/form-data");
      xhr.send(new FormData(uploadForm));
    }
  </script>
</body>

</html>