<?php
require('../bootstrap.php'); 
session_start();
?>
<?php
include('update.php'); 
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
        <title>Admin Section - Edit Post</title>
    </head>

    <body>
    <header class="header" data-aos="fade-down" data-aos-offset="200" data-aos-delay="750" data-aos-duration="1000"
        data-aos-once="true">
        <h1 class="header_logo">
        <span>Mini</span>Débat 
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

                <?php
                    $rep = $entityManager->getRepository('Message');
                    $message = $rep->findOneBy(array('id'=>$_GET["id"]));
                ?>

                <div class="container">

                    <h2 class="page-title">Modifier un article</h2>

                    <form action="editer.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $message->getId() ?>">
                        <div>
                            <label>Titre</label>
                            <input type="text" name="titre" class="text-input">
                        </div>
                        <div>
                            <label>Contenu</label>
                            <textarea cols="130", rows="10" name="contenu" id="body"></textarea>
                        </div>
                        <div>
                            <button type="submit" name="update-post" class="btn btn-big">Actualiser</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Container page admin -->


            <!-- MAIN JS -->
    <script src="../main.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>