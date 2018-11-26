<?= view('layout/header')?>

<div class="row">
        <h2> <?= $currentQuiz->title ?> <!-- Ici, tu vas aller chercher le titre du quiz qui correspond à l'id que tu as passé en paramètres :)  -->
        <span class="badge badge-pill badge-secondary"><?= count($questions) ?> questions</span>
    </h2>
</div>

<div class="row">
    <h4> 
        <?= $currentQuiz->description ?><!-- Ici, tu vas aller chercher le soustitre du quiz qui correspond à l'id que tu as passé en paramètres :)  -->
    </h4>
</div>

<div class="row">
    <p><?= $author->firstname . ' ' . $author->lastname ?></p>
</div>

<?php if($isConnected): ?> 

<form action="" method="post">
<div class="row">
    <?php 
    $radio = 1;
    $option = 1;
    foreach($questions as $question): ?>
        <!-- Note: pour eviter les modulo sur l'ajout d'une div class="row" offset & co - rajouter mr-3 mb-3 pour la gestion des espacements entre questions-->
        <div class="col-sm-3 border p-0 mr-3 mb-3">

            <?php
                $levelName = $levelList[$question->levels_id];

                // comme 3 classes différentes = switch

                switch($levelName){
                    case 'Débutant':
                        $badgeClass = "badge-success";
                    break;
                    case 'Confirmé':
                        $badgeClass = "badge-warning";
                    break;
                    case 'Expert':
                        $badgeClass = "badge-danger";
                    break;
                    default:
                        $badgeClass = "badge-success";
                    ;
                }
            ?>
            <span class="badge <?= $badgeClass ?>  float-right mt-2 mr-2"><?= $levelName ?></span>
                
                <div class="p-3 background-grey">
                    <?= $question->question ?> 
                </div>

                <div class="p-3 question-answer-block">
                    <ul>
                        <?php

                        /* $radio = 1;
                        $option = 1; */

                        foreach($questionAnswerList[$question->id] as $answer ): 

                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question-<?= $question->id ?>" id="<?= $radio ?>" value="<?= $option ?>">
                                <label class="form-check-label" for="<?= $radio ?>">
                                    <?= $answer->description ?> 
                                </label> 
                            </div>
                            
                        <?php 

                        $radio += 1;
                        $option += 1;

                        endforeach; 
                        
                        ?>

                    </ul> 
                </div>

                <div class="p-3 background-grey question-answer-block"> 
                    <a href="https://fr.wikipedia.org/wiki/<?= $question->wiki ?>">Wikipedia</a>
                </div>
            </div>
    <?php endforeach;?>
</div>
<div class="row mt-3">
        <input type="submit" class="btn btn-primary background-blue btn-lg btn-block" value="OK"/>
</div>
</form>

<?php else: ?>

<div class="row">

    <?php foreach($questions as $question): ?>
        <!-- Note: pour eviter les modulo sur l'ajout d'une div class="row" offset & co - rajouter mr-3 mb-3 pour la gestion des espacements entre questions-->
        <div class="col-sm-3 border p-0 mr-3 mb-3">

            <?php
                $levelName = $levelList[$question->levels_id];

                // comme 3 classes différentes = switch

                switch($levelName){
                    case 'Débutant':
                        $badgeClass = "badge-success";
                    break;
                    case 'Confirmé':
                        $badgeClass = "badge-warning";
                    break;
                    case 'Expert':
                        $badgeClass = "badge-danger";
                    break;
                    default:
                        $badgeClass = "badge-success";
                    ;
                }
            ?>
            <span class="badge <?= $badgeClass ?>  float-right mt-2 mr-2"><?= $levelName ?></span>
                
                <div class="p-3 background-grey">
                    <?= $question->question ?> 
                </div>

                <div class="p-3 question-answer-block">
                    
                    <ul>
                        <?php 

                        $i = 1; //optionnel (affichage)

                        foreach($questionAnswerList[$question->id] as $answer ): 

                        ?>
                            <li>
                                <?= $i ?>. <?= $answer->description ?> 
                            </li>

                        <?php

                        $i += 1;
                        endforeach; 

                        ?>

                    </ul> 
                </div>
        </div>
    <?php endforeach; ?>

</div>

<?php endif;?>

<?= view('layout/footer')?>