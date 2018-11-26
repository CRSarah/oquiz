<?= view('layout/header')?>
<?php if($isConnected):?>

    <ul>
        <li>Email: <?= $currentUser->email ?></li>
        <li>Prénom: <?= $currentUser->firstname ?></li>
        <li>Nom: <?= $currentUser->lastname ?></li>
    </ul>

<?php else:?>

    <a class="nav-link text-blue" href="<?= route('user_signin'); ?>">
        Cliquez ici pour vous connecter et accéder à votre compte.
    </a>

<?php endif;?>
<?= view('layout/footer')?>