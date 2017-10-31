<!DOCTYPE html>
<?php
include './admin/lib/php/adm_liste_include.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <meta charset:="UTF-8">
        <title>Geek Garden</title>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style_projetweb2017.css"
    </head>
    <body>
        <div class="container">
            <header>
                <img src="admin/images/Banniere.jpg" alt="Geek Garden"/>
            </header>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <nav>
                        <?php
                            if(file_exists("./lib/php/p_menu.php")){
                                include ("./lib/php/p_menu.php");
                            }
                        ?>
                    </nav>
                </div>
                <div class="col-sm-10">
                    <section>
                        <?php
                    /* le contenu change en fonction de la navigation */
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "./pages/accueil.php";
                    } else {

                        if (isset($_GET['page'])) {
                            //print $_GET['page'];
                            $_SESSION['page'] = "./pages/" . $_GET['page'];
                        }
                    }

                    //print $_SESSION['page'];  
                    if (file_exists($_SESSION['page'])) {
                        include $_SESSION['page'];
                    } else {
                        print "OUPS!!!!!";
                    }
                    ?>
                    </section>
                    <footer>
                        <?php
                        if(file_exists("./lib/php/p_footer.php")){
                            include ("./lib/php/p_footer.php");
                        }
                        ?>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>