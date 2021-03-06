<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Reset CSS -->
        <link href="../oquiz/public/css/reset.css"  rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Google fonts CSS -->
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../oquiz/public/css/app.css" rel="stylesheet">

        <title>O'Quiz</title>
    </head>
    <body>
        <main class="container">

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

                <ul class="nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link d-inline text-blue" href="<?= route('quiz_list') ?>">
                        <h1 >O'Quiz</h1>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= route('quiz_list') ?>">
                            <i class="fas fa-home"></i>
                            Accueil
                        </a>
                    </li>

                    <li class="nav-item">
                        <?php if($isConnected):?>
                            <a class="nav-link text-blue" href="<?= route('user_profile'); ?>">
                                <i class="fas fa-user"></i>
                                Mon compte
                            </a>
                        <?php endif;?>
                    </li>

                    <li class="nav-item">
                        <?php if($isConnected):?>   
                            <a class="nav-link text-blue" href="<?= route("quiz_logout"); ?>">
                            <i class="fas fa-sign-out-alt"></i>
                            Déconnexion
                            </a>
                        <?php else:?>
                        <a class="nav-link text-blue" href="<?= route('user_signin'); ?>">
                            <i class="fas fa-user"></i>
                            Connexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" href="<?= route('user_signup'); ?>">
                            <i class="fas fa-user-plus"></i>
                            Inscription
                        </a>
                    </li>
                    <?php endif;?>

                </ul>
            </nav>