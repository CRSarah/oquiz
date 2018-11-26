<?= view('layout/header')?>

            <div class="row">
                <h2> Bienvenue sur O'Quiz 
                <?php if($isConnected):?> 
                    <?= $currentUser->email; ?>
                <?php endif;?>
                </h2>
                <p>

                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                
                </p>
            </div>

            <div class="row">

                <?php foreach($quizzes as $quiz): ?>

                    <div class="col-sm-4">
                        <a href="<?= route('quiz_show', ['id' => $quiz->id]) ?>"><h3 class="text-blue"><?= $quiz->title ?></h3></a>
                        <h5><?= $quiz->description ?></h5>
                        <p>
                            <!-- 6.1.3 HOME - affichage du user associé a l'id author -->

                            <!-- 
                            La creation d'un tableau contenant mes données m'evites que pour chaque tour de boucle je doive effectuer une boucle foreach pour retrouver le bon user associé a chaque quiz-->
                            <?= $userList[$quiz->app_users_id] ?>
                        </p>
                    </div>

                <?php endforeach; ?>

<?= view('layout/footer')?>