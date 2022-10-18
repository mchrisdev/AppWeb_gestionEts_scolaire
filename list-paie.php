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
 
$info_eleve = $eleve->getEleveFull();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <title>CERM SCHOOL | Liste des paiement</title>

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

            <!-- Header Starts -->
            <div class="row">
               <div class="col-sm-12 p-0">
                  <div class="main-header">
                     <h4>Paiement</h4>
                     <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item">
                           <a href="index.html">
                              <i class="icofont icofont-home"></i>
                           </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Liste des paiement</a>
                        </li>
                        
                     </ol>
                  </div>
               </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row">
               <div class="col-sm-12">
              
                  <!-- Striped Row Table ends -->

                  <!-- Hover effect table starts -->
                  <div class="card">
                     <div class="card-header">
                        <div class="row">
                            <div class="col-md-10"><h5 class="card-header-text">Liste des paiement</h5></div>
                            <div class="col-md-2"><a href="paiement.php?id=<?=$_SESSION['token'];?>" class="btn btn-primary">Nouveau paiement</a></div>
                        </div>
                     </div>      
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-hover" id="datasource">
                                 <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Elève</th>
                                        <th>Classe</th>
                                        <th>Motif</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                        <?php
                                        if ($user_donnees['user_role'] == "Admin")
                                        {
                                        ?>
                                       <th>Bouton de control</th>
                                       <?php } ?>   
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($info_eleve as $donnees){   ?>
                                    <tr>
                                        <td><?= $donnees['id_eleve'];?></td>
                                       <td><?= $donnees['nom_eleve'].' '.$donnees['postnom_eleve'].' '.$donnees['prenom_eleve'];?></td>
                                       <td><?= $donnees['id_classe'];?></td>
                                       <td><?= $donnees['id_frais'];?></td>
                                       <td><?= $donnees['montant_paie'];?></td>
                                       <td><?= $donnees['date_paie'];?></td>
                                       <?php
                                        if ($user_donnees['user_role'] == "Admin")
                                        {
                                        ?>
                                       <td>
                                        <div class="row">
                                            <a href="" class="btn btn-primary  waves-effect waves-light m-r-30"><i></i>modif</a>
                                        </div>
                                       </td>
                                       <?php } ?>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Hover effect table ends -->

                  <!-- Background Utilities table ends -->
               </div>
            </div>
            <!-- Row end -->
            <!-- Tables end -->
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
   <!-- custom js -->
   <script type="text/javascript" src="assets/js/main.min.js"></script>
   <script type="text/javascript" src="assets/pages/elements.js"></script>
   <script src="assets/js/menu.min.js"></script>
   <!--  -->
   <script src="lib/datatables/jquery.dataTables.min.js"></script>
   <script src="lib/select2/js/select2.full.min.js"></script>
   <script src="lib/datatables/jquery.dataTables.min.js"></script>
   <script src="lib/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="lib/sweetalert2/sweetalert2.min.js"></script>
   <script>
    $('datasource').dataTable();
   </script>
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