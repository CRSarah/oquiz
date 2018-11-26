<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\UserSession;

class Controller extends BaseController
{
    public function __construct(){

        /*
        Pour partager des données avec toutes les views on peux utiliser la methode share
        Comme je passe des parametres pour toutes les vues je n'ai pas besoin de specifier une vue particuliere

        J'associe donc pour toute mes vues les retours pertinents de son objet UserSession via ses methodes
        */
        
        view()->share('isConnected', UserSession::isConnected());
        view()->share('currentUser', UserSession::getUser());

    }
}
