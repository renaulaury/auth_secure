<?php
session_start();

$password = "monMotDePasse1234";
$password2 = "monMotDePasse1234";

/*Algo md5 -> faible*/
$md5 = hash('md5', $password);
$md5_2 = hash('md5', $password2);
echo $md5; "<br>";
echo $md5_2; "<br>";

/*Algo SHA 256 -> faible*/
$sha256 = hash('sha256', $password);
$sha256_2 = hash('sha256', $password2);
echo $sha256; "<br>";
echo $sha256_2; "<br>";

/*Algo -> fort*/
/*Par défaut > meilleur mdp*/
$hash = password_hash($password, PASSWORD_DEFAULT);
$hash_2 = password_hash($password2, PASSWORD_DEFAULT);
echo $hash."<br>";
echo $hash_2."<br>";

$hash3 = password_hash($password, PASSWORD_ARGON2I);
$hash4 = password_hash($password2, PASSWORD_ARGON2I);
echo $hash."<br>";
echo $hash_2."<br>";

/*Saisie dans le fomr de login*/
$saisie ="monMotDePasse1234";


$check = password_verify($saisie, $hash); //Vérifie que le mdp correspond au hash true false
$user = "Lily";

/*Pour le register :
on filtre les champs du formulaire
Si filtres valide on verife que le mail n'existe pas déjà(sinon erreur)
on vérifie que le pseudo n'existe pas non plus
on vérifie que les 2 mdp identiques
si oui hash du mdp
add user a la bdd*/ 

/*Pour le login
on filtre champs du form
si valides on retrouve mdp correspondant au mail dans le form
si on trouve on récup hash de la bdd
on retrouve user correspondant
vérif du mdp
si on arrive a se connecter on fait passer le user en session
si non (mauvais mdp, user inexsitant) > msg error */

if(password_verify($saisie, $hask)) {
    // echo "Les mots de passe correspondent !";
    $_SESSION["user"] = $user;
    echo $user."est connecté !";
} else {
    echo "Les mdp sont différents !";
}

?>