<?php

session_start();

if(isset($_GET["action"])) {
    switch($_GET["action"]) {
        case "register":

            if($_POST["submit"]) {
                /*connexion bdd*/
                $pdo = new PDO("mysql:host=localhost;dbname=php_hash_lily;Charset=utf8","root", "");

                /*mep filtres*/
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                /*vérif filtres*/
                if($pseudo && $email && $pass1 && $pass2) {
                    $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                    $requete->execute(["email" => $email ]);
                    $user = $requete->fetch();

                    //si user existe
                    if($user) {
                        header("Location : register.php"); exit;
                    } else {
                        //add user in bdd
                        if($pass1 == $pass2 && strlen($pass1) >= 5)  { //+ ajout regex
                            $insertUser = $pdo->prepare("
                                INSERT INTO user(pseudo, email, password) 
                                VALUES (:pseudo, :email, :password)"
                            );

                            $insertUser->execute ([
                                "pseudo" => $pseudo,
                                "email" => $email,
                                "password" => password_hash($pass1, PASSWORD_DEFAULT)
                            ]);

                        header("Location: login.php");exit;

                        } else {
                            // "Les mdp sont différents"; 
                        }
                    }
                    } else {
                        // "Autre probleme, etc";
                    }

                }
                
                header("Location: register.php"); exit;
                break;
                    
        case "login":
                if($_POST["submit"]) {
                    
                    //connexion
                    $pdo = new PDO("mysql:host=localhost;dbname=php_hash_lily; charset=utf8", "root", "");

                    //c/ faille XSS 
                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    if($email && $password) {
                        //c/ injection SQL
                        $requete = $pdo->prepare("SELECT * FROM  user WHERE email = :email");
                        $requete->execute(["email" => $email]);
                        $user = $requete->fetch();

                        /*Vérif existance user*/
                        if($user) {
                            
                            $hash = $user["password"];
                            if(password_verify($password, $hash)) {
                                $_SESSION["user"] = $user;
                                header("Location: home.php"); exit; //mini controlleur : :index.php?ctrl=home&action=index
                            } else {
                                var_dump("ok");
                                header("Location: login.php"); exit;
                                //msg user inconnu ou mdp incorrect
                            }
                        } else {
                                //msg user inconnu ou mdp incorrect
                        }
                    }
                }

                header("Location: login.php"); exit;
                var_dump("dehors du if");

            case "logout":
                break;
        }
    }



?>