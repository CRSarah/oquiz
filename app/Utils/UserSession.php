<?php

namespace App\Utils;

class UserSession {

    public function __construct()
    {
        
    }

    public static function connect($user){
        $_SESSION['currentUser'] = $user;

        return true;
    }

    public static function disconnect(){
        // je n'unset que ma clef pour etre sure de ne pas detruire l'intégralité de ma session
        unset($_SESSION['currentUser']);//<-- unset supprimer la varible != de set

        return true;
    }

    /*
    dans la fonction isConnected je verifie que j'ai bien une valeur currentUser dans mon tableau setté avec la fonction isset. Cela implique qu'a un moment donné la fonction connect() ait été appelée pour stocker un utilisateur
    */
    public static function isConnected(){

        // si la clef existe alors utilisateur connecté
        if(isset($_SESSION['currentUser'])){
            $result = true;
        } else { // sinon il n'est pas connecté
            $result  = false;
        }

        return $result;
    }

    /*
        je me sert de la fonction isConnected qui verifie que j'ai bien une clef currentUser de mon tableau associatif de session settée dans ma session. Si elle est bien presente alors c'est que mon utilisateur est connecté. je peux donc recuperer sa valeur stockée sans craindre d'avoir une erreur.
    
    */
    public static function getUser(){

        //si le user est connecté je peux le retourner sinon false
        if(self::isConnected()){
            $result = $_SESSION['currentUser'];
        } else {
            $result = false;
        }

        return $result;
    }
}

?>