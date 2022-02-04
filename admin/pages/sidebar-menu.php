<?php
function getBtnState(string $var = '')
{   
    global $namespace;
    $pagesname = $var;
    $btn_state = ($namespace == $pagesname) ? "active" : " "; 
    echo $btn_state;
}
 ?>
<ul class="sidebar-menu">
    <li class="<?php getBtnState("accueil"); ?> treeview">
        <a href="accueil.php">
            <i class="fa fa-home"></i> <span>Accueil</span>
        </a>

    </li>

    <li class="<?php getBtnState("addcategory");getBtnState("gerercategory"); ?> treeview">
        <a href="#">
            <i class="glyphicon glyphicon-folder-close"></i>
            <span>Gestion des catégories</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php getBtnState("addcategory"); ?> view"><a href="add_category.php"><i class="fa fa-user"></i>Creer un catégorie</a></li>
            <li class="<?php getBtnState("gerercategory"); ?> view"><a href="gerer_category.php"><i class="fa fa-group"></i>Gérer les catégories</a></li>
        </ul>
    </li>

    <li class="<?php getBtnState("addbook");getBtnState("gererbook"); ?> treeview">
        <a href="#">
            <i class="glyphicon glyphicon-folder-close"></i>
            <span>Gestion des livres</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php getBtnState("addbook"); ?> view"><a href="add_book.php"><i class="fa fa-globe"></i>Ajouter un livre</a></li>
            <li class="<?php getBtnState("gererbook"); ?> view"><a href="gerer_book.php"><i class="fa fa-star"></i>Gérer les livres</a></li>
        </ul>
    </li>
    <li class="<?php getBtnState("general");getBtnState("contact");?> treeview">
        <a href="#">
            <i class="fa fa-gear"></i>
            <span>Paramètres</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php getBtnState("general"); ?> view"><a href="p_general.php"><i class="glyphicon glyphicon-wrench"></i> Générale</a></li>
            <li class="<?php getBtnState("contact"); ?> view"><a href="contact.php"><i class="glyphicon glyphicon-paperclip"></i>Contacts</a></li>
            <li><a href="../php/logout.php"><i class="glyphicon glyphicon-log-out"></i> Deconnexion</a></li>
        </ul>
    </li>
</ul>