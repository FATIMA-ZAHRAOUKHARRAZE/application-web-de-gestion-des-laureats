<?php
    class Routeur //extends Singleton
    {
        public function __construct()
        {
            // On sépare les paramètres et on les met dans le tableau $params
            $params = "home/index"; // On instancie le contrôleur par défaut (page d'accueil)

            // Si au moins 1 paramètre existe
            if( isset( $_GET['page'] ) && !empty(  $_GET['page'] ) )
                $params = $_GET['page'];

            
            $params = explode('/', $params );
            
            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule, en ajoutant le namespace des controleurs et en ajoutant "Controller" à la fin
            $model = array_shift($params);
            $controller = ucfirst( $model ).'Controller';

          
    
            // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
            $action = isset($params[0]) ? array_shift($params) : 'index';
            // On instancie le contrôleur
            require_once "controllers/".$controller.".php";
            $controller = new $controller( $model.'s', $action );

            if(method_exists($controller, $action))
            {
                // Si il reste des paramètres, on appelle la méthode en envoyant les paramètres sinon on l'appelle "à vide"
                // Avant
                // Après
                (isset($params[0])) ? call_user_func_array([$controller,$action], $params) : $controller->$action();
            }
            else
            {
                // On envoie le code réponse 404
                http_response_code(404);
                //echo "La page recherchée n'existe pas";
                require_once "controllers/ErreurController.php";
                $ereur=new ErreurController();
                $ereur->page404();
            }
        }
    }
?>