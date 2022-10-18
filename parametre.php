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

            $info_user = $user->getUtilisateur();
            $message = "";
            if(isset($_POST['btnuser']))
            {
               if(!empty($_POST['name']) AND !empty($_POST['role']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']))
               {
                  if($_POST['password'] != $_POST['passwordConfirm'])
                  {
                     $message = '<label class="alert alert-danger btn-block">non identique ! </label>';
                  }
                  else
                  {
                     $user->setInsertion($_POST['name'], $_POST['password'], $_POST['role']);
                     $message = $user->get_message();
                  }
               }
               else
               {
                  $message = '<label class="alert alert-danger btn-block">Veuillez remplit tous les champs 1 ! </label>';
               }
            }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <title>CERM SCHOOL | Paramètre</title>
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
                        <h4>General Elements</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                           <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                           </li>
                           <li class="breadcrumb-item"><a href="#">Forms Components</a>
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
                  <div class="col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-header-text">Formulaire d'enregistrement utilisateur</h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#input-type-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>
                        <!-- end of modal -->
                        <div class="card-block">
                           <form method="POST">
                              <?php echo $message;?>
                              <div class="form-group">
                                 <label for="exampleInputEmail1" class="form-control-label">Nom d'utilisateur</label>
                                 <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
                                 <input type="hidden" class="form-control" name="id_user" id="id_user" aria-describedby="emailHelp">
                              </div>
                              
                              
                              <div class="form-group">
                                 <label for="exampleSelect1" class="form-control-label">Role</label>
                                 <select class="form-control " id="role" name="role">
                                            <option value="">Choisisser</option>
                                            <option value="Administrateur">Administrateur</option>
                                            <option value="Réceptionniste">Receptionniste</option>
                                            <option value="Caissier">Caissier</option>
                                </select>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword1" class="form-control-label">Mot de passe</label>
                                 <input type="password" name="password"  class="form-control" id="password">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword1" class="form-control-label">Password</label>
                                 <input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm">
                              </div>
                              <button type="submit" name="btnuser" class="btn btn-success btn-block waves-effect waves-light m-r-30">Enregistrer</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- Form Control ends -->

                  <!-- Textual inputs starts -->
                  <div class="col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-header-text">Liste des utilisateur</h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#textual-input-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>
                        
                        <!-- end of modal -->
                        <div class="card-block">
                        <div class="col-sm-12 table-responsive">
                              <table class="table table-hover" id="datasource">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Nom</th>
                                       <th>Role</th>
                                       <th>Bouton de control</th>   
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($info_user as $donnees){   ?>
                                    <tr>
                                       <td><?= $donnees['id_user'];?></td>
                                       <td><?= $donnees['user_name'];?></td>
                                       <td><?= $donnees['user_role'];?></td>
                                       <td>
                                        <div class="row">
                                            <a href="javasript:void(0)" id="" data-id="<?= $donnees['id_user'];?>" data-name="<?= $donnees['user_name'];?>" data-role="<?= $donnees['user_role'];?>" class="btnUpdate btn btn-primary  waves-effect waves-light m-r-30"><i class=""></i>Modifier</a>
                                            <a href="delete.php?id=<?php echo $_SESSION['token'].'&user='.$donnees['id_user'];?>" id="" data-id="<?= $donnees['id_user'];?>" data-name="<?= $donnees['user_name'];?>" data-role="<?= $donnees['user_role'];?>" class="btnDelete btn btn-danger  waves-effect waves-light m-r-30"><i class=""></i>Supprimer</a>
                                        </div>
                                       </td>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
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
   <script src="includes/function.js"></script>

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