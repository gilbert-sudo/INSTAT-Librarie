<?php
include 'secure_access.php'; // include this file on all secure pages
include '../php/profil.php';
$query = "SELECT * FROM contact WHERE 1;";
$result = $bdd->prepare($query);
$result->execute();
$contact = $result->fetch();
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
        <aside class="main-sidebar" style="height: 145%;">
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
                $namespace = 'contact';
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
                <div class="col-md-12">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Changer vos contacts</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" enctype="multipart/form-data" action="../php/contact.php">
                                <label>N° téléphone:</label><br><input type="text" class="form-control" value="<?=$contact['tel'];?>" name="phone" placeholder="n° téléphone"><br>
                                <label>Adresse Email:</label><br><input type="text" class="form-control" value="<?=$contact['email'];?>" name="email" placeholder="Email"><br>
                                <label>Facebook:</label><br><input type="text" class="form-control" value="<?=$contact['facebook'];?>" name="facebook" placeholder="Lien vers votre profile facebook"><br>
                                <label>LinkedIn:</label><br><input type="text" class="form-control" value="<?=$contact['linkedin'];?>" name="linkedin" placeholder="Lien vers votre profile LinkedIn"><br>
                                <label>Twiter:</label><br><input type="text" class="form-control" value="<?=$contact['twiter'];?>" name="twiter" placeholder="Lien vers votre profile Twiter"><br>
                                <label>Instagram:</label><br><input type="text" class="form-control" value="<?=$contact['instagram'];?>" name="instagram" placeholder="Lien vers votre profile Instagram"><br>
                                <label>Votre site web:</label><br><input type="text" class="form-control" value="<?=$contact['siteweb'];?>" name="siteweb" placeholder="Lien vers votre site web"><br>
                                <button style="margin-left: 20px;" type="submit" class="btn btn-primary" name="valider">Actualiser mes contact</button>
                            </form>
                        </div>
                        <?php if(isset($_GET['success'])): ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button>
                         <h4>Toutes les modifications ont bien été effectuées avec succès.</h4>
                        </div>
                        <?php endif; ?>
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