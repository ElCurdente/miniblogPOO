<?php 

require_once '../bootstrap.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Style général -->
        <link rel="stylesheet" href="../css/style.css">

        <!-- Style admin -->
        <link rel="stylesheet" href="../css/admin.css">
        <title>Section Admin - Gestions des articles</title>
    </head>

    <body>
    <header class="header" data-aos="fade-down" data-aos-offset="200" data-aos-delay="750" data-aos-duration="1000"
        data-aos-once="true">
        <h1 class="header_logo">
        <span>Mini</span>Débat</h1>  
</h1>

        <ion-icon name="menu-outline" class="header_toggle" id="nav-toggle"></ion-icon>

        <nav class="nav" id="nav-menu">
            <div class="nav_content bd-grid">
                <ion-icon name="close-outline" class="nav_close" id="nav-close"></ion-icon>

                <div class="nav_perfil">
                    <div class="nav_img">
                        <h1 class="logo-text"><span>Mini</span>Débat</h1>
                    </div>
                </div>
                <div class="nav_menu">
                    <ul class="nav_list">
                        <li class="nav_item"><a href="../index.php" rel="noopener" class="nav_link active">ACCUEIL</a></li>
                        <li class="nav_item"><a href="../archives.php" rel="noopener" class="nav_link">ARCHIVES</a></li>
                        <li class="nav_item"><a href="../saisie-login.php" rel="noopener" class="nav_link">SE CONNECTER</a></li>
                        <li class="nav_item"><a href="../inscription.php" rel="noopener" class="nav_link">S'INSCRIRE</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <!-- Container page admin -->
        <div class="admin-container">

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" rel="noopener" class="btn btn-big">Ajouter un article</a>
                    <a href="index.php" rel="noopener" class="btn btn-big">Gérer des articles</a>
                </div>
                <div class="container">
                    <h2 class="page-title">Gestion des articles</h2>
                    <table>
                        <thead>
                            <th>N°</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <!-- On affiche un tableau regroupant chaque article créé par l'admin -->
                            <?php 
                            $messages = $entityManager->getRepository('message')->findAll();
                            foreach($messages as $key=>$message){
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?php echo $message->getTitre(); ?></td>
                                    <td><?php echo $message->getUtilisateur()->getLogin(); ?></td>
                                    <td><a href="editer.php?id=<?php echo $message->getId() ?>" rel="noopener" class="edit">Modifier</a></td>
                                    <td><a href="editer.php?sup_id=<?php echo $message->getId() ?>" rel="noopener" class="delete">Supprimer</a></td>  
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- MAIN JS -->
    <script src="../main.js"></script>

    <!-- IONICONS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>