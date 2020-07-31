<?php include 'controllers/indexController.php' ?>
<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Material Design for Bootstrap</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <a class="navbar-brand" href="#"><img alt="logo chu" title="le logo du chu LA MANU" src="assets/img/logo.png" /></a>
            <button class="navbar-toggler btn-primary" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <!-- mettre foreach ici -->
                <ul class="navbar-nav m-auto">
                    <?php foreach($pageList as $page => $pageName){ 
                        if($page != 'profil-patient' && $page != 'rendezvous') {?>
                        <li class="nav-item"><a class="nav-link" href="index.php?content=<?= $page ?>"><?= $pageName ?></a></li><?php 
                        }     
                    } ?>
                </ul>
            </div>
        </nav>
        <?php include $content ?> 
        
       <!-- jQuery -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- Bootstrap tooltips -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
       <!-- Bootstrap core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <!-- MDB core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
       <!-- Your custom scripts (optional) -->
       <script type="assets/js/main.js">
       </script>
   </body>
</html>