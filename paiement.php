<?php

session_start();
require 'includes/init.php';
// verification  infos user
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getToken = htmlspecialchars($_GET['id']);
    if ($user->getToken($getToken) == true) {
        $infoUser = $user->setUser($getToken);
        foreach ($infoUser as $user_donnees) {
            // verification si user est bellement connecté
            if (isset($_SESSION['token']) and $user_donnees['token'] == $_SESSION['token']) {

                $message = "";
                $info_eleve = $eleve->getEleve();
                $classe = $clas->getClasse();
                $paiement = $paie->gteFrais();

                if(isset($_POST['btnpaie']))
                {
                    if(!empty($_POST['ideleve']) AND !empty($_POST['montant']) AND !empty($_POST['frais']))
                    {
                        $paie->setInsertion($_POST['ideleve'], $_POST['frais'],$_POST['montant']);
                        $message = $paie->getMessage();
                    }
                    else
                    {
                        $message = '<label class="alert alert-danger btn-block">Veuillez remplir tous champs ! !</label>';
                    }
                }
?>


                <!DOCTYPE html>
                <html lang="fr">

                <head>
                    <title>CERM SCHOOL | Paiement</title>
                    <?php require 'includes/head-link.php'; ?>
                <body class="sidebar-mini fixed">
                    <div class="wrapper">
                    <?php
                     require 'includes/header.php';
                     require 'includes/menu.php';
                  ?>
                        <div class="showChat_inner">
                            <div class="media chat-inner-header">
                                <a class="back_chatBox">
                                    <i class="icofont icofont-rounded-left"></i> Josephin Doe
                                </a>
                            </div>
                            <div class="media chat-messages">
                                <a class="media-left photo-table" href="#!">
                                    <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body chat-menu-content">
                                    <div class="">
                                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                                        <p class="chat-time">8:20 a.m.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="media chat-messages">
                                <div class="media-body chat-menu-reply">
                                    <div class="">
                                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                                        <p class="chat-time">8:20 a.m.</p>
                                    </div>
                                </div>
                                <div class="media-right photo-table">
                                    <a href="#!">
                                        <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="media chat-reply-box">
                                <div class="md-input-wrapper">
                                    <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
                                    <label>Share your thoughts</label>
                                    <span class="highlight"></span>
                                    <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
                                        <i class="icofont icofont-location-arrow f-20 "></i>
                                    </button>

                                </div>

                            </div>
                        </div>
                        <!-- Sidebar chat end-->
                        <div class="content-wrapper">
                            <!-- Container-fluid starts -->
                            <div class="container-fluid">
                                <!-- Main content starts -->
                                <div>
                                    <!-- Row Starts -->
                                    <div class="row">
                                        <div class="col-sm-12 p-0">
                                            <div class="main-header">
                                                <h4>Paiement</h4>
                                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#">Paiement</a></li>
                                                    
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="row">
                                        <!-- Form Control starts -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text">Formulaire de paiement</h5>
                                                    <div class="f-right">
                                                        <a href="" data-toggle="modal" data-target="#input-type-Modal"><i class="icofont icofont-code-alt"></i></a>
                                                    </div>
                                                </div>

                                                <!-- end of modal -->

                                                <div class="card-block">
                                                    <form method="POST">
                                                        <?php echo $message; ?>
                                                        <div class="form-group">
                                                            <label for="exampleSelect1" class="form-control-label">Eleve</label>
                                                            <select class="form-control " id="ideleve" name="ideleve">
                                                                <option value="">Choisissez</option>
                                                                <?php 
                                                                foreach($info_eleve as $donnee)
                                                                ?>
                                                                <option value="<?php echo $donnee['id_eleve'] ?>"><?php echo $donnee['nom_eleve'].' '.$donnee['postnom_eleve']; ?></option>
                                                                <?php ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelect2" class="form-control-label">Classe</label>
                                                            <select class="form-control multiple-select" id="classe" name="classe">
                                                            <option value="">Selectionner</option>
                                                                        <?php foreach ($classe as $donne) {  ?>
                                                                            <option value="<?php echo $donne['id_classe'] ?>"><?php echo $donne['id_classe'] ?></option>
                                                                        <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelect2" class="form-control-label">Frais</label>
                                                            <select class="form-control " id="frais" name="frais">
                                                            <option value="">Selectionner</option>
                                                                        <?php foreach ($paiement as $donne) {  ?>
                                                                            <option value="<?php echo $donne['id_frais'] ?>"><?php echo $donne['id_frais'] ?></option>
                                                                        <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleSelect2" class="form-control-label">Montant</label>
                                                            <input class="form-control" type="text" name="montant" id="montant">
                                                        </div>
                                                       
                                                        
                                                       
                                                        <button type="submit" name="btnpaie" class="btn btn-success btn-block waves-effect waves-light m-r-30">Enregistrer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Control ends -->

                                        <!-- Textual inputs ends -->
                                    </div>
                                    <!-- Row end -->
                                    <!-- Row end -->
                                </div>
                                <!-- Main content ends -->
                            </div>
                            <!-- Container-fluid ends -->
                        </div>
                    </div>


                    <!-- Required Jqurey -->
                    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
                    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
                    <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

                    <!-- Required Fremwork -->
                    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

                    <!-- waves effects.js -->
                    <script src="assets/plugins/Waves/waves.min.js"></script>

                    <!-- Scrollbar JS-->
                    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
                    <script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

                    <!--classic JS-->
                    <script src="assets/plugins/classie/classie.js"></script>

                    <!-- notification -->
                    <script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

                    <!-- Highliter js -->
                    <script type="text/javascript" src="assets/plugins/syntaxhighlighter/scripts/shCore.js"></script>
                    <script type="text/javascript" src="assets/plugins/syntaxhighlighter/scripts/shBrushJScript.js"></script>
                    <script type="text/javascript" src="assets/plugins/syntaxhighlighter/scripts/shBrushXml.js"></script>
                    <script type="text/javascript">
                        SyntaxHighlighter.all();
                    </script>

                    <!-- custom js -->
                    <script type="text/javascript" src="assets/js/main.min.js"></script>
                    <script type="text/javascript" src="assets/pages/elements.js"></script>
                    <script src="assets/js/menu.min.js"></script>

                </body>

                </html>
<?php    } else {
                header('Location:index.php');
            }
        }
    } else {
        header('Location:404.php');
    }
} else {
    header('Location:index.php');
}

?>