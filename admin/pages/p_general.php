<?php 
include 'secure_access.php';
include '../php/profil.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Paramètres</title>
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
        $namespace = 'general';
        include "sidebar-menu.php";
        ?>
      </section>
      <!-- /.sidebar -->
    </aside>

  </div><!-- ./wrapper -->
  <div class="content-wrapper">

    <section class="content">
      <h3 class="box-title"><b>Paramètres</b></h3>
      <div class="row">
        <div class="col-md-6">
          <!-- Default box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Changer mon profil</h3>
            </div>
            <div class="box-body">
              <form method="POST" enctype="multipart/form-data" action="#">
                <label>Nouveau nom d'utilisateur</label><br><input type="text" class="form-control" name="newnom" placeholder="Nom d'utilisateur"><br>
                <div class="form-group">
                  <label class="control-label">Image</label>
                  <div class="">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                      <div>
                        <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="newimg"></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a><br>
                      </div>
                    </div>
                  </div>
                </div>

                <button class="btn btn-block btn-primary btn-s" style="width: 100px;" name="ok">Changer</button><br>
                <?php
                include '../php/connexion.php';
                if (isset($_POST['ok'])) {
                  if (!empty($_POST['newnom'])) {
                    $newnom = $_POST['newnom'];
                    $newnomlong = strlen($newnom);
                    if ($newnomlong <= 40) {

                      $reqnewname = $bdd->prepare("UPDATE `compte_admin` SET `username_admin` = ?; ");
                      $reqnewname->execute(array($newnom));

                      $msgmaintso2 = "<b>Nom d'utilisateur modifié avec succès<i class='fa fa-check-circle'></i></b>";
                    } else {
                      $msgmena2 = "<b>Nom d'utilisateur trop long❗</b>";
                    }
                  }
                  if (isset($_FILES['newimg']['name']) and !empty($_FILES['newimg']['name'])) {

                    $extensionValide = array('jpg', 'gif', 'jpeg', 'png');
                    $extensionUpload = strtolower(substr(strrchr($_FILES['newimg']['name'], "."), 1));

                    if (in_array($extensionUpload, $extensionValide)) {

                      $chemin = "../images/admin/" . $_FILES['newimg']['name'];
                      $insertimg = move_uploaded_file($_FILES['newimg']['tmp_name'], $chemin);

                      $newimgadm = $bdd->prepare("UPDATE `compte_admin` SET `image_admin` = ? ");
                      $newimgadm->execute(array($_FILES['newimg']['name']));

                      $msgmaintso2 = "<b>Photo de profil modifié avec succès<i class='fa fa-check-circle'></i> </b>";
                    }
                  }
                }

                if (isset($msgmena2)) {
                  echo '<font color="red">' . $msgmena2 . '</font>';
                }
                if (isset($msgmaintso2)) {
                  echo '<font color="green">' . $msgmaintso2 . '</font>';
                }

                ?>
              </form>
            </div>

          </div><!-- /.box -->
        </div>
        <div class="col-md-6">
          <!-- Default box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Changer mon mot de passe</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <form method="POST" action="#">
                  <label>Mot de passe actuel</label><br><input type="password" class="form-control" name="mdp" placeholder="****************"><br>
                  <label>Nouveau mot de passe</label><br><input type="password" class="form-control" name="nmdp" placeholder="****************"><br>
                  <label>Confirmer le mot de passe</label><br><input type="password" class="form-control" name="cnmdp" placeholder="****************"><br>
                  <button class="btn btn-block btn-primary" name="change">Changer le mot de passe</button><br>
                  <?php
                  if (isset($_POST['change'])) {
                    if (!empty($_POST['mdp'])) {

                      $passwordash = sha1($_POST['mdp']);

                      $reqpass = $bdd->prepare("SELECT * FROM compte_admin WHERE password_admin = ? ");
                      $reqpass->execute(array($passwordash));
                      $passwordexist = $reqpass->rowCount();
                      $passinfo = $reqpass->fetch();
                      if ($passwordexist != 0) {

                        $_SESSION['id'] = $passinfo['id_admin'];
                        if (!empty($_POST['nmdp']) and !empty($_POST['cnmdp'])) {
                          if (isset($_POST['nmdp']) and isset($_POST['cnmdp'])) {

                            $newpass = $_POST['nmdp'];
                            $newpassash = sha1($_POST['nmdp']);
                            $confirmnewpass = $_POST['cnmdp'];
                            if ($newpass == $confirmnewpass) {

                              $reqchange = $bdd->prepare("UPDATE `compte_admin` SET `password_admin` = ? WHERE `compte_admin`.`id_admin` = ? ; ");
                              $reqchange->execute(array($newpassash, $_SESSION['id']));


                              $msgmaintso = " <b> Votre mot de passe a été changer avec succès✔</b>";
                            } else {

                              $msgmena = " <b> Les mots de passe que vous avez entrer ne correspondent pas❗</b>";
                            }
                          }
                        } else {
                          $msgmena = " <b> Veuillez entrer votre nouveau mot de passe❗</b>";
                        }
                      } else {
                        $msgmena = " <b> mot de passe incorrecte ❗</b>";
                      }
                    } else {
                      $msgmena = " <b> Veuillez entrer votre mot de passe❗</b>";
                    }
                  }
                  ?>
                </form>
                <?php include '../php/error.php'; ?>
              </div>
            </div>
          </div><!-- /.box -->
        </div>
      </div><!-- /.box -->

  </div>




  </section>

  </div>


  <!-- jQuery 2.1.3 -->
  <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='../plugins/fastclick/fastclick.min.js'></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <!-- Page script -->
  <script type="text/javascript">
    $(function() {

      "use strict";

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });

      //When unchecking the checkbox
      $("#check-all").on('ifUnchecked', function(event) {
        //Uncheck all checkboxes
        $("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
      });
      //When checking the checkbox
      $("#check-all").on('ifChecked', function(event) {
        //Check all checkboxes
        $("input[type='checkbox']", ".table-mailbox").iCheck("check");
      });
      //Handle starring for glyphicon and font awesome
      $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
        e.preventDefault();
        //detect type
        var glyph = $(this).hasClass("glyphicon");
        var fa = $(this).hasClass("fa");

        //Switch states
        if (glyph) {
          $(this).toggleClass("glyphicon-star");
          $(this).toggleClass("glyphicon-star-empty");
        }

        if (fa) {
          $(this).toggleClass("fa-star");
          $(this).toggleClass("fa-star-o");
        }
      });

      //Initialize WYSIHTML5 - text editor
      $("#email_message").wysihtml5();
    });
  </script>
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- jQuery UI 1.11.2 -->
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='../../plugins/fastclick/fastclick.min.js'></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js" type="text/javascript"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/bootstrap-fileupload.js"></script>
</body>

</html>