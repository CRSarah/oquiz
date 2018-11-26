<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Utils\UserSession; 


class UserController extends Controller
{
    public function __construct()
    {
        // permet d'appeler ma fonction parent malgres le fait que je l'ecrase dans mon enfant
        parent::__construct();
    }

    public function signup(Request $request){

        $errorList = []; // si pas d'erreur = je n'affiche rien

        if( $request->method() == 'POST' ) { // ici je teste uniquement ma méthode post car ajout en bdd

            $email = $request->input('email', ''); // le 2eme parametre correspond à une valeur par défaut
            $firstname = $request->input('firstname', '');
            $lastname = $request->input('lastname', '');
            $password = $request->input('password', '');
            $confirmPassword = $request->input('confirmPassword', '');

            $email = trim($email); // trim pour supprimer les espaces entrés par erreur
            $firstname = trim($firstname);
            $lastname = trim($lastname);
            $password = trim($password);
            $confirmPassword = trim($confirmPassword);
    
            //dump($request);

            // test de chaque input
            if(empty($email)){
                $errorList[] = 'Veuillez entrer un email';
            } elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
                $errorList[] = 'Veuillez entrer un email valide';
            }

            if(empty($firstname)){
                $errorList[] = 'Veuillez entrer un prénom';
            }

            if(empty($lastname)){
                $errorList[] = 'Veuillez entrer un nom';
            }

            if(empty($password)){
                $errorList[] = 'Veuillez entrer un mot de passe';
            }elseif(strlen($password) < 8 ){
                $errorList[] = 'Veuillez entrer un mot de passe supérieur à 8 caractères';
            }

            if($password !== $confirmPassword){
                $errorList[] = 'Les mots de passe ne sont pas identiques';
            }

            if(empty($errorList)){ // si mon tableau d'erreur(s) est vide => enregistrer le nouveau user
                $user = new User(); //<-- va permettre de servir de plateforme d'echange en la table mysql & lumen
                $user->email = $email;

                $user->firstname = $firstname;

                $user->lastname = $lastname;

                // encrypter puis enregistret le password (note : la methode password_hash et sa valeur par defaut encode le mot de passe en bcrypt)
                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                $user->password = $encryptedPassword;
                
                // mon User model herite de la classe Model qui fournit une fonction standard d'enregistrement appelé save
                $user->save();
            }

        }

        return view('user.signup', [
            'errorList' => $errorList
        ]);

    }

    public function signin(Request $request){

        // FORM LOGIN 6.3.5 - gestion des erreurs de saisie
        $errorList = [];
         
        // FORM LOGIN 6.3.4 - test de la methode post (envoi du form)
        if ($request->isMethod('post')) {

            // FORM LOGIN 6.3.5 - gestion des erreurs de saisie
            $email = $request->input('email');
            $password = $request->input('password');

            $email = trim($email);
            $password = trim($password);
             
            if (empty($email)) {
                $errorList[] = 'Mot de passe ou utilisateur invalide';
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Mot de passe ou utilisateur invalide';
            }

            if (empty($password) || strlen($password) < 8) {

                $errorList[] = 'Mot de passe ou utilisateur invalide';
            }

            if (empty($errorList)) {

                // FORM LOGIN 6.3.6 - user by email
                $user = User::where('email', '=', $email)->first();

                if (!is_null($user)) {
                     
                    // FORM LOGIN 6.3.7 - user by email
                    if (password_verify($password, $user->password) === true) {

                        UserSession::connect($user);

                        // FORM LOGIN 6.3.8 - redirection
                        return redirect()->route('quiz_list');

                    } else {
                        $errorList[] = 'Identifiant et/ou mot de passe incorrect';
                    }     

                } else {
                    $errorList[] = 'Identifiant et/ou mot de passe incorrect';
                }
            }
        }

        return view('user.signin', [
            'errorList' => $errorList
        ]);

    }

    public function profile(){
        return view('user.account', []);

    }

    public function logout(){

        UserSession::disconnect();

        return redirect()->route('quiz_list');

    }
}