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

            $eleve_inscrit = $eleve->getCountInscrit();
            $Nbrepaiement = $paie->getCountPaiement();
            $nbreEleve = $eleve->getCountEleve();

?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
               <title> CERM SCHOOL | Tableau de bord</title>
               <?php require 'includes/head-link.php'; ?>

            <body class="sidebar-mini fixed">
               <div class="loader-bg">
                  <div class="loader-bar">
                  </div>
               </div>
               <div class="wrapper">
                  <!-- Navbar-->
                  <?php
                     require 'includes/header.php';
                     require 'includes/menu.php';
                  ?>
                  <!-- Side-Nav-->
                  
                  <!-- Sidebar chat start -->
                
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

                           <button type="button" class="chat-send waves-effect waves-light">
                              <i class="icofont icofont-location-arrow f-20 "></i>
                           </button>
                        </div>

                     </div>
                  </div>
                  <!-- Sidebar chat end-->
                  <div class="content-wrapper">
                     <!-- Container-fluid starts -->
                     <!-- Main content starts -->
                     <div class="container-fluid">
                        <div class="row">
                           <div class="main-header">
                              <h4>Tableau de bord</h4>
                           </div>
                        </div>
                        <!-- 4-blocks row start -->
                        <div class="row dashboard-header">
                           <div class="col-lg-4 col-md-6">
                              <div class="card dashboard-product">
                                 <span>Eleves Inscrit</span>
                                 <h2 class="dashboard-total-products"><?php echo $eleve_inscrit;?></h2>
                                 <span class="label label-warning">Nombre</span>
                                 <div class="side-box">
                                    <i class="ti-user text-warning-color"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-6">
                              <div class="card dashboard-product">
                                 <span>Paiement</span>
                                 <h2 class="dashboard-total-products"><?php echo $Nbrepaiement;?></h2>
                                 <span class="label label-primary">Nombre</span>
                                 <div class="side-box ">
                                    <i class="ti-money text-primary-color"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-6">
                              <div class="card dashboard-product">
                                 <span>Nomnbre des élèves </span>
                                 <h2 class="dashboard-total-products"><span><?php echo $nbreEleve;?></span></h2>
                                 <span class="label label-success">Nombre</span>
                                 <div class="side-box">
                                    <i class="ti-user text-success-color"></i>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                        <!-- 4-blocks row end -->

                        <!-- 1-3-block row start -->

                        <!-- 1-3-block row end -->

                        <!-- 2-1 block start -->
                        <div class="row">
                           <div class="col-xl-12 col-lg-12">
                              
                           </div>

                        </div>
                        <!-- 2-1 block end -->
                     </div>
                  </div>
               </div>


               <!-- Required Jqurey -->
               <script src="assets/plugins/Jquery/dist/jquery.min.js"></script>
               <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
               <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

               <!-- Required Fremwork -->
               <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

               <!-- Scrollbar JS-->
               <!-- <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script> -->
               <!-- <script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script> -->

               <!--classic JS-->
               <script src="assets/plugins/classie/classie.js"></script>

               <!-- notification -->
               <!-- <script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script> -->

               <!-- Sparkline charts -->
               <script src="assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

               <!-- Counter js  -->
               <!-- <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script> -->
               <!-- <script src="assets/plugins/countdown/js/jquery.counterup.js"></script> -->

               <!-- Echart js -->
               <!-- custom js -->
               <script type="text/javascript" src="assets/js/main.min.js"></script>
               <script type="text/javascript" src="assets/pages/dashboard.js"></script>
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