<?= view('layout/header')?>

<!-- si mon tableau d'erreur(s) n'est pas vide => boucle pour afficher les erreurs à l'utilisateur -->
<?php if(!empty($errorList)): ?>

     <?php foreach($errorList as $currentError): ?>
         <div class="alert alert-danger" role="alert">
            <?= $currentError ?>
         </div>
     <?php endforeach; ?>
     
 <?php endif; ?>

 <form action="" method="POST">
   <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email">
   </div>
   <div class="form-group">
      <label for="firstname">Prénom</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Entrer votre prénom">
   </div>
   <div class="form-group">
      <label for="lastname">Nom</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Entrer votre nom">
   </div>
   <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe">
   </div>

    <div class="form-group">
      <label for="confirmPassword">Mot de passe</label>
      <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmer votre mot de passe">
   </div>

   <button type="submit" class="btn btn-primary">S'inscrire</button>

</form>

<?= view('layout/footer')?>