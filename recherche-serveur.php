<?php
session_start();
require 'includes/init.php';
// verification  infos user
if (isset($_GET['id'], $_GET['search']) and !empty($_GET['id']) and !empty($_GET['search'])) {

   $getToken = htmlspecialchars($_GET['id']);
   $getID_ELEVE = $_GET['search'];
   if ($user->getToken($getToken) == true) {
      $infoUser = $user->setUser($getToken);
      foreach ($infoUser as $user_donnees) {
         // verification si user est bellement connecté
         if (isset($_SESSION['token']) and $user_donnees['token'] == $_SESSION['token']) {

            // var_dump($serv->setEleve_serveur_id($getID_ELEVE));
            // exit;
            if($serv->setEleve_serveur_id($getID_ELEVE) == true)
            {
            $info_eleve = $eleve->getEleve();
            $classe = $clas->getClasse();
            $option = $opt->getOption();
            $ecoleProv = $serv->getEcoleServeur();
            $message = "";
            if (isset($_POST['btnInscrit'])) {
               if (
                  !empty($_POST['name']) and !empty($_POST['festname']) and !empty($_POST['prenom']) and !empty($_POST['sexe'])
                  and !empty($_POST['datenaiss']) and !empty($_POST['lieunaiss']) and !empty($_POST['nation']) and !empty($_POST['nom_tuteur'])
                  and !empty($_POST['classe']) and !empty($_POST['option']) and !empty($_POST['prenom_tuteur']) and !empty($_POST['profession'])
                  and !empty($_POST['phone_tuteur']) and !empty($_POST['adresse'])
               ) {
                  // insertion des informations
                  // insertion tuteur
                  $tut->setInsertion($_POST['nom_tuteur'], $_POST['prenom_tuteur'], $_POST['profession'], $_POST['phone_tuteur'], $_POST['adresse']);

                  // //insertion ecole
                  if ($serv->setVerifiEcolServeur($_POST['ecole']) == true) {
                     $infos_serv = $serv->setEcoleInfosServeur($_POST['ecole']);
                     foreach ($infos_serv as $serveur_donnee) {
                        $_SESSION['id_ecole'] = $serveur_donnee['id_ecole'];
                        $_SESSION['nom_ecole'] = $serveur_donnee['nom_ecole'];
                        $_SESSION['ville_ecole'] = $serveur_donnee['ville_ecole'];
                        $_SESSION['province_ecole'] = $serveur_donnee['province_ecole'];
                        $_SESSION['tyoe_ecole'] = $serveur_donnee['tyoe_ecole'];
                     }

                     //insertion ecole
                     $ecole_local->setEcole($_SESSION['id_ecole'], $_SESSION['nom_ecole'], $_SESSION['ville_ecole'], $_SESSION['province_ecole'], $_SESSION['tyoe_ecole']);

                     $id_eleve = "ELEV" . mt_rand(1, 1000000);

                     $subQuerry = "SELECT * FROM t_tuteur WHERE nom_tuteur= '" . $_POST['nom_tuteur'] . "'";
                     $stmt = Database::DbConnection()->prepare($subQuerry);
                     $stmt->execute();
                     if ($stmt->rowCount() > 0) {
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                           $_SESSION['id_tuteur'] = $row['id_tuteur'];
                        }
                     }

                     $eleve->setInsertion($id_eleve, $_POST['name'], $_POST['festname'], $_POST['prenom'], $_POST['sexe'], $_POST['datenaiss'], $_POST['lieunaiss'], $_POST['nation'], $_SESSION['id_tuteur'], $_SESSION['id_ecole']);

                     $subQuerry = "SELECT * FROM t_anneescolaire";
                     $stmt = Database::DbConnection()->prepare($subQuerry);
                     $stmt->execute();
                     if ($stmt->rowCount() > 0) {
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                           $_SESSION['anneescolaire'] = $row['anneescolaire'];
                        }
                     }

                     $insc->setInsertion($id_eleve, $_POST['classe'], $_SESSION['anneescolaire'], $_POST['option']);
                     $message = '<label class="alert alert-success btn-block">Enregistrement avec succès !</label>';
                  } else {
                     $message = '<label class="alert alert-danger btn-block">Une erreur est survenu lors de traitement veuillez réessayer de nouveau!</label>';
                  }

                  // // insertion eleve
                  // 
                  // 
                  // ;
                  // $insc->setInsertion();

                  //End 
                  // $message = '<label class="alert alert-danger btn-block">bouton appyer ok !</label>';
               } else {
                  $message = '<label class="alert alert-danger btn-block">Veuillez remplir tous champs !</label>';
               }
               // 
            }
?>

            <!DOCTYPE html>
            <html lang="fr">

            <head>
               <title>CERM SCHOOL | Recherche</title>
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
                                    <h4>Nouveau élève</h4>
                                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                       <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                                       </li>
                                       <li class="breadcrumb-item"><a href="#">Formulaire d'enregistrement</a>
                                       </li>
                                       <li class="breadcrumb-item"><a href="form-elements-bootstrap.html">General Elements</a>
                                       </li>
                                    </ol>
                                 </div>
                              </div>
                           </div>
                           <!-- Row end -->

                           <!-- Row start -->
                           <div class="row">
                              <!-- Form Control starts -->
                              <div class="col-lg-12">
                                 <div class="card">

                                    <div class="card-header">
                                       <div class="row">
                                          <form action="recherche-serveur.php" method="get">
                                             <div class="col-md-6">
                                                <h5 class="card-header-text">Formulaire d'enregistrement</h5>
                                             </div>
                                             <div class="col-md-4"><input type="text" name="search" class="form-control" placeholder="Recherche de matricule eleve au serveur central"></div>
                                             <div class="col-md-2">

                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-30">recherche</button>
                                             </div>
                                          </form>
                                       </div>
                                       <hr class="bg-primary">
                                    </div>
                                    <div class="card-block">
                                       <form method="POST" action="">
                                          <?php
                                          // $serveur = $serv->setEcole_serveur_id($getID_ELEVE);
                                          $querry = "SELECT * FROM t_eleve WHERE id_eleve = ?";
                                          $stmt = Serveur::setQuerry($querry, array($getID_ELEVE));
                                          if ($stmt->rowCount() > 0) {
                                             $serveur = $stmt->fetchAll();
                                             foreach ($serveur as $rowServeur) {
                                                $_SESSION['nom_eleve'] = $rowServeur['nom_eleve'];
                                                $_SESSION['postnom_eleve'] = $rowServeur['postnom_eleve'];
                                                $_SESSION['prenom_eleve'] = $rowServeur['prenom_eleve'];
                                                $_SESSION['sexe_eleve'] = $rowServeur['sexe_eleve'];
                                                $_SESSION['datenaisse_eleve'] = $rowServeur['datenaisse_eleve'];
                                                $_SESSION['lieunaisse_eleve'] = $rowServeur['lieunaisse_eleve'];
                                                $_SESSION['nationalite_eleve'] = $rowServeur['nationalite_eleve'];
                                                $_SESSION['id_ecole'] = $rowServeur['id_ecole'];
                                             }
                                             
                                          }
                                          else
                                          {
                                             header('Location:new-inscrit.php?id='.$getToken.'&flash=erreur');
                                             exit;
                                          }
                                          ?>
                                          <?php echo $message; ?>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="exampleInputEmail1" class="form-control-label">Nom</label>
                                                   <input type="text" name="name" value="<?php echo $_SESSION['nom_eleve']; ?>" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Postnom</label>
                                                   <input type="text" name="festname" value="<?php echo $_SESSION['postnom_eleve']; ?>" class="form-control" required id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Prénom</label>
                                                   <input type="text" name="prenom" class="form-control" value="<?php echo $_SESSION['prenom_eleve']; ?>" required id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Sexe</label>
                                                   <select name="sexe" id="sexe" class="form-control" required id="exampleInputPassword1">
                                                      <option value="Femme">Femme</option>
                                                      <option value="Homme">Homme</option>
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="" class="form-control-label">Date de naissance</label>
                                                   <input type="date" name="datenaiss" required value="<?php echo $_SESSION['datenaisse_eleve']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="" class="form-control-label">Lieu de naissance</label>
                                                   <input type="text" name="lieunaiss" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Classe</label>
                                                   <select name="classe" id="classe" required class="form-control" id="exampleInputPassword1">
                                                      <option value=""><?php echo $_SESSION['sexe_eleve']; ?></option>
                                                      <?php foreach ($classe as $donne) {  ?>
                                                         <option value="<?php echo $donne['id_classe'] ?>"><?php echo $donne['id_classe'] ?></option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Option</label>
                                                   <select name="option" id="option" required class="form-control" id="exampleInputPassword1">
                                                      <option value="">Selectionner</option>
                                                      <?php foreach ($option as $donne) { ?>
                                                         <option value="<?php echo $donne['id_option'] ?>"><?php echo $donne['id_option'] ?></option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Nationalité</label>
                                                   <input type="text" name="nation" required value="<?php echo $_SESSION['nationalite_eleve']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>

                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Ecole de provinnace</label>
                                                   <select name="ecole" id="ecole" required class="form-control" id="exampleInputPassword1">
                                                      <option value="">Selectionner</option>
                                                      <?php foreach ($ecoleProv as $donne) { ?>
                                                         <option value="<?php echo $donne['id_ecole'] ?>"><?php echo $donne['nom_ecole'] ?></option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Nom du tuteur</label>
                                                   <input type="text" name="nom_tuteur" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Prénom du tuteur</label>
                                                   <input type="text" name="prenom_tuteur" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Profession</label>
                                                   <input type="text" name="profession" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Téléphone</label>
                                                   <input type="text" name="phone_tuteur" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                   <label for="exampleInputPassword1" class="form-control-label">Adresse</label>
                                                   <input type="text" name="adresse" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                             </div>
                                             <div class="col-md-12"> <button type="submit" name="btnInscrit" class="btn btn-primary btn-block waves-effect waves-light m-r-30">Enregistrer</button></div>
                                          </div>
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
<?php   }else{ header('Location:new-inscrit.php?id='.$getToken.'&flash=erreur');
                                             exit;}

         

} else {
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