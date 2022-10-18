<aside class="main-sidebar hidden-print ">
   <section class="sidebar" id="sidebar-scroll">
      <!-- Sidebar Menu-->
      <ul class="sidebar-menu">
         <li class="nav-level"></li>
         <?php
         if ($user_donnees['user_role'] == "Administrateur") {
         ?>
            <li class="active treeview">
               <a class="waves-effect waves-dark" href="tableau-bord.php?id=<?php echo $_SESSION['token']; ?>">
                  <i class="icon-speedometer"></i><span> Tableau de bord</span>
               </a>
            </li>
            <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>Inscription élèves </span><i class="icon-arrow-down"></i></a>
               <ul class="treeview-menu">
                  <li><a class="waves-effect waves-dark" href="list-eleve.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i>Liste des élèves </a></li>
                  <li><a class="waves-effect waves-dark" href="eleve-inscrit.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i> Liste des élèves inscrit</a></li>
               </ul>
            </li>

            <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span>Paiement</span><i class="icon-arrow-down"></i></a>
               <ul class="treeview-menu">
                  <li><a class="waves-effect waves-dark" href="paiement.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i>Paiement</a></li>

                  <li><a class="waves-effect waves-dark" href="list-paie.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i>Liste paiement</a></li>
               </ul>
            </li>

            <li class="treeview"><a class="waves-effect waves-dark" href="parametre.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-book-open"></i><span>Paramètre</span></a>
               
            </li>

         <?php
         } else if ($user_donnees['user_role'] == "Caissier") {
         ?>

<li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span>Paiement</span><i class="icon-arrow-down"></i></a>
               <ul class="treeview-menu">
                  <li><a class="waves-effect waves-dark" href="paiement.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i>Paiement</a></li>

                  <li><a class="waves-effect waves-dark" href="list-paie.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i>Liste paiement</a></li>
               </ul>
            </li>
         <?php
         } else if ($user_donnees['user_role'] == "Réceptionniste") {
         ?>

            <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>Inscription élèves </span><i class="icon-arrow-down"></i></a>
               <ul class="treeview-menu">
                  <li><a class="waves-effect waves-dark" href="list-eleve.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i>Liste des élèves </a></li>
                  <li><a class="waves-effect waves-dark" href="eleve-inscrit.php?id=<?php echo $_SESSION['token']; ?>"><i class="icon-arrow-right"></i> Liste des élèves inscrit</a></li>
               </ul>
            </li>
         <?php
         }
         ?>

      </ul>
   </section>
</aside>